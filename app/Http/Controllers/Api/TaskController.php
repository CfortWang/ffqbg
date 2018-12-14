<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Task;
use App\Models\TaskImages;
use App\Models\TaskRcord;
use App\Models\TaskSetting;

class TaskController extends Controller
{
    public function list(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('id','title','user_id','user_level','create_time','status','task_limit','price');
        $where['is_delete'] = 0;
        $id = $request->input('id');
        if($id){
            $where['id'] = $id;
        }
   
        $items = Task::where($where);
        $recordsTotal = $items->count();
      
        $recordsFiltered = $items->count();
        $items = $items->select('id','title','user_id','user_level','create_time','status','task_limit','price')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
            foreach ($items as $key => $value) {
                $items[$key]['create_time'] = date('Y-m-d h:i:s',$value['create_time']);
            }
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function user(Request $request)
    {
        $offset = $request->start?$request->start:0;
        $limit = $request->length?$request->length:15;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        // $columnArray = array('id','title','user_id','user_level','create_time','status','task_limit','price');
        $id = $request->input('id');
        $items = TaskRcord::leftjoin('user as u','u.id','=','tasks_record.user_id');
        if($id){
            $where['task_id'] = $id;
            $items = TaskRcord::where($where)
                ->leftjoin('user as u','u.id','=','tasks_record.user_id');
        }
   
        $recordsTotal = $items->count();
      
        $recordsFiltered = $items->count();
        $items = $items->select('task_id','u.name','user_id','apply_time','tasks_record.amount','complete_time','tasks_record.status')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
            foreach ($items as $key => $value) {
                $items[$key]['apply_time'] = date('Y-m-d h:i:s',$value['apply_time']);
                $items[$key]['complete_time'] = date('Y-m-d h:i:s',$value['complete_time']);
            }
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        $info = Task::where('id',$id)->select('id','title','price','content','user_level','images','task_limit')->first();
        $images = explode(',',$info['images']);
        $image = [];
        foreach ($images as $key => $value) {
            if($value){
                // if($info['id']<3579){
                    $string =  'https://ffq-adv.oss-cn-shenzhen.aliyuncs.com/static/images/goods/'.$value;
                    $image[] = $string;
                // }else{
                //     $image[] = $value;
                // }
            }
        }
        $info['images'] = $image;
        return $this->responseOK('', $info);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $data = Task::where('id',$id)->first();
        $data->delete();
        return $this->responseOK('删除成功',[]);
    }

    public function create(Request $request)
    {
        $input = Input::only('title','content','amount','user_level','image');
        $message = array(
            "required" => "不能为空",
            "string" => "数据类型错误",
            'array' => '图片不能为空'
        );
        $validator = Validator::make($input, [
            'title'  =>'required|string',
            'content'=>'required|string',
            'amount'  =>'required|integer',
            'user_level' => 'required|integer',
            'image' => 'required|array'
        ],$message);
        
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseBadRequest($message);
        }
        $user_id = session('ffq_user_id');
        $user_level = $request->input('user_level');
        $list = TaskSetting::select('name','user_level','price')->where('user_level',$user_level)->first();
        $price = $list['price'];
        $data = array(
            'code_url' => 'user'.str_random(6).$user_id,
            'status' => 1,
            'title' => $request->input('title'),
            'price' => $price,
            'task_rank' => 0,
            'task_limit' =>$request->input('amount'),
            'content' => $request->input('content'),
            'create_time' => time(),
            'task_abstract' => $request->input('content'),
            'user_level' => $request->input('user_level'),
            'is_delete' => 0,
            'task_do' => 0,
            'user_id' => $user_id
        );
        $data['images'] = implode(',',$request->input('image'));
        $res = Task::create($data);
        return $this->responseOk('创建成功',$res);
    }
}