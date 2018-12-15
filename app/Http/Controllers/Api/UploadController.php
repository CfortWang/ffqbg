<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Validator;
class UploadController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function image(Request $request)
    {
        $input = Input::only('file');
        $message = array(
            "image" => "文件类型不对",
        );
        $validator = Validator::make($input, [
			'file'     => 'required|image',
        ],$message);
        
        if ($validator->fails()) {
            $message = $validator->errors()->first();
            return $this->responseBadRequest($message);
        }
        $file = $request->file('file');
        $clientName = $file->getClientOriginalName();
        $name       = md5($clientName.microtime());
        $extension  = $file->getClientOriginalExtension();
        $data = Storage::disk('image1')->put('/'.date('Y-m-d',time()),$file);
        $data = Storage::disk('image2')->put('/'.date('Y-m-d',time()),$file);
        $url = env('APP_URL').'/image/'.$data;
        $return['data'] = $data;
        $return['url'] = $url;
    	return  $this->responseOK('',$return);
    }
}
