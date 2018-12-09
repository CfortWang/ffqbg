<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sales/register.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'Buyer management',
        'depth1' => 'Home',
        'depth2' => 'Buyer management',
        'depth3' => 'Register Contract'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => 'Register contract',
        'list' => 'List',
        'register' => 'Register',
        'contract' => [
          'title' => 'Contract Info',
          'buyerID' => 'Buyer ID',
          'contractTitle'=>'Contract Title',
          'package' => 'Packages',
          'totalQuantity' => 'total quantity',
          'start_date'=> 'start_date',
          'expire_date'=> 'expire_date'
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

