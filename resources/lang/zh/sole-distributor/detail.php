<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/sole-distributor/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '合伙人管理',
        'depth1' => '主页',
        'depth2' => '合伙人管理',
        'depth3' => '市级合伙人详情'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title'=> '市级合伙人详情',
        'change' => '修改信息',
        'list_button' => '返回列表',
        'sales'=> [
            'title' => '合伙人信息',
            'level' => '等级',
            'location' => '位置',
            'recommender_id' => '推荐人 ID',
            'created_at' => '注册日期',
        ],
        'partner' => [
            'title' => '合伙人账户信息',
            'id' => 'Id',
            'name' => '姓名',
            'button' => '账户详情',
            'created_at' => '注册日期',
        ],
        'status' => [
            'recode' => [
                'total' => '全部记录',
                'current_mouth' => '本月记录',
                'title' => '记录状态',
                'button' => '记录详情',                
            ],
            'point' => [
                'title' => '积分状态',
                'reserved' => '积分余额',
                'usable' => '可用积分',
                'cashed' => '提现积分',
                'button' => '积分详情',
            ],
        ],
        'list' => [
            'title' => '拥有喜豆券列表',
            'number' => '喜豆码<盒>代码',
            'code_type' => '喜豆码类型',
            'start_no' => '起始码',
            'end_no' => '结束码',
            'created_at' => '创建日期',
            'status' => '状态',
        ],
        'relation' => [
            'title' => '合伙人关系',
            'recode' => '全部记录',
            'provider_id' => '省级销售合伙人 ID',
            'distributor_id' => '市级销售合伙人 ID',
            'agency_id' => '区县销售合伙人 ID',
            'seller_id' => '零售代表 ID',
        ],
        'bank' => [
                    'title' => '银行账户信息',
                    'bank_name' => '开户银行',
                    'account_num' => '开户账号',
                    'account_owner' => '开户姓名',
                ],
        'qualification' => [
            'title' => '权限状态',
            'name' => '权限',
            'region' => '区域',
            'recommender' => '推荐人',
            'created_at' => '注册日期',
            'status' => '状态',
            'add' => '增加授权',
        ]
    ],
    'table' => [
        'search' => '搜索',
        'title' => [
            'no' => 'No',
            'id' => 'ID',
            'register_date' => '注册日期',
            'name' => 'Name',
        ],
        'contents' => [
            'is_cert_yes' => 'Yes',
            'is_cert_no' => 'No'
        ],
        'pagination' => [
            'prev' => '上一页',
            'next' => '下一页'
        ],
        'no_data' => '暂无数据'
    ],
    'modal-1'   => [
        'title' => '记录详情',
        'select-1'  => [
            'option-default'    => '选择年份',
        ],
        'table' => [
            'header'    => [
                'no'        => 'NO.',
                'id'        => 'Id',
                'position'  => '位置',
                'sales'     => '销售',
                'date'      => '日期',
            ]
        ]
    ],
    'modal-2'   => [
        'title' => '积分详情',
        'select-1'  => [
            'option-default'    => '选择年份',
        ],
        'table' => [
            'header'    => [
                'no'            => 'NO.',
                'type'          => '类型',
                'in'            => '定金',
                'out'           => 'Withdrawal',
                'created-at'    => '注册日期',
            ]
        ]
    ]
];
