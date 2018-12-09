<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/partner-account/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'Partner management',
        'depth1' => 'home',
        'depth2' => 'Partner management',
        'depth3' => ' Create partner account'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title'=> 'Register partner',
        'rigister' => 'Rigister',
        'list' => 'List',
        'user'=> [
            'password' => 'Password',
            'password_check' => 'Password check',
            'title' => 'User information',
            'phone_num' => 'Phone',
            'phone' => 'Phone',
            'email' => 'E-mail',
            'name' => 'Name',
            'id' => 'ID',
            'created_at' => 'Register Date',
            'confirm' => 'Duplication',
            'gender' => [
                'male' => 'Male',
                'female' => 'Female',
                'title' => 'Gender',
            ]
        ],
        'bank' => [
                    'title' => 'Bank account information',
                    'bank_name' => 'Bank Name',
                    'account_num' => 'Account Num',
                    'account_owner' => 'Account Owner',
                    'owner_name' => 'Owner name'
                ],
        'qualification' => [
            'title' => 'Qualification status',
            'name' => 'Qualification',
            'region' => 'Region',
            'recommender' => 'Recommender',
            'register_date' => 'Register Date',
            'status' => 'Status',
            'add' => 'Add qualification',
        ],
        'select' => [
            'title' => 'Select region',
            'provider' => [
                'title' => 'Provider',
                'distributor' => 'Distributor',
                'agency' => 'Agency',
                'seller' => 'Seller',
            ],
            'country' => 'Country',
            'province' => 'Province',
            'city' => 'City',
            'area' => 'Area',
            'recomender_id' => 'Recommender ID',
            'choose' => 'Choose',
        ],
        'modal' =>[
            'title' => 'Choose soles',
            'cancel' => 'Cancel',
            'submit' => 'Submit',
        ]
    ],

    /*** Tables ***/
    'table' => [
        'search' => 'Search',
        'title' => [
            'no' => 'No',
            'id' => 'ID',
            'register_date' => 'Register Date',
            'type' => 'Type',
            'province' => 'province',
            'city' => 'City',
            'action' => 'Action',
            
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
    ]

    
];
