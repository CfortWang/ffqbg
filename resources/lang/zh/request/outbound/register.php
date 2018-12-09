<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/outbound/list.php

return [
    /*** Header ***/
    'header' => [
        'title' => '喜豆码请求',
        'depth1' => '主页',
        'depth2' => '喜豆码请求',
        'depth3' => '创建出库'
    ],
  
    /*** Contents ***/
    'contents' => [
        'title' => '创建出库',
        'register' => [
        'title' => '请求信息',
        'partnerID' => '合伙人 ID',
        'availableQuantity' => '可用数量',
        'quantity' => '数量'
        ],
        'list' => '返回列表',
        'request' => '请求'
    ],

    /*** Message ***/
    'message' => [
        'partnerCheck' => '请选择合作商.',
        'quantityCheck' => '请输入数量.',
        'availableQuantityCheck' => '可用数量不足.',
        'registerConfirm' => '是否确认此请求?',
        'requestComplete' => '请求完成!',
        'error' => '服务器错误'
    ]
];
