<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/ko/event/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => 'Main Game Management',
        'depth1' => 'home',
        'depth2' => 'main game management',
        'depth3' => 'main game detail',
    ],
    
    /*** Contents ***/
    'contents' => [
        'round' => [
            'round' => '',
            'status' => [
                'progress' => 'progress',
                'draw' => 'drawing',
                'complete' => 'complete',
            ],
            'nums' => 'winning numbers',
            'write_nums' => 'insert winning numbers',
            
        ],
        'point' => [
            'title' => 'accumulated point info',
            'current' => 'accumulated point of this drawing',
            'last' => 'point that passed from the previous drawing',
            'current_win' => 'winning point of this drawing',
            'remain' => 'point that will be passed to the next drawing',
        ],
        'entry' => [
            'total_cnt' => 'entry count',
            'round' => '',
            'code' => 'count of entered by code',
            'ticket' => 'count of entered by ticket',
        ],
        'win' => [
            'title' => 'winner info',
        ],
        'win_list' => [
            'title' => 'winner list',
        ],
        'list' => 'list',
    ],

    /*** Table ***/
    'table' => [
        'win' => [
            'title' => [
                'rank' => 'rank',
                'cnt' => 'count',
                'personal_prize' => 'personal prize',
                'total_prize' => 'total prize',
            ],
            'contents' => [
                'rank1' => '1st',
                'rank2' => '2nd',
                'rank3' => '3rd',
                'rank4' => '4th',
                'rank5' => '5th',
                'rank6' => '6th', 
            ],
        ],
        'win_list' => [
            'title' => [
                'no' => 'No',
                'phone' => 'phone number',
                'rank' => 'rank',
                'prize' => 'prize',
                'entry_type' => 'entry type',
            ],
            'contents' => [
                'code' => 'code',
                'ticket' => 'ticket',
            ],
            'search' => 'search',
            'no_data' => 'no data',
        ],
    ],

    /*** Modal ***/
    'modal' => [
        'title' => 'insert winning numbers',
        'round' => '',
        'red_ball' => 'red balls',
        'blue_ball' => 'blue ball',
        'close' => 'close',
        'save' => 'save',
    ],

    'message' => [
        'insert' => 'do you wanna register the numbers are inserted?',
        'success' => 'numbers are registered',
        'error' => 'server error',
    ],
];
