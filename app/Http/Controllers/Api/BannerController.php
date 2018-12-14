<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\AdvertisementPosition;
use App\Models\AppAdvertisement;

class BannerController extends Controller
{
    public function list(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];

        $columnArray = array('A.link','A.file as image','advertisement_position.width','advertisement_position.height','A.name','A.description');
        $flag = 'home_top';
        $items  = AdvertisementPosition::where('flag',$flag)
            ->leftjoin('app_advertisement as A', 'A.advertisement_position_id', '=', 'advertisement_position.id');
        $recordsTotal = $items->count();
      
        $recordsFiltered = $items->count();
        $items = $items->select('A.link','A.file as image','advertisement_position.width','advertisement_position.height','A.name','A.description')
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
        SystemNews::creat($data);
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