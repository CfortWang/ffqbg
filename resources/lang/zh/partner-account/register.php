<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/partner-account/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '合伙人管理',
        'depth1' => '主页',
        'depth2' => '合伙人管理',
        'depth3' => ' 创建合伙人账户'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title'=> '创建合伙人',
        'rigister' => '注册',
        'list' => '返回列表',
        'user'=> [
            'password' => '请输入密码',
            'password_check' => '请再次输入密码',
            'title' => '用户信息',
            'phone_num' => '手机',
            'phone' => '手机',
            'email' => 'E-mail',
            'name' => '姓名',
            'id' => 'ID',
            'created_at' => '创建日期',
            'confirm' => '校验信息是否可用',
            'gender' => [
                'male' => '男',
                'female' => '女',
                'title' => '性别',
            ]
        ],
        'bank' => [
                    'title' => '银行开户信息',
                    'bank_name' => '开户银行',
                    'account_num' => '开户账号',
                    'account_owner' => '开户姓名',
                    'owner_name' => '开户姓名'
                ],
        'qualification' => [
            'title' => '权限状态',
            'name' => '权限',
            'region' => '区域',
            'recommender' => '推荐人',
            'register_date' => '注册时间',
            'status' => '状态',
            'add' => '增加权限',
        ],
        'select' => [
            'title' => '选择区域',
            'provider' => [
                'title' => '省级销售合伙人',
                'distributor' => '市级销售合伙人',
                'agency' => '区县销售合伙人',
                'seller' => '零售代表',
            ],
            'country' => '国家',
            'province' => '省份',
            'city' => '城市',
            'area' => '区县',
            'recomender_id' => '推荐人 ID',
            'choose' => '选择',
        ],
        'modal' =>[
            'title' => '选择销售',
            'cancel' => '删除',
            'submit' => '提交',
        ]
    ],

    /*** Tables ***/
    'table' => [
        'search' => '搜索',
        'title' => [
            'no' => 'No',
            'id' => 'ID',
            'register_date' => '注册时间',
            'type' => '类型',
            'province' => '省份',
            'city' => '城市',
            'action' => 'Action',
            
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
    ]

    
];
