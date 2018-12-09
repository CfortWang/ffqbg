<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/stamp/setting.php

return [
    'header' => [
        'title' => 'Buyer management',
        'depth1' => 'Home',
        'depth2' => 'Buyer',
        'depth3' => 'Stamp',
    ],

    'contents' => [
        'title'    => 'Stamp Setting',
        'stamp' => [
            'title' => 'Stamp Info'
        ],
        'name'     => 'Shop name',
        'reserve'  => 'Reserve Stamp',
        'status'   => 'Status',
        'gift' => [
            'name' => 'Gift',
            'name1' => 'Gift',
            'needed' => 'Needed Stamp'
        ]
    ],
    'button'  =>[
        'save'=>'Save',
        'select' => 'Select',
        'activation' => 'Activation',
        'stop' => 'Stop',
        'remove' => 'Remove',
        'list'   =>'Buyer List'
    ],
    'coupon'  =>[
        'title'=>'Coupon List',
        'table' => [
            'search' => 'Search',
            'title' => [
                'no' => 'No',
                'user_id' => 'User id',
                'gift' => 'Gift',
                'register_date' => 'Register Date',
                'Used_date' => 'Used Date',
                'expire' => 'Expire Date',
                'used_stamp' => 'Used Stamp',
                'status' => 'Status',
            ],
            'contents' => [
                'is_cert_yes' => 'Yes',
                'is_cert_no' => 'No',
                'day' => 'days',
            ],
            'pagination' => [
                'prev' => 'Prev',
                'next' => 'Next'
            ],
            'no_data' => 'No data',
            'status' => [
                'all' => 'All',
                'registered' => 'Registered',
                'used' => 'Used',
                'expired' => 'Expired',
            ]
        ]
    ],
    'user'  =>[
        'title'=>'User List',
        'table' => [
            'search' => 'Search',
            'title' => [
                'no' => 'No',
                'user_id' => 'User ID',
                'total_stamp' => 'Total Stamp',
                'register_date' => 'Register date',
                'update_date' => 'Update Date',
            ],
            'contents' => [
                'is_cert_yes' => 'Yes',
                'is_cert_no' => 'No',
                'day' => 'days',
            ],
            'pagination' => [
                'prev' => 'Prev',
                'next' => 'Next'
            ],
            'no_data' => 'No data'
        ]
    ],
    'table' => [
        'header' => [
            'no' => 'No',
            'name' => 'Name',
            'expire' => 'Expire Period',
            'date' => 'Date',
            'action' => 'Action',
        ],
        'contents' => [
            'is_cert_yes' => 'Yes',
            'is_cert_no' => 'No',
            'day' => 'days',
        ],
        'pagination' => [
            'prev' => 'Prev',
            'next' => 'Next'
        ],
        'no_data' => 'No data',
        'search' => 'Search',
    ],
    'message' => [
        'gift1StampCheck' => 'Gift1 Stamp must be under the Gift2, Gift3 Stamps.',
        'gift2StampCheck' => 'Gift2 Stamp must be under the Gift3 Stamp and over the Gift1 Stamp.',
        'gift3StampCheck' => 'Gift3 Stamp must be over the Gift1, Gift2 Stamps.',
        'stampStepValidation' => 'You must insert reserve stamp.',
        'noneGiftValidation' => 'You must insert Gift information at least one.',
        'gift1Validation' => 'You must insert Gift1 stamp.',
        'gift2Validation' => 'You must insert Gift2 stamp.',
        'gift3Validation' => 'You must insert Gift3 stamp.',
        'parameterErr' => 'Wrong Parameter.',
        'stampRegiSuccess' => 'Save the stamp information succeed.',
        'activationSuccess' => 'Stamp is activated.',
        'stopSuccess' => 'Stamp is stopped.',
        'noBuyer' => 'There is no buyer.(Wrong request)'
    ]
];

