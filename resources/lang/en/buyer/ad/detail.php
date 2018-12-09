<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/buyer/register.php
return [
    'header' => [
        'title'  => 'AD',
        'depth1' => 'home',
        'depth2' => 'AD',
        'depth3' => 'AD Detail'
    ],
    'contents' => [
        'title'     => 'AD detail',
        'title-1'   => 'AD Info',
        'title-2'   => 'Package Info',
    ],
    'select' => [
        'type'    => [
            'select'   => 'Select',
            'image'    => 'Image',
            'video'    => 'Video'
        ]
    ],
    'label' => [
        'title'                => 'Title',
        'url'                  => 'Landing URL',
        'type'                 => 'Type',
        'ad_image'             => 'AD Image',     
        'quanty'               => 'My Package quantities',
        'status'               => 'status',
        'buyer'                => 'buyer'
    ],
    'placeholder'   => [
        'title'                => 'Insert Title',
        'Landing_URL'          => 'Insert Landing URL ',
    
    ],
    'button'    => [
        
        'activation'          => 'Activation',
        'modify'              => 'Modify',
        'list'                => 'List',
        'stop'                =>'Stop',
        'upload'              => 'Upload'
    ],  
    'message'=>[
        'typeValidation'      =>'Please select the type.',
        'urlValidation'       =>'Please insert the landing url.',
        'fileValidation'      =>'Please upload the AD image.',
        'pkgValidation'       =>'Please select the Package at least one.',
        'modifySuccess'       =>'Modify AD success.',
        'parameterErr'        => 'Parameter Error.',
        'noData'              => 'Can not find data',
        'noPkg'               => 'Package must be selected at least one.',
        'wrongImageSize'      => 'You can insert image only 1280 * 488.',
        'imageErr'            => 'Image Error',
        'serverErr'           => 'Server Error.',
        'activationSuccess'   => 'AD is activated.',
        'stopSuccess'         => 'AD is stopped.'
    ]  
];
