<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Config;
use League\Flysystem\Filesystem;
use League\Flysystem\Sftp\SftpAdapter;

class FileHelper
{
    public static $marketingEventLosingImageFilePath = '/marketing_event/losing_img/';
    public static $marketingEventResultImageFilePath = '/marketing_event/result_img/';
    public static $marketingEventDetailImageFilePath = '/marketing_event/detail_img/';
    public static $giftResultImagePath = '/shop/gift/';
    public static $adImageFilePath = '/ad/skip_img/';
    public static $mainTopImageFilePath = '/app_main/top/';
    public static $shopImageFilePath = '/ad/skip_img/';
    public static $adResultImageFilePath = '/ad/skip_img/';
    
    public static function marketingEventLosingImage($file) 
    {
        return static::uploadImage(static::$marketingEventLosingImageFilePath, $file);
    }

    public static function marketingEventResultImage($file) 
    {
        return static::uploadImage(static::$marketingEventResultImageFilePath, $file);
    }
    public static function giftResultImage($file) 
    {
        return static::uploadImage(static::$giftResultImagePath, $file);
    }
    public static function adResultImage($file) 
    {
        return static::uploadImage(static::$adResultImageFilePath, $file);
    }
 
    public static function marketingEventDetailImage($file) 
    {
        return static::uploadImage(static::$marketingEventDetailImageFilePath, $file);
    }

    public static function adImage($file) 
    {
        return static::uploadImage(static::$adImageFilePath, $file);
    }
    public static function mainTopADImage($file) 
    {
        return static::uploadImage(static::$mainTopImageFilePath, $file);
    }


    public static function shopADImage($file) 
    {
        return static::uploadImage(static::$shopImageFilePath, $file);
    }

    public static function uploadImage($filePath, $file)
    {
        $mediaHost = Config::get('web.media.host');
        $mediaUser = Config::get('web.media.user');
        $mediaPass = Config::get('web.media.pass');
        $mediaRoot = Config::get('web.media.root');
        $mediaPath = Config::get('web.media.path');

        $clientName = $file->getClientOriginalName();
        $name       = md5($clientName.microtime());
        $extension  = $file->getClientOriginalExtension();
        $mimeType   = $file->getClientMimeType();
        $size       = $file->getClientSize();
        $fullPath   = $mediaPath.$filePath.$name.'.'.$extension;
        $url        = 'http://'.$mediaHost.$fullPath;

        list($imageWidth, $imageHeight) = getimagesize($file);

        $filesystem = new Filesystem(new SftpAdapter([
            'host'          => $mediaHost,
            'port'          => 22,
            'username'      => $mediaUser,
            'password'      => $mediaPass,
            'root'          => $mediaRoot,
        ]));
        
        $stream = fopen($file->getRealPath(), 'r+');
        $filesystem->put($fullPath, $stream);
        
        return [
            'client_name'   => $clientName,
            'name'          => $name,
            'extension'     => $extension,
            'mine_type'     => $mimeType,
            'size'          => $size,
            'full_path'     => $fullPath,
            'url'           => $url,
            'image_width'   => $imageWidth,
            'image_height'  => $imageHeight,
        ];
    }
}
