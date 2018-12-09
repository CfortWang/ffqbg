<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sales/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'Buyer management',
        'depth1' => 'Home',
        'depth2' => 'Buyer management',
        'depth3' => 'Detail Sales'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => 'Sales detail',
        'list' => 'List',
        'modify' => 'Modify',
        'pay' => 'Pay',
        'delete' => 'Delete',
        // 'register' => 'Register',
        'sales' => [
          'title' => 'Sales Info',
          'buyerID' => 'Buyer ID',
          'sellerID' => 'Seller ID',
          'price' => 'Price',
          'package' => 'Packages',
          'totalPrice' => 'Total price',
          'payMethod' => 'Pay method',
          'method' => [
            'card' => 'Card',
            'cash' => 'Cash',
            'wechat' => 'Wechat'
          ],
          'status' => 'Status'
        ]
    ],

    /*** Message ***/
    'message' => [
        // 'buyerCheck' => 'You must select the buyer.',
        'priceCheck' => 'You must insert the price over 300.',
        'listCheck' => 'You must select packages more than one.',
        'modifyConfirm' => 'Do you want to modify this sales?',
        'modifyComplete' => 'Modify package sales complete!',
        'payConfirm' => 'Do you want to change the status to paid of this sales?',
        'payComplete' => 'The status changed to the paid.',
        'error' => 'Server Error'
    ]
];

