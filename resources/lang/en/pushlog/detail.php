<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sales/register.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'Push-msg History',
        'depth1' => 'Home',
        'depth2' => 'Push-msg History',
        'depth3' => 'Push detail'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => 'Push detail',
        'list' => 'List',
        'titletwo'=>'Push info',
        'pushlog' => [
          'title' => 'Title',
          'content' => 'Content',
          'type'=>'Type',
          'sender' => 'Sender',
          'ret_code' => 'Ret_code',
          'err_msg'=>'Err_Msg',
          'create_at'=> 'Register Date',
          'user_list'=> 'Ueer List'
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

