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
        $data = Setting::first();
        return $this->responseOK('', $data);

    }

    public function systemUpdate(Request $request)
    {
        $data = Setting::first();
        $data->id = $request->input('id');
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
        $data->withdraw_status = $request->input('withdraw_status');
        $data->model_text = $request->input('model_text');
        $data->is_model_close = $request->input('is_model_close');
        $data->limit_1_return = $request->input('limit_1_return');
        $data->limit_2_return = $request->input('limit_2_return');
        $data->limit_3_return = $request->input('limit_3_return');
        $data->save();
        return $this->responseOK('修改成功',[]);
    }

    public function user(Request $request)
    {
        $data = UserSetting::get();
        return $this->responseOK('', $data);

    }

    public function task(Request $request)
    {
        $data = TaskSetting::get();
        return $this->responseOK('', $data);

    }

}