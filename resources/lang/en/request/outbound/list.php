<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/outbound/list.php

return [
  /*** Header ***/
  'header' => [
      'title' => 'Package Request',
      'depth1' => 'Home',
      'depth2' => 'Package request',
      'depth3' => 'Outbound list'
  ],
  
  /*** Contents ***/
  'contents' => [
      'title' => 'Outbound request list',
      'registerRequest' => 'Create Request'
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
      'requestType' => [
        'provider' => 'Provider',
        'distributor' => 'Distributor',
        'agency' => 'Agency',
        'seller' => 'Seller'
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
