<?php

namespace App\Http\Controllers\Web;

use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Models\User;


class UserController extends Controller
{
    public function __construct(Request $request)
    {
        $this->title = '用户管理';
    }

    public function list()
    {
        return view('web.contents.users.list', [
            'title' => $this->title,
        ]);
    }

    public function detail($id)
    {
        $validator = Validator::make(['seq' => $seq],[
            'seq'  => 'required|numeric|min:1',
        ]);

        if ($validator->fails()) {
            return $this->responseBadRequest('');
        }

        $user = User::find($seq);
        // $user->country_phone_code = explode("@",$user->id)[1];
    
        $province = Province::where('country',$user->country)->orderBy('seq', 'desc')->get();
        $city = City::where('province',$user->province)->orderBy('seq', 'desc')->get();
        $area = Area::where('city',$user->city)->orderBy('seq', 'desc')->get();
        $drawing = Drawing::orderBy('seq', 'desc')->get();
        $drawingFirst = Drawing::orderBy('seq', 'desc')->first();
        // $entry = Entry::where('user',$seq)->orderBy('drawing_num', 'desc')->get();
        return view('web.contents.users.detail', [
            'title'        => $this->title,
            'user'         => $user,
            'province'     => $province,
            'city'         => $city,
            'area'         => $area,
            'drawing'      => $drawing,
            'drawingFirst' => $drawingFirst
            // 'entry'        => $entry
        ]);
    }

    public function brokerages()
    {
        return view('web.contents.users.brokerages', [
            'title' => $this->title,
        ]);
    }

    public function wallet()
    {
        return view('web.contents.users.wallet', [
            'title' => $this->title,
        ]);
    }

    public function pay()
    {
        return view('web.contents.users.pay', [
            'title' => $this->title,
        ]);
    }

    public function cashout()
    {
        return view('web.contents.users.cashout', [
            'title' => $this->title,
        ]);
    }

    public function brokeragesMa()
    {
        return view('web.contents.users.brokeragesMa', [
            'title' => $this->title,
        ]);
    }
    public function data()
    {
        return view('web.contents.users.data', [
            'title' => $this->title,
        ]);
    }
}
