<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/outbound/list.php

return [
    /*** Header ***/
    'header' => [
        'title' => 'Package Request',
        'depth1' => 'Home',
        'depth2' => 'Package request',
        'depth3' => 'Register outbound'
    ],
  
    /*** Contents ***/
    'contents' => [
        'title' => 'Register outbound',
        'register' => [
        'title' => 'Request Info',
        'partnerID' => 'Partner ID',
        'availableQuantity' => 'Available Quantity',
        'quantity' => 'Quantity'
        ],
        'list' => 'List',
        'request' => 'Request'
    ],

    /*** Message ***/
    'message' => [
        'partnerCheck' => 'You must select the partner.',
        'quantityCheck' => 'You must insert the quantity.',
        'availableQuantityCheck' => 'Quantity is over the available quantity.',
        'registerConfirm' => 'Do you want regist this request?',
        'requestComplete' => 'Request complete!',
        'error' => 'Server Error'
    ]
];
