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

    public function list()
    {
        return view('web.contents.system.list', [
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
