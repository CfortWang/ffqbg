<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/ad/mbottom/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'AD',
        'depth1' => 'Home',
        'depth2' => 'AD',
        'depth3' => 'Main Bottom'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => 'AD Detail',
        'list' => 'List',
        'active' => 'Activation',
        'modify' => 'Modify',
        'stop' => 'Stop',
        'ad' => [
          'adInfo' => 'AD Info',
          'adTitle' => 'Title',
          'landingUrl' => 'Landing URL',
          'orderNum' => 'Order Num',
          'adImage' => 'Image',
          'adStatus' => 'Status',
          'upload' => 'Upload',
          'adView' => 'View count',
          'remark' => '*Image size : 1440 * 420 / File size : 100KB',
        ]
    ],

    /*** Message ***/
    'message' => [
        'imageCheck' => 'You must upload the image.',
        'landingUrlValidation' => 'You must insert the Landing url.',
        'orderNumValidation' => 'You must insert the order num.',
        'modifyConfirm' => 'Do you want to modify the AD image?',
        'modifyComplete' => 'Modify AD image complete!',
        'activeConfirm' => 'Do you want to activate the AD?',
        'activeComplete' => 'AD activation complete!',
        'stopConfirm' => 'Do you want to stop the AD?',
        'stopComplete' => 'AD has been stopped.',
        'parameterErr' => 'Parameter Error.',
        'wrongImageSize' => 'You can insert image only 1440 * 420.',
        'wrongFileSize' => 'Image file size must be under the 150KB.',
        'error' => 'Server Error'
    ]
];

