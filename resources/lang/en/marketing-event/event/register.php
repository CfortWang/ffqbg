<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/marketing-event/event/register.php
return [
    'header'    => [
        'title'     => 'Marketing Event managent',
        'depth1'    => 'home',
        'depth2'    => 'Marketing Event managent',
        'depth3'    => 'Create Marketing Event'
    ],
    'title'     => 'Create Marketing Event',
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
        'gift-title'        => 'Title',
        'gift-start-time'   => 'Start Hour',
        'gift-end-time'     => 'End Hour',
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
        'register'      => 'Register Marketing Event',
        'list'          => 'List',
    ],
    'select'    => [
        'country'   => [
            'default'   => 'Country',
        ],
        'province'  => [
            'default'   => 'Province',
        ]
    ],
    'ajax'  => [
        'register'  => [
            '200'   => [
                '200'   => 'Success',
            ],
            '400'   => [
                '400'   => 'Parameters are invalid',
            ],
        ],
        'get-country-list'  => [
            '404'   => [
                '404'   => 'Fail'
            ],
        ],
        'get-location-list'  => [
            '404'   => [
                '404'   => 'Fail'
            ],
        ],
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
