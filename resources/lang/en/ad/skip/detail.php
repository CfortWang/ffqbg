<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/ad/register.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'AD',
        'depth1' => 'Home',
        'depth2' => 'AD',
        'depth3' => 'AD Detail'
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
          'adImage' => 'Image',
          'adStatus' => 'Status',
          'upload' => 'Upload',
          'adView' => 'View count',
          'remark' => '*Image size : 1440 * 2560 / File size : 150KB',
        ]
    ],

    /*** Message ***/
    'message' => [
        'imageCheck' => 'You must upload the image.',
        'modifyConfirm' => 'Do you want to modify the AD image?',
        'modifyComplete' => 'Modify AD image complete!',
        'activeConfirm' => 'Do you want to activate the AD?',
        'activeComplete' => 'AD activation complete!',
        'stopConfirm' => 'Do you want to stop the AD?',
        'stopComplete' => 'AD has been stopped.',
        'parameterErr' => 'Parameter Error.',
        'wrongImageSize' => 'You can insert image only 1440 * 2560.',
        'wrongFileSize' => 'Image file size must be under the 150KB.',
        'error' => 'Server Error'
    ]
];

