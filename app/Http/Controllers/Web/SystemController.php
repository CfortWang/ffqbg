<?php

namespace App\Http\Controllers\Web;

use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Models\Setting;


class SystemController extends Controller
{
    public function __construct(Request $request)
    {
        $this->title = '系统设置';
    }

    public function basis()
    {
        return view('web.contents.system.basis', [
            'title' => $this->title,
        ]);
    }

    public function parameter()
    {
        return view('web.contents.system.parameter', [
            'title' => $this->title,
        ]);
    }

    public function task()
    {
        return view('web.contents.system.task', [
            'title' => $this->title,
        ]);
    }

    public function member()
    {
        return view('web.contents.system.member', [
            'title' => $this->title,
        ]);
    }

    public function code()
    {
        return view('web.contents.system.code', [
            'title' => $this->title,
        ]);
    }

    public function protocol()
    {
        return view('web.contents.system.protocol', [
            'title' => $this->title,
        ]);
    }

    public function detail($id)
    {
        return view('web.contents.system.detail', [
            'title' => $this->title,
            'id'   => $id
        ]);
    }

 
}
