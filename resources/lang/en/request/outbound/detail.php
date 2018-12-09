<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/outbound/detail.php

return [
    /*** Header ***/
    'header' => [
        'title' => 'Package Request',
        'depth1' => 'Home',
        'depth2' => 'Package request',
        'depth3' => 'Outbound detail'
    ],
  
    /*** Contents ***/
    'contents' => [
        'title' => 'Outbound detail',
        'requestInfo' => [
          'title' => 'Request Info',
          'requester' => 'Requester',
          'respondent' => 'Respondent',
          'amount' => 'Amount',
          'status' => 'Status',
          'requestDate' => 'Request date',
          'confirmedDate' => 'Confirm date',
          'responsedDate' => 'Respond date',
          'canceledDate' => 'Cancel date',
          'forwardedDate' => 'Forward date'
        ],
        'history' => [
          'title' => 'Request history',
          'table' => [
              'title' => [
                  'type' => 'Type',
                  'id' => 'ID',
                  'status' => 'Status'
              ],
              'contents' => [
                  'seller' => 'Seller',
                  'agency' => 'Agency',
                  'distributor' => 'Distributor',
                  'provider' => 'Provider',
                  'headquarter' => 'HeadQuarter'
              ]
          ]
        ],
        'list' => 'List',
        'requestCancel' => 'Cancel'
    ],

    /*** Message ***/
    'message' => [
        'cancel' => 'Do you want to cancel the this request?',
        'cancelSuccess' => 'Cancel success!',
        'error' => 'Server Error'
    ]
];
