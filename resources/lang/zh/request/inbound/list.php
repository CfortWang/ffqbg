<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/inbound/list.php

return [
  /*** Header ***/
  'header' => [
      'title' => '喜豆码请求',
      'depth1' => '主页',
      'depth2' => '喜豆码请求',
      'depth3' => '入库列表'
  ],
  
  /*** Contents ***/
  'contents' => [
      'title' => '入库请求列表'
  ],

  /*** Tables ***/
  'table' => [
      'search' => '搜索',
      'title' => [
          'no' => 'No',
          'requester' => '请求用户',
          'amount' => '数量',
          'registerDate' => '创建日期',
          'status' => '状态'
      ],
      'pagination' => [
          'prev' => '前一页',
          'next' => '下一页'
      ],
      'no_data' => 'no data',
      'select' => [
          'all' => 'All',
          'requested' => '已请求',
          'confirmed' => '已确认',
          'responsed' => '已处理',
          'canceled' => '已删除',
          'forwarded' => '已发送'
      ]
  ]
];
