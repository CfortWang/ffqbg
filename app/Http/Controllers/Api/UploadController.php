<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Bus\DispatchesJobs;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
// use Illuminate\Support\Facades\Storage;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;
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
        $type = $request->input('type');

        $clientName = $file->getClientOriginalName();
        $name       = md5($clientName.microtime());
        $extension  = $file->getClientOriginalExtension();
        // $data = Storage::disk('image1')->put('/'.$type,$file);
        // $data = Storage::disk('image2')->put('/'.$type,$file);
        $file1 = Config::get('filesystems.disks.image1');
        $filesystem = new Filesystem(new SftpAdapter($file1));
        $path = $type.'/'.$name.'.'.$extension;
        $stream = fopen($file->getRealPath(), 'r+');
        $filesystem->put($path, $stream);
        $file2 = Config::get('filesystems.disks.image2');
        $filesystem = new Filesystem(new SftpAdapter($file2));
        // $path = $type.'/'.$name.'.'.$extension;
        $path = $type.'/'.$name.'.'.$extension;
        $stream = fopen($file->getRealPath(), 'r+');
        $filesystem->put($path, $stream);
        $url = env('APP_URL').'/image/'.$path;
        $return['url'] = $url;
    	return  $this->responseOK('',$return);
    }
}
