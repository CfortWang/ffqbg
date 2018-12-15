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