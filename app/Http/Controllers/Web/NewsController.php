<?php

namespace App\Http\Controllers\Web;

use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;



class NewsController extends Controller
{
    public function __construct(Request $request)
    {
        $this->title = '新闻管理';
    }

    public function list()
    {
        return view('web.contents.news.list', [
            'title' => $this->title,
        ]);
    }

    public function detail($id)
    {
        return view('web.contents.news.detail', [
            'title' => $this->title,
            'id'   => $id
        ]);
    }

 
}
