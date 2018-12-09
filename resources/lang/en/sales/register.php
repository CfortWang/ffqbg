<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sales/register.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'Buyer management',
        'depth1' => 'Home',
        'depth2' => 'Buyer management',
        'depth3' => 'Register Sales'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => 'Register sales',
        'list' => 'List',
        'register' => 'Register',
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
          ]
        ]
    ],

    /*** Message ***/
    'message' => [
        'buyerCheck' => 'You must select the buyer.',
        'priceCheck' => 'You must insert the price over 300.',
        'listCheck' => 'You must select packages more than one.',
        'registerConfirm' => 'Do you want regist this sales?',
        'salesComplete' => 'Package sales complete!',
        'error' => 'Server Error'
    ]
];

