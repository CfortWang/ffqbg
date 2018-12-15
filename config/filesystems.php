<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. A "local" driver, as well as a variety of cloud
    | based drivers are available for your choosing. Just store away!
    |
    | Supported: "local", "ftp", "s3", "rackspace"
    |
    */

    'default' => 'local',

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => 's3',

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'visibility' => 'public',
        ],
        'image1' => [
            'driver' => 'ftp',
            'root' => env('file_env_root_1'),
            'host'     =>  env('file_env_host_1'), //本地电脑绑定的IP地址：
            'username' => env('file_env_username_1'),//ftp账号：
            'password' => env('file_env_password_1'),//ftp密码：
            'url' => env('APP_URL').'/public/image',
            'visibility' => 'public', 
            'port' => 22
        ],
        'image2' => [
            'driver' => 'ftp',
            'root' => env('file_env_root_2'),
            'host'     =>  env('file_env_host_2'), //本地电脑绑定的IP地址：
            'username' => env('file_env_username_2'),//ftp账号：
            'password' => env('file_env_password_2'),//ftp密码：
            'url' => env('APP_URL').'/public/image',
            'visibility' => 'public', 
            'port' => 22
        ],
        's3' => [
            'driver' => 's3',
            'key' => 'your-key',
            'secret' => 'your-secret',
            'region' => 'your-region',
            'bucket' => 'your-bucket',
        ],

    ],

];
