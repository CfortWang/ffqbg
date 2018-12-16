<?php

namespace App\Http\Controllers\Api;

use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\UserSetting;
use App\Models\Setting;
use App\Models\TaskSetting;
use App\Models\PhoneVerificationCode;
use App\Models\User;
use App\Models\UserLimit;

class SystemController extends Controller
{
    public function system(Request $request)
    {
        $data = Setting::first();
        return $this->responseOK('', $data);

    }

    public function systemUpdate(Request $request)
    {
        $data = Setting::first();
        $data->cashout_max = $request->input('cashout_max');
        $data->cashout_min = $request->input('cashout_min');
        $data->cashout_rate = $request->input('cashout_rate');
        $data->register_award = $request->input('register_award');
        $data->first_publish_award = $request->input('first_publish_award');
        $data->finish_1_return = $request->input('finish_1_return');
        $data->finish_2_return = $request->input('finish_2_return');
        $data->finish_3_return = $request->input('finish_3_return');
        $data->register_1_return = $request->input('register_1_return');
        $data->register_2_return = $request->input('register_2_return');
        $data->register_3_return = $request->input('register_3_return');
        $data->created_at = $request->input('created_at');
        $data->updated_at = $request->input('updated_at');
        $data->is_callout_close = $request->input('is_callout_close');
        $data->model_text = $request->input('model_text');
        $data->is_model_close = $request->input('is_model_close');
        $data->is_limit_close = $request->input('is_limit_close');
        $data->limit_1_return = $request->input('limit_1_return');
        $data->limit_2_return = $request->input('limit_2_return');
        $data->limit_3_return = $request->input('limit_3_return');
        $data->limit_1_number = $request->input('limit_1_number');
        $data->limit_2_number = $request->input('limit_2_number');
        $data->limit_3_number = $request->input('limit_3_number');
        $data->save();
        return $this->responseOK('修改成功',[]);
    }

    public function user(Request $request)
    {
        $data = UserSetting::get();
        return $this->responseOK('', $data);

    }

    public function userUpdate(Request $request)
    {
        $id = $request->input('id');
        $level = $request->input('level');
        $price = $request->input('price');
        foreach ($id as $key => $value) {
            $data = UserSetting::where('id',$value)->first();
            $data->name = $level[$key];
            $data->price = $price[$key];
            $data->save();
        }
        return $this->responseOK('修改成功',[]);

    }

    public function task(Request $request)
    {
        $data = TaskSetting::get();
        return $this->responseOK('', $data);

    }

    public function taskUpdate(Request $request)
    {
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        foreach ($id as $key => $value) {
            $data = TaskSetting::where('id',$value)->first();
            $data->name = $name[$key];
            $data->price = $price[$key];
            $data->save();
        }
        return $this->responseOK('修改成功',[]);

    }

    public function code(Request $request)
    {
        $offset = $request->start;
        $limit = $request->length;
        $status=$request->status;
        $searchValue = $request->search['value'];
        $orderColumnsNo = $request->order[0]['column'];
        $orderType = $request->order[0]['dir'];
        $phone = $request->input('phone');
        $columnArray = array('id','title','content','url','create_at');
        $items = PhoneVerificationCode::where('id','>',0);
        if($phone){
            $where['phone_number'] = $phone;
        }
        $recordsTotal = $items->count();
      
        $recordsFiltered = $items->count();
        $items = $items->select('id','phone_number','code','msg_type','created_at')
            ->offset($offset)
            ->limit($limit)
            ->get();
        return $this->response4DataTables($items, $recordsTotal, $recordsFiltered);
    }

    public function limit(Request $request)
    {
        $min = $request->input('min');
        $max = $request->input('max');
        $start_at = $request->input('start_at');
        $end_at = $request->input('end_at');
        $count = User::where('total_amount','>',$min)->where('total_amount','<',$max)->count();
        $limit = UserLimit::count();

        $data['count'] = $count;
        $data['limit'] = $limit;
        return $this->responseOK('查询成功',$data);
    }

    public function switchLoginLimit(Request $request)
    {
        $data = Setting::first();
        $data->is_login_limit_close = $request->input('is_login_limit_close');
        $data->save();
        return $this->responseOK('保存成功',[]);
    }

    public function setlimit(Request $request)
    {
        $amount = $request->input('total');
        $min = $request->input('min');
        $max = $request->input('max');
        $start_at = $request->input('start_at');
        $end_at = $request->input('end_at');
        $count = 0;
        if($min||$max||$start_at||$end_at){
            $count = User::where('total_amount','>',$min)->where('total_amount','<',$max)->count();
        }
        $limit = UserLimit::count();
        if($limit&&$limit<$amount){
            return $this->responseNotFound('已有限制登录用户',[]);
        }
        if($limit&&$amount<=$limit){
            $left = $limit-$amount;
            $data = UserLimit::limit($amount)->get();
            foreach ($data as $key => $value) {
                UserLimit::where('id',$value['id'])->delete();
            }
            return $this->responseOK('修改成功',[]);
        }
        if($limit==0&&$count!=0){
            $data = User::where('total_amount','>',$min)->where('total_amount','<',$max)->get();
            if($data){
                foreach ($data as $key => $value) {
                    $d['user_id'] = $value['id'];
                    $insert[]=$d;
                }
                UserLimit::insert($insert);
                return $this->responseOK('设置成功',[]);
            }else{
                return $this->responseBadRequest('没有足够的用户',[]);
            }
        }
        return $this->responseOK('修1改成功',[]);
    }
     
}