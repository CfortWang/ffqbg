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
        $items  = AdvertisementPosition::where('A.deleted_at',null)
            ->join('app_advertisement as A', 'A.advertisement_position_id', '=', 'advertisement_position.id');
        $recordsTotal = $items->count();
      
        $recordsFiltered = $items->count();
        $items = $items->select('A.id','A.link','A.file as image','advertisement_position.width','advertisement_position.height','advertisement_position_id','A.name','A.description')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function detail(Request $request)
    {
        $id = $request->input('id');
        $data = AppAdvertisement::where('id',$id)->first();
        return $this->responseOK('', $data);
    }

    public function create(Request $request)
    {
        $input = Input::only('title','description','file','link','advertisement_position_id');
        $message = array(
            "required" => ":attribute "."不能为空",
            "string" => "数据类型错误",
            'array' => '图片不能为空'
        );
        $validator = Validator::make($input, [
            'title'  =>'required|string',
            'description'=>'required|string',
            'file'  =>'required|string',
            'link'  =>'required|string',
            'advertisement_position_id' => 'required|integer',
        ],$message);
        
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseBadRequest($message);
        }
        $data['name'] = $request->input('title');
        $data['description'] = $request->input('description');
        $data['file'] = $request->input('file');
        $data['link'] = $request->input('link');
        $data['advertisement_position_id'] = $request->input('advertisement_position_id');
        $data['sort'] = 1;
        AppAdvertisement::create($data);
        return $this->responseOK('新建成功',[]);
    }

    public function modify(Request $request)
    {
        $id = $request->input('id');
        $data = AppAdvertisement::where('id',$id)->first();
        $data->name = $request->input('title');
        $data->description = $request->input('description');
        $data->file = $request->input('file');
        $data->link = $request->input('link');
        $data->advertisement_position_id = $request->input('advertisement_position_id');
        $data->save();
        return $this->responseOK('修改成功',[]);
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');
        $data = AppAdvertisement::where('id',$id)->first();
        $data->delete();
        return $this->responseOK('删除成功',[]);
    }

}