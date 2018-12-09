<?php

namespace App\Http\Controllers\Web;

use Validator;
use Hash;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Models\Admin;

class LoginController extends Controller
{
    public function __construct(Request $request)
    {
        $this->title = 'Login';
    }

    public function login()
    {
        return view('contents.login', [
            'title' => $this->title,
        ]);
    }

    public function access(Request $request)
    {
      $input = Input::only('loginID', 'loginPW');

      $validator = Validator::make($input, [
        'loginID'           => 'required',
        'loginPW'           => 'required'
      ]);

      if ($validator->fails()) {
        return $this->responseBadRequest('参数不对');
      }
      
      $loginID = $request->input('loginID');
      $loginPW = $request->input('loginPW');
      $pe = md5($loginPW);
      $admin = Admin::where('username', $loginID)->where('password',$pe)->first();
      if (empty($admin)) return $this->responseBadRequest('账户名或密码错误', 101);

      $request->session()->put('admin.id', $admin->id);
      $request->session()->put('admin.super_admin', $admin->super_admin);

      return $this->responseOk('access success',[
        'adminInfo'   => $admin
      ]);
    }

    public function logout(Request $request)
    {
      $request->session()->forget('admin');

      return $this->responseOk('logout success',[
        'result'   => 'success'
      ]);
    }
}
