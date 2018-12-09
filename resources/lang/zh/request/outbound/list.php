<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/outbound/list.php

return [
  /*** Header ***/
  'header' => [
      'title' => '喜豆码请求',
      'depth1' => '主页',
      'depth2' => '喜豆码请求',
      'depth3' => '出库列表'
  ],
  
  /*** Contents ***/
  'contents' => [
      'title' => '出库请求列表',
      'registerRequest' => '创建请求'
  ],

  /*** Tables ***/
  'table' => [
      'search' => '搜索',
      'title' => [
          'no' => 'No',
          'requester' => '请求用户',
          'amount' => '数量',
          'registerDate' => '创建时间',
          'status' => '状态'
      ],
      'pagination' => [
          'prev' => '上一页',
          'next' => '下一页'
      ],
      'no_data' => '暂无数据',
      'requestType' => [
        'provider' => '省级销售合伙人',
        'distributor' => '市级销售合伙人',
        'agency' => '区县销售合伙人',
        'seller' => '零售代表'
      ],
      'select' => [
          'all' => 'All',
          'requested' => 'Requested',
          'confirmed' => 'Confirmed',
          'responsed' => 'Responsed',
          'canceled' => 'Canceled',
          'forwarded' => 'Forwarded'
      ]
  ]
];
