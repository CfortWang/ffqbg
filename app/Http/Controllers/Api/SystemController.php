<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\UserSetting;
use App\Models\Setting;
use App\Models\TaskSetting;

class SystemController extends Controller
{
    public function system(Request $request)
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

    }

    public function task(Request $request)
    {

    }

}