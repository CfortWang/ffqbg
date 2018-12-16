<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\SystemNews;

class NewsController extends Controller
{
    public function list(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('id','title','content','url','create_at');
        $items = SystemNews::where('id','>',0);
        $recordsTotal = $items->count();
      
        $recordsFiltered = $items->count();
        $items = $items->select('id','title','content','url','created_at')
            // ->orderBy($columnArray[$orderColumnsNo], $orderType)
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        $data = SystemNews::where('id',$id)->first();
        return $this->responseOK('', $data);
    }

    public function create(Request $request)
    {
        $input = Input::only('title','content','url');
        $message = array(
            "required" => "不能为空",
            "string" => "数据类型错误",
            'array' => '图片不能为空'
        );
        $validator = Validator::make($input, [
            'title'  =>'required|string',
            'content'=>'required|string',
            'url'  =>'nullable|string',
            
        ],$message);
        
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseBadRequest($message);
        }
        $data['title'] = $request->input('title');
        $data['content'] = $request->input('content');
        $data['url'] = $request->input('url');
        SystemNews::create($data);
        return $this->responseOK('新建成功',[]);
    }

    public function modify(Request $request)
    {
        $id = $request->input('id');
        $data = SystemNews::where('id',$id)->first();
        $data->title = $request->input('title');
        $data->content = $request->input('content');
        $data->url = $request->input('url');
        $data->save();
        return $this->responseOK('修改成功',[]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $data = SystemNews::where('id',$id)->first();
        $data->delete();
        return $this->responseOK('删除成功',[]);
    }

}