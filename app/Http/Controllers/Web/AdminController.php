<?php

namespace App\Http\Controllers\Web;

use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class AdminController extends Controller
{
    public function __construct(Request $request)
    {
        $this->title = '管理员设置';
    }

    public function list()
    {
        return view('web.contents.admin.list', [
            'title' => $this->title,
        ]);
    }

    public function role()
    {
        return view('web.contents.admin.role', [
            'title' => $this->title,
        ]);
    }

    public function createRole()
    {
        return view('web.contents.admin.createRole', [
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('web.contents.admin.create', [
            'title' => $this->title,
        ]);
    }

    public function detail($id)
    {
        return view('web.contents.admin.detail', [
            'title' => $this->title,
            'id'   => $id
        ]);
    }

 
}
