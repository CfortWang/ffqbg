<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/outbound/detail.php

return [
    /*** Header ***/
    'header' => [
        'title' => '喜豆码请求',
        'depth1' => '主页',
        'depth2' => '喜豆码请求',
        'depth3' => '出库详情'
    ],
  
    /*** Contents ***/
    'contents' => [
        'title' => '出库详情',
        'requestInfo' => [
          'title' => '请求信息',
          'requester' => '请求用户',
          'respondent' => '回复人',
          'amount' => '数量',
          'status' => '状态',
          'requestDate' => '请求日期',
          'confirmedDate' => '确认日期',
          'responsedDate' => '处理日期',
          'canceledDate' => '删除日期',
          'forwardedDate' => '发货日期'
        ],
        'history' => [
          'title' => '请求记录',
          'table' => [
              'title' => [
                  'type' => '类型',
                  'id' => 'ID',
                  'status' => '状态'
              ],
              'contents' => [
                  'seller' => '零售代表',
                  'agency' => '区县销售合伙人',
                  'distributor' => '市级销售合伙人',
                  'provider' => '省级销售合伙人',
                  'headquarter' => '总部'
              ]
          ]
        ],
        'list' => 'List',
        'requestCancel' => '取消'
    ],

    /*** Message ***/
    'message' => [
        'cancel' => '是否取消此请求??',
        'cancelSuccess' => '取消成功!',
        'error' => '服务器错误'
    ]
];
