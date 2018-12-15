<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Users;
use App\Models\Role;
use App\Models\Menu;
use App\Models\Role2Menu;

class AdminController extends Controller
{
    public function list(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('id','name','username','email','created_at');
        $items = Users::where('id','>',0);
        $recordsTotal = $items->count();
        
        $recordsFiltered = $items->count();
        $items = $items->select('id','title','content','url','created_at')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function menu(Request $request)
    {
        $data = Menu::get();
        return $this->responseOK('', $data);
    }

    public function role(Request $request)
    {
        $data = Role::get();
        return $this->responseOK('', $data);
    }

    public function addRole(Request $request)
    {
        $input = Input::only('name','menu_id');
        $message = array(
            "required" => "不能为空",
            "string" => "数据类型错误",
            'array' => '目录不能为空'
        );
        $validator = Validator::make($input, [
            'name'  =>'required|string',
            'menu_id'  =>'required|array',
            
        ],$message);
        
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseBadRequest($message);
        }
        $data['name'] = $request->input('name');
        $role_id = Role::save($data);
        $menu_id = $request->input('menu_id');
        foreach ($menu_id as $key => $value) {
            $m_data['menu_id'] = $value;
            $m_data['role_id'] = $role_id;
            Role2Menu::save($m_data);
        }
        return $this->responseOK('新建成功', $data);

    }

    public function addAdmin(Request $request)
    {
        $input = Input::only('name','username','email','password','role_id');
        $message = array(
            "required" => "不能为空",
            "string" => "数据类型错误",
            'array' => '目录不能为空'
        );
        $validator = Validator::make($input, [
            'name'  => 'required|string',
            'username' => 'required|string',
            'role_id'  =>'required|integer',
            'email' => 'required|email',
            'password' => 'required|string',
        ],$message);
        
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseBadRequest($message);
        }
        $data['name'] = $request->input('name');
        $data['username'] = $request->input('username');
        $data['role_id'] = $request->input('role_id');
        $data['email'] = $request->input('email');
        $data['password'] = $request->input('password');

        $user_id = Users::save($data);
        
        return $this->responseOK('新建成功', $user_id);
    }

    public function delRole(Request $request)
    {
        
    }

    public function delAdmin(Request $request)
    {
        
    }

    public function updateAdmin(Request $request)
    {
        
    }

    public function updateRole(Request $request)
    {
        
    }
    
    public function detail(Request $request)
    {
        $id = $request->input('id');
        $data = Users::where('id',$id)->first();
        if($data){
            return $this->responseOK('', $data);
        }else{
            return $this->responseNotFound('没有数据',[]);
        }
    }
}