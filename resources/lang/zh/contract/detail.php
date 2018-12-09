<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sales/register.php
return [
    /*** Header ***/
    'header' => [
        'title' => '商家管理',
        'depth1' => '主页',
        'depth2' => '商家管理',
        'depth3' => '合同详情'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => '合同详情',
        'list' => '列表',
        'stop' => '终止',
        'contract' => [
          'title' => '合同信息',
          'buyerID' => '商家 ID',
          'contractTitle'=>'合同标题',
          'package' => 'Packages',
          'totalQuantity' => 'total quantity',
          'start_date'=> '生效日期',
          'expire_date'=> '到期时期',
          'status'=>'状态'
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

