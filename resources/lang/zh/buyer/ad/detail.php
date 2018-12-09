<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/buyer/register.php
return [
    'header' => [
        'title'  => '广告',
        'depth1' => '主页',
        'depth2' => '广告',
        'depth3' => '广告详情页'
    ],
    'contents' => [
        'title'     => '广告详情',
        'title-1'   => '广告信息',
        'title-2'   => '包装信息',
    ],
    'select' => [
        'type'    => [
            'select'   => 'Select',
            'image'    => '图片',
            'video'    => '影视'
        ]
    ],
    'label' => [
        'title'                => '标题',
        'url'                  => '投放页面链接',
        'type'                 => '类型',
        'ad_image'             => '广告图片',     
        'quanty'               => '包总数',
        'status'               => '状态',
        'buyer'                => '买家'
    ],
    'placeholder'   => [
        'title'                => '添加广告标题',
        'Landing_URL'          => '添加投放页面链接 ',
    
    ],
    'button'    => [
        
        'activation'          => '激活',
        'modify'              => '修改',
        'list'                => '列表',
        'stop'                =>'暂停',
        'upload'              => '上传'
    ],  
    'message'=>[
        'typeValidation'      =>'请选择类型.',
        'urlValidation'       =>'请添加投放页面链接.',
        'fileValidation'      =>'请上传图片.',
        'pkgValidation'       =>'请至少选择一个包信息.',
        'modifySuccess'       =>'修改广告成功.',
        'parameterErr'        => '参数错误.',
        'noData'              => '没有数据',
        'noPkg'               => '至少选择一个包.',
        'wrongImageSize'      => '只能上传 1280 * 488大小的图片.',
        'imageErr'            => '图片错误',
        'serverErr'           => '服务器错误.',
        'activationSuccess'   => '广告已经激活.',
        'stopSuccess'         => '广告已经暂停.'
    ]  
];
