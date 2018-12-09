<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/user/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'User Management',
        'depth1' => 'Home',
        'depth2' => 'User',
        'depth3' => 'User Detail'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => 'User Detail',
        'user' => [
            'title' => 'User Info',
            'phone' => 'Mobile',
            'email' => 'Email',
            'nickname' => 'Nickname',
            'name' => 'Name',
            'birthday' => 'Birth',
            'gender' => [
                'title' => 'Gender',
                'male' => 'Male',
                'female' => 'Female',
            ],
            'marry' => [
                'title' => 'Married',
                'married' => 'Married',
                'single' => 'Non married',
            ],
            'region' => [
                'province' => 'Province',
                'city' => 'City',
                'area' => 'Area',
            ],
            'recommend_code' => 'Recommend Code',
            'created_at' => 'Register Date', 
            'last_login_at' => 'Last Login',
        ],
        'submit' => 'Modify',
        'point' => [
            'title' => 'Point',
            'user_point' => 'User Point',
            'list' => 'Point detail',
        ],
        'ticket' => [
            'user_ticket' => 'Current Ticket',
            'sheet' => '',
        ],
        'entry' => [
            'title' => 'Main game history',
            'round' => '',
            'search' => 'Serarch',
            'table' => [
                'no' => 'No',
                'ball1' => 'ball1',
                'ball2' => 'ball2', 
                'ball3' => 'ball3',
                'ball4' => 'ball4',
                'ball5' => 'ball5',
                'ball6' => 'ball6',
                'ball7' => 'ball7',
                'date' => 'Date',
            ],
            'pagination' => [
                'prev' => 'Prev',
                'next' => 'Next',
            ],
            'no_data' => 'No data',
        ],
        'list' => 'List',
    ],

    /*** Modal ***/
    'modal' => [
        'title' => 'Point Info',
        'user_point' => 'User Point',
        'list' => 'List',
        'table' => [
            'no' => 'No',
            'point' => 'Point',
            'description' => 'Desc',
            'date' => 'Date',
        ],
        'close' => 'Close',
    ],

    'message' => [
        'modify' => [
            'confirm' => 'Do you want to modify the User info?',
            'success' => 'Success.',
            'error' => 'Server error.',
        ],
        'nickname_validation' => 'Please insert the nickname.',
    ],

    'point' => [
        'type'  => [
            'recommender'       => 'Recommender Point',
            'recommend'         => 'Recommendee Point',
            'ticket'            => 'Buy Ticket',
            'identification'    => 'Identification',
            'add_info'          => 'Addtional Info',
            'cash_out'          => 'Cash Out',
        ]
    ]
];
