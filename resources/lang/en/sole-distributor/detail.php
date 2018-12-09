<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sole-distributor/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'Partner management',
        'depth1' => 'home',
        'depth2' => 'Partner management',
        'depth3' => 'Sole distributor detail'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title'=> 'Sole distributor detail',
        'change' => 'Change Information',
        'list_button' => 'List',
        'sales'=> [
            'title' => 'Sales Partner Info',
            'level' => 'Level',
            'location' => 'Location',
            'recommender_id' => 'Recommender ID',
            'created_at' => 'Register Date',
        ],
        'partner' => [
            'title' => 'Partner Account Info',
            'id' => 'Id',
            'name' => 'Name',
            'button' => 'Account Detail',
            'created_at' => 'Register Date',
        ],
        'status' => [
            'recode' => [
                'total' => 'Total record',
                'current_mouth' => 'Record of current month',
                'title' => 'Record status',
                'button' => 'Record detail',                
            ],
            'point' => [
                'title' => 'Point status',
                'reserved' => 'Reserved Point',
                'usable' => 'Usable Point',
                'cashed' => 'Cashed Point',
                'button' => 'Point Detail',
            ],
        ],
        'list' => [
            'title' => 'Owned Package List',
            'number' => 'Package Number',
            'code_type' => 'Code Type',
            'start_no' => 'start_no',
            'end_no' => 'end_no',
            'created_at' => 'created date',
            'status' => 'status',
        ],
        'relation' => [
            'title' => 'Partner relation',
            'recode' => 'Total record',
            'provider_id' => 'Provider ID',
            'distributor_id' => 'Distributor ID',
            'agency_id' => 'Agency ID',
            'seller_id' => 'Seller ID',
        ],
        'bank' => [
                    'title' => 'Bank account information',
                    'bank_name' => 'Bank Name',
                    'account_num' => 'Account Num',
                    'account_owner' => 'Account Owner',
                ],
        'qualification' => [
            'title' => 'Qualification status',
            'name' => 'Qualification',
            'region' => 'Region',
            'recommender' => 'Recommender',
            'created_at' => 'Register Date',
            'status' => 'Status',
            'add' => 'Add qualification',
        ]
    ],
    'table' => [
        'search' => 'Search',
        'title' => [
            'no' => 'No',
            'id' => 'ID',
            'register_date' => 'Register Date',
            'name' => 'Name',
        ],
        'contents' => [
            'is_cert_yes' => 'Yes',
            'is_cert_no' => 'No'
        ],
        'pagination' => [
            'prev' => 'Prev',
            'next' => 'Next'
        ],
        'no_data' => 'No data'
    ],
    'modal-1'   => [
        'title' => 'Record Detail',
        'select-1'  => [
            'option-default'    => 'Select Year',
        ],
        'table' => [
            'header'    => [
                'no'        => 'NO.',
                'id'        => 'Id',
                'position'  => 'position',
                'sales'     => 'Sales',
                'date'      => 'Date',
            ]
        ]
    ],
    'modal-2'   => [
        'title' => 'Point Detail',
        'select-1'  => [
            'option-default'    => 'Select Year',
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
