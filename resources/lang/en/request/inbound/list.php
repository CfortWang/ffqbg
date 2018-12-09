<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/inbound/list.php

return [
  /*** Header ***/
  'header' => [
      'title' => 'Package Request',
      'depth1' => 'Home',
      'depth2' => 'Package request',
      'depth3' => 'Inbound list'
  ],
  
  /*** Contents ***/
  'contents' => [
      'title' => 'Inbound request list'
  ],

  /*** Tables ***/
  'table' => [
      'search' => 'search',
      'title' => [
          'no' => 'No',
          'requester' => 'Requester',
          'amount' => 'Amount',
          'registerDate' => 'Register date',
          'status' => 'Status'
      ],
      'pagination' => [
          'prev' => 'prev',
          'next' => 'next'
      ],
      'no_data' => 'no data',
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
