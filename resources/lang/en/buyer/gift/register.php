<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/gift/create.php
return [
    'header' => [
        'title' => 'Buyer management',
        'depth1' => 'home',
        'depth2' => 'Buyer',
        'depth3' => 'Gift'
    ],
    'contents' => [
        'title'     => 'Register Gift',
        'title-1'   => 'Gift Info',
    ],
    'label' => [
        'name'                => 'Name',
        'expire_period'       => 'Expire period',
        'remark'              => 'Remark',
        'result_image'        => 'Result Image',
        'result_image_remark' => 'Image size : 1280 * 488',
        'buyer'               => 'Buyer',
    ],
    'placeholder'   => [
        'name'                => 'Insert Name',
        'expire_period'       => 'Insert Expire period',
        'remark'              => 'Insert Remark',
        'result_image'        => 'Insert Result Image',
    ],
    'button'    => [
        'check-id'              => 'Dup.Check',
        'register'              => 'Register',
        'list'                  => 'List',
        'upload'                => 'Upload',
    ],
    'message' => [
        'buyerValidation' => 'Please select the buyer.',
        'nameValidation' => 'Please insert the name.',
        'expireDayValidation' => 'Please insert the expire period.',
        'fileValidation' => 'Please insert the result Image.',
        'registerSuccess' => 'Register Gift Success.',
        'parameterErr' => 'Parameter Error.',
        'nameDuplicated' => 'Name already exist.',
        'wrongImageSize' => 'You can insert image only 1280 * 488.',
        'serverErr' => 'Server Error.'
    ]
];
