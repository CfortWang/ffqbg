<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/stamp/setting.php

return [
    'header' => [
        'title' => '买家管理',
        'depth1' => '主页',
        'depth2' => '买家',
        'depth3' => '电子积分卡',
    ],

    'contents' => [
        'title'    => '积分卡设置',
        'stamp' => [
            'title' => '电子积分卡'
        ],
        'name'     => '商店名称',
        'reserve'  => '保有印章',
        'status'   => '状态',
        'gift' => [
            'name' => '状态',
            'name1' => '状态',
            'needed' => '剩余印章'
        ]
    ],
    'button'  =>[
        'save'=>'保存',
        'select' => '选择',
        'activation' => '激活',
        'stop' => '停止',
        'remove' => '移除',
        'list'   =>'买家列表'
    ],
    'coupon'  =>[
        'title'=>'优惠券列表',
        'table' => [
            'search' => '搜索',
            'title' => [
                'no'      => 'No',
                'user_id' => '用户id',
                'gift'    => '礼物',
                'register_date' => '注册时间',
                'Used_date'     => '使用日期',
                'expire'        => '到期期限',
                'used_stamp'    => '积分使用',
                'status'        => '状态',
            ],
            'contents' => [
                'is_cert_yes' => '是',
                'is_cert_no' => '否',
                'day' => 'days',
            ],
            'pagination' => [
                'prev' => '上一页',
                'next' => '下一页'
            ],
            'no_data' => '没有数据',
            'status' => [
                'all' => '全部',
                'registered' => '注册',
                'used' => '使用',
                'expired' => '到期',
            ]
        ]
    ],
    'user'  =>[
        'title'=>'用户列表',
        'table' => [
            'search' => '搜索',
            'title' => [
                'no' => 'No',
                'user_id' => '用户id',
                'total_stamp' => '总积分',
                'register_date' => '注册时间',
                'update_date' => '更新时间',
            ],
            'contents' => [
                'is_cert_yes' => '是',
                'is_cert_no' => '否',
                'day' => 'days',
            ],
            'pagination' => [
                'prev' => '上一页',
                'next' => '下一页'
            ],
            'no_data' => '没有数据'
        ]
    ],
    'table' => [
        'header' => [
            'no' => 'No',
            'name' => '姓名',
            'expire' => '到期时间',
            'date'   => '日期',
            'action' => '激活',
        ],
        'contents' => [
            'is_cert_yes' => '是',
            'is_cert_no' => '否',
            'day' => '时间',
        ],
        'pagination' => [
            'prev' => '上一页',
            'next' => '下一页'
        ],
        'no_data' => '没有数据',
        'search' => '搜索',
    ],
    'message' => [
        'gift1StampCheck' => 'Gift1积分必须在Gift2，Gift3积分下.',
        'gift2StampCheck' => 'Gift2积分必须在Gift3积分和Gift1积分上.',
        'gift3StampCheck' => 'Gift3积分必须在Gift1，Gift2积分上.',
        'stampStepValidation' => '您必须插入预留标记.',
        'noneGiftValidation' => '您必须至少插入一个奖品信息.',
        'gift1Validation' => '您必须插入Gift1积分.',
        'gift2Validation' => '您必须插入Gift2积分.',
        'gift3Validation' => '您必须插入Gift3积分.',
        'parameterErr' => '参数错误.',
        'stampRegiSuccess' => '保存积分信息成功.',
        'activationSuccess' => '积分已启动.',
        'stopSuccess' => '积分已停止.',
        'noBuyer' => '没有买家.(参数错误)'
    ]
];

