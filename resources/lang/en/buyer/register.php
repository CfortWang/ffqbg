<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/buyer/register.php
return [
    'header' => [
        'title' => 'Buyer management',
        'depth1' => 'home',
        'depth2' => 'Buyer management',
        'depth3' => 'Create buyer account'
    ],
    'contents' => [
        'title'     => 'Register Buyer',
        'title-1'   => 'Account Info',
        'title-2'   => 'Bank Account Info',
        'title-3'   => 'Shop Info',
        'description'=>'Description',
        'map'        =>'Location map'
    ],
    'select' => [
        'default-option'    => [
            'country'   => 'country',
            'province'  => 'province',
            'city'      => 'city',
            'area'      => 'area',
        ]
    ],
    'label' => [
        'id'                => 'ID',
        'password'          => 'PW',
        'rep-name'          => 'Rep. Name',
        'rep-phone-num'     => 'Rep. Phone Number',
        'sales-partner'     => 'Sales Partner ID',
        'name'              => 'Name',
        'phone-num'         => 'Phone Number',
        'country'           => 'Country',
        'province'          => 'Province',
        'city'              => 'City',
        'area'              => 'Area',
        'address-detail'    => 'Detail Address',
        'bank'              =>'bank',
        'account_num'       => 'Account Num',
        'account_owner'     =>'Accout Owner',
        'branch_name'       =>'Branch Name',
        'category'          =>'Category',
        'telephone'         =>'Telephone',
        'homepage'          =>'Home Page',
     ],
    'placeholder'   => [
        'id'                => 'Insert ID',
        'password'          => 'Insert Password',
        'rep-name'          => 'Insert Rep. Name',
        'rep-phone-num'     => 'Insert Rep. Phone Number',
        'name'              => 'Insert Name',
        'phone-num'         => 'Insert Phone Number',
        'address-detail'    => 'Insert Detail Address',
        'account_num'       => 'insert Account Num',
        'account_owner'     =>'insert Accout Owner',
        'branch_name'       =>'Branch Name',
        'category'          =>'select Category',
        'telephone'         =>'insert Telephone',
        'homepage'          =>'insert homepage',
    ],
    'button'    => [
        'check-id'              => 'Dup.Check',
        'search-sales-partner'  => 'Search',
        'register'              => 'Register',
        'list'                  => 'List'
    ],
    'ajax-1'    => [
        '200'   => 'Available To Use',
        '409'   => 'Already Exist ID',
    ],

    'modal-1'   => [
        'title' => 'Select Sales Partner',
        'table' => [
            'header' => [
                'no'            => 'NO.',
                'type'          => 'Type',
                'id'            => 'ID',
                'name'          => 'Name',
                'country-name'  => 'Country Name',
                'province-name' => 'Province Name',
                'city-name'     => 'City Name',
                'area-name'     => 'Area Name',
                'created-at'    => 'Reg. Date',
                'status'        => 'Status'
            ],
            'button'   => [
                'select'    => 'Select'
            ]
        ],
        
    ],

    'modal-2'   => [
        'title' => 'Point Detail',
        'table' => [
            'header' => [
                'no'            => 'No',
                'id'            => 'ID',
                'name'          => 'Name',
                'point'         =>'point',
                'total_point_in'         =>'total_point_in',
                'total_point_out'         =>'total_point_out',
                'status'        => 'Status'
            ],
            'button'   => [
                'select'    => 'Select'
            ]
        ],
        
    ]
];
