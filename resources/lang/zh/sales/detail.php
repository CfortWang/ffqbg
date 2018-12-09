<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sales/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '商家管理',
        'depth1' => '主页',
        'depth2' => '商家管理',
        'depth3' => '销售详情'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => '销售详情',
        'list' => '返回列表',
        'modify' => '修改',
        'pay' => '支付',
        'delete' => '删除',
        // 'register' => '注册',
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
          ],
          'status' => '状态'
        ]
    ],

    /*** Message ***/
    'message' => [
        // 'buyerCheck' => 'You must select the buyer.',
        'priceCheck' => '定价请保证不低于300元.',
        'listCheck' => '请选择不低于1盒的喜豆码盒数.',
        'modifyConfirm' => '是否确认修改此次销售?',
        'modifyComplete' => '修改完成!',
        'payConfirm' => '是否将状态改为已支付?',
        'payComplete' => '状态已修改为已支付.',
        'error' => '服务器错误'
    ]
];

