<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/buyer/register.php
return [
    'header' => [
        'title' => 'AD',
        'depth1' => 'home',
        'depth2' => 'AD',
        'depth3' => 'Rsgister AD'
    ],
    'contents' => [
        'title'     => 'Register AD',
        'title-1'   => 'AD Info',
        'title-2'   => 'Package Info',
    ],
    'select' => [
        'type'    => [
            'select'   => 'Select',
            'image'  => 'Image',
            'video'      => 'Video'
        ]
    ],
    'label' => [
        'title'                => 'Title',
        'url'          => 'Landing URL',
        'type'          => 'Type',
        'ad_image'     => 'AD Image',     
        'package'       =>'My Package',
    ],
    'placeholder'   => [
        'title'                => 'Insert Title',
        'Landing_URL'          => 'Insert Landing URL ',
    
    ],
    'button'    => [
        'check-id'              => 'Dup.Check',
        'search-sales-partner'  => 'Search',
        'register'              => 'Create AD',
        'list'                  => 'List',
        'upload'                => 'Upload'
    ],  
    'message'=>[
        'buyerValidation'=>'Please select the buyer.',
        'titleValidation'=>'Please insert the title.',
        'typeValidation'=>'Please select the type.',
        'urlValidation'=>'Please insert the landing url.',
        'fileValidation'=>'Please upload the AD image.',
        'pkgValidation'=>'Please select the Package at least one.',
        'parameterErr' => 'Parameter Error.',
        'nameDuplicated' => 'Name already exist.',
        'wrongImageSize' => 'You can insert image only 1280 * 488.',
        'registerSuccess' => 'Register AD is success.',
        'serverErr' => 'Server Error.'
    ]   
];
