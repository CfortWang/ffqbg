<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/seller/detail.php
return [
    'header' => [
        'title' => 'Partner management',
        'depth1' => 'home',
        'depth2' => 'Partner management',
        'depth3' => 'Seller Detail'
    ],
    'panel-1'   => [
        'title'         => 'Seller Detail',
        'sub-title-1'   => 'Sales Partner Info',
        'sub-title-2'   => 'Partner Account Info',
        'sub-title-3'   => 'Record Status',
        'sub-title-4'   => 'Point Status',
    ],
    'panel-2'   => [
        'title' => 'Owned Package List',
    ],
    'label' => [
        'status'                => 'Status',
        'type'                  => 'Type',
        'location'              => 'Location',
        'created-at'            => 'Reg.Date',
        'recommender-id'        => 'Recommender ID',
        'account-id'            => 'ID',
        'account-name'          => 'Name',
        'total-record'          => 'Total Record',
        'current-month-record'  => 'Record Of This Month',
        'reserved-point-in'     => 'Reserved Point',
        'point'                 => 'Usable Point',
        'total-point-out'       => 'Cashed Point',
    ],
    'button'    => [
        'account-detail'    => 'Account Detail',
        'record-detail'     => 'Record Detail',
        'point-detail'      => 'Point Detail',
        'activate'          => 'Activate',
        'list'              => 'List'
    ],
    'ajax-1'    => [
        '200'   => 'Success',
        '400'   => 'Contents are invalid',
    ],
    'confirm'   => [
        'activate'  => 'Do you really want to delete this notice?',
    ],
    'package-list-table'    => [
        'title' => 'Owned Package List',
        'header'    => [
            'no'            => 'NO.',
            'type'          => 'Type',
            'start-code'    => 'Start NO.',
            'end-code'      => 'End NO.',
            'created-at'    => 'Reg.Date',
            'status'        => 'Status'
        ]
    ],
    'modal-1'   => [
        'title' => 'Record Detail',
        'select-1'  => [
            'option-default'    => 'all',
        ],
        'table' => [
            'header'    => [
                'no'        => 'NO.',
                'type'          => 'Type',
                'record'        => 'Record',
                'created-at'    => 'Reg.Date',
            ]
        ]
    ],
    'modal-2'   => [
        'title' => 'Point Detail',
        'select-1'  => [
            'option-default'    => 'all',
        ],
        'table' => [
            'header'    => [
                'no'            => 'NO.',
                'type'          => 'Type',
                'in'            => 'Deposit',
                'out'           => 'Withdrawal',
                'created-at'    => 'Reg.Date',
            ]
        ]
    ]
];
