<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/marketing-event/event/detail.php
return [
    'header'    => [
        'title'     => 'Marketing Event managent',
        'depth1'    => 'home',
        'depth2'    => 'Marketing Event managent',
        'depth3'    => 'Marketing Event detail'
    ],
    'title'     => 'Marketing Event Detail',
    'title-1'   => 'Event Info',
    'title-2'   => 'Gift 1',
    'title-3'   => 'Gift 2',
    'title-4'   => 'Gift 3',
    'label'     => [
        'title'             => 'Title',
        'start-time'        => 'Start Time',
        'end-time'          => 'End Time',
        'target'            => 'Target Region',
        'target-country'    => 'Target Country',
        'target-province'   => 'Target Province',
        'type'              => 'Type',
        'losing-image'      => 'Losing Image',
        'prize'             => 'Prize',
        'type-gift'         => 'Type',
        'start-time-gift'   => 'Start Hour',
        'end-time-gift'     => 'End Hour',
        'total-win'         => 'Gift Count',
        'frequency'         => 'Frequency',
        'percentage'        => 'Percentage',
        'select-days'       => 'Select Days',
        'result-image'      => 'Result Image',
        'detail-image'      => 'Detail Image',
        'remark'            => 'Remark'
    ],
    'check-box' => [
        'target-type'   => [
            'option-1'  => 'country',
            'option-2'  => 'province',
        ],
        'type'  => [
            'option-1'  => 'frequency',
            'option-2'  => 'percentage',
        ],
        'mon'   => 'Mon',
        'tue'   => 'Tue',
        'wed'   => 'Wed',
        'thu'   => 'Thu',
        'fri'   => 'Fri',
        'sat'   => 'Sat',
        'sun'   => 'Sun',
    ],
    'button'    => [
        'losing-image'  => 'Upload',
        'result-image'  => 'Upload',
        'detail-image'  => 'Upload',
        'delete'        => 'Delete Marketing Event',
        'modify'        => 'Modify Marketing Event',
        'activate'      => 'Activate Marketing Event',
        'stop'          => 'Stop Marketing Event',
        'list'          => 'List',
        'register-gift' => 'Register Gift',
        'modify-gift'   => 'Modify Gift',
        'delete-gift'   => 'Delete Gift',
    ],
    'select'    => [
        'country'   => [
            'default'   => 'Country',
        ],
        'province'  => [
            'default'   => 'Province',
        ],
        'type-gift'  => [
            'delivery'  => 'Delivery',
            'point'     => 'Point',
            'cash'      => 'Cash',
        ],

    ],
    'ajax'  => [
        'get-detail'  => [
            '200'   => [
                '200'   => 'Success',
            ],
            '400'   => [
                '400'   => 'Parameters are invalid',
            ]
        ],
        'modify'  => [
            '200'   => [
                '200'   => 'Success',
            ],
            '400'   => [
                '400'   => 'Parameters are invalid',
            ]
        ],
        'get-country-list'  => [
            '404'   => [
                '404'   => 'Fail'
            ]
        ],
        'get-location-list'  => [
            '404'   => [
                '404'   => 'Fail'
            ]
        ]
    ],
    'gift'  => [
        'title-1'   => 'Regisetr Marketing Event Gift',
        'title-2'   => 'Maketing Event Gifts',
        'title-3'   => 'Maketing Event Gift Info',
    ],
    'alert' => [
        'title-error'           => 'invalid title',
        'start-time-error'      => 'invalid start time',
        'end-time-error'        => 'invalid end time',
        'time-range-error'      => 'invalid time range',
        'target-type-error'     => 'invalid target',
        'country-error'         => 'invalid country',
        'province-error'        => 'invalid province',
        'type-error'            => 'invalid type',
        'losing-image-error'    => 'invalid losing image',
    ],
];
