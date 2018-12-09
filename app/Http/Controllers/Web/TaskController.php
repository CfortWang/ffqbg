<?php

namespace App\Http\Controllers\Web;

use Validator;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

use App\Models\Task;


class TaskController extends Controller
{
    public function __construct(Request $request)
    {
        $this->title = '任务管理';
    }

    public function list()
    {
        return view('web.contents.task.list', [
            'title' => $this->title,
        ]);
    }

    public function detail($id)
    {
        return view('web.contents.task.detail', [
            'title' => $this->title,
            'id'   => $id
        ]);
    }

 
}
