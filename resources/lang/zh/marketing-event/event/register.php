<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/marketing-event/event/register.php
return [
    'header'    => [
        'title'     => '营销活动管理',
        'depth1'    => '主页',
        'depth2'    => '营销活动管理',
        'depth3'    => '创建营销活动'
    ],
    'title'     => '创建营销活动',
    'title-1'   => '活动信息',
    'title-2'   => '奖品 1',
    'title-3'   => '奖品 2',
    'title-4'   => '奖品 3',
    'label'     => [
        'title'             => '标题',
        'start-time'        => '开始时间',
        'end-time'          => '结束时间',
        'target'            => '目标区域',
        'target-country'    => '目标国家',
        'target-province'   => '目标省份',
        'type'              => '类别',
        'losing-image'      => '中奖图片',
        'gift-title'        => '标题',
        'gift-start-time'   => '开始时间<小时>',
        'gift-end-time'     => '结束时间<小时>',
        'total-win'         => '奖品数量',
        'frequency'         => '按频率',
        'percentage'        => '按百分比',
        'select-days'       => '选择天数',
        'result-image'      => 'Result Image',
        'detail-image'      => 'Detail Image',
        'remark'            => '备注'
    ],
    'check-box' => [
        'target-type'   => [
            'option-1'  => '国家',
            'option-2'  => '省份',
        ],
        'type'  => [
            'option-1'  => '按频率',
            'option-2'  => '按百分比',
        ],
        'mon'   => '周一',
        'tue'   => '周二',
        'wed'   => '周三',
        'thu'   => '周四',
        'fri'   => '周五',
        'sat'   => '周六',
        'sun'   => '周日',
    ],
    'button'    => [
        'losing-image'  => '上传',
        'result-image'  => '上传',
        'detail-image'  => '上传',
        'register'      => '创建营销活动',
        'list'          => '列表',
    ],
    'select'    => [
        'country'   => [
            'default'   => '国家',
        ],
        'province'  => [
            'default'   => '省份',
        ]
    ],
    'ajax'  => [
        'register'  => [
            '200'   => [
                '200'   => '成功',
            ],
            '400'   => [
                '400'   => '无效的参数',
            ],
        ],
        'get-country-list'  => [
            '404'   => [
                '404'   => '失败'
            ],
        ],
        'get-location-list'  => [
            '404'   => [
                '404'   => '失败'
            ],
        ],
    ],
    'alert' => [
        'title-error'           => '无效的标题',
        'start-time-error'      => '无效的开始时间',
        'end-time-error'        => '无效的结束时间',
        'time-range-error'      => '无效的时间范围',
        'target-type-error'     => '无效的目标',
        'country-error'         => '无效的国家信息',
        'province-error'        => '无效的省份信息',
        'type-error'            => '无效的类型',
        'losing-image-error'    => '无效的中奖图片',
    ],
];
