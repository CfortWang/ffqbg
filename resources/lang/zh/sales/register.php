<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sales/register.php
return [
    /*** Header ***/
    'header' => [
        'title' => '商家管理',
        'depth1' => '主页',
        'depth2' => '商家管理',
        'depth3' => '创建销售'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => '创建销售',
        'list' => '返回列表',
        'register' => '创建',
        'sales' => [
          'title' => '销售信息',
          'buyerID' => '商家 ID',
          'sellerID' => '零售代表 ID',
          'price' => '价格',
          'package' => '喜豆码',
          'totalPrice' => '总价',
          'payMethod' => '支付方式',
          'method' => [
            'card' => '银行卡',
            'cash' => '现金',
            'wechat' => '微信'
          ]
        ]
    ],

    /*** Message ***/
    'message' => [
        'buyerCheck' => '请选择一个商家r.',
        'priceCheck' => '每盒喜豆码定价请不要低于300.',
        'listCheck' => '请选择至少1盒喜豆码.',
        'registerConfirm' => '是否确认创建销售?',
        'salesComplete' => '创建完成!',
        'error' => '服务器错误'
    ]
];

