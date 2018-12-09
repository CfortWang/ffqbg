<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/inbound/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'Package Request',
        'depth1' => 'Home',
        'depth2' => 'Package request',
        'depth3' => 'Inbound detail'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => 'Detail of inbound request',
        'list' => 'List',
        'response' => 'Do response',
        'requestConfirm' => 'Confirm',
        'requestInfo' => [
            'title' => 'Request Info',
            'requester' => 'Requester ID',
            'amount' => 'Amount',
            'status' => 'Status',
            'requestDate' => 'Request date',
            'confirmedDate' => 'Confirm date',
            'responsedDate' => 'Response date',
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
        'package' => [
            'title' => 'Sent Packages',
            'table' => [
                'search' => 'search',
                'title' => [
                    'code' => 'Code',
                    'type' => 'Type',
                    'startno' => 'Start No',
                    'endno' => 'End No',
                    'createdDate' => 'Created Date',
                    'status' => 'Status'
                ],
                'pagination' => [
                    'prev' => 'prev',
                    'next' => 'next'
                ],
                'no_data' => 'no data'
            ]
        ]
    ],

    /*** Message ***/
    'message' => [
        'confirm' => 'Do you want to confirm this request?',
        'response' => 'Do you want to response this request with selected Packages?',
        'error' => 'Server error'
    ]
];
