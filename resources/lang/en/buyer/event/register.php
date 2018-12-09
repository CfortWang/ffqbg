<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/buyer/register.php
return [
    'header' => [
        'title' => 'Buyer management',
        'depth1' => 'Home',
        'depth2' => 'Buyer',
        'depth3' => 'Event',
        'depth4' => 'Event Detail',
        'depth5' => 'Event Detail',

    ],
    'contents' => [
        'title'     => 'Register Event',
        'title-1'   => 'Event Info',
        'title-2'   => 'Package Info',
        'title-3'   =>'Gift info',
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
        'title'               => 'Title',
        'total_cnt'           => 'Total count',
        'name'                => 'Name',
        'expire_day'          => 'Expire period',
        'type'                => 'Type',
        'remark'              => 'Remark',     
        'quanty'              =>'My Package quantities',
        'condition'           =>'Condition',
        'status'              =>'status',
        'winner_cnt'          =>'winner_cnt',
        'entry_cnt'           =>'Total Entry',
        'result_img'          =>'Result image',
        'gift'                =>'Gift',
    ],
    'placeholder'   => [
        'title'              => 'Insert Title',
        'total_cnt'          => 'Insert Total count',
        'condition'          => 'Insert condition',
        'name'               => 'name',
        'expire_day'         => 'expire_day',
        'status'             =>'status',
    ],
    'button'    => [
        'search-sales-partner'  => 'Search',
        'register'              => 'Create event',
        'list'                  => 'List',
        'modify'                => 'Modify',
        'active'                => 'Activation',
        'stopped'               => 'stopped',
    ],  
    'message'=>[
        'checktitle'=>'must insert title',
        'checktotal_cnt'=>'must total count',
        'checkcondition'=>'must insert condidition',
        'registerSuccess'=>'register event success', 
    ]   
];
