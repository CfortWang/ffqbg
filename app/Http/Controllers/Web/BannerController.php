<?php

namespace App\Http\Controllers\Web;

use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class BannerController extends Controller
{
    public function __construct(Request $request)
    {
        $this->title = '广告管理';
    }

    public function list()
    {
        return view('web.contents.banner.list', [
            'title' => $this->title,
        ]);
    }

    public function create()
    {
        return view('web.contents.banner.create', [
            'title' => $this->title,
        ]);
    }

    public function detail($id)
    {
        return view('web.contents.banner.detail', [
            'title' => $this->title,
            'id'   => $id
        ]);
    }

 
}
