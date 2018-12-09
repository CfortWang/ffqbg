<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/user/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '用户管理',
        'depth1' => '主页',
        'depth2' => '用户',
        'depth3' => '用户详情'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => '用户详情',
        'user' => [
            'title' => '用户信息',
            'phone' => '收集',
            'email' => 'Email',
            'nickname' => '昵称',
            'name' => '姓名',
            'birthday' => '生日',
            'gender' => [
                'title' => '性别',
                'male' => '男',
                'female' => '女',
            ],
            'marry' => [
                'title' => '已婚',
                'married' => '已婚',
                'single' => '未婚',
            ],
            'region' => [
                'province' => '省份',
                'city' => '城市',
                'area' => '区县',
            ],
            'recommend_code' => '推荐码',
            'created_at' => '注册日期', 
            'last_login_at' => '最后登录',
        ],
        'submit' => '修改',
        'point' => [
            'title' => '喜豆点',
            'user_point' => '用户',
            'list' => '喜豆点详情',
        ],
        'ticket' => [
            'user_ticket' => '当前喜豆券',
            'sheet' => '',
        ],
        'entry' => [
            'title' => '主游戏记录',
            'round' => '',
            'search' => '搜索',
            'table' => [
                'no' => 'No',
                'ball1' => 'ball1',
                'ball2' => 'ball2', 
                'ball3' => 'ball3',
                'ball4' => 'ball4',
                'ball5' => 'ball5',
                'ball6' => 'ball6',
                'ball7' => 'ball7',
                'date' => '日期',
            ],
            'pagination' => [
                'prev' => '上一页',
                'next' => '下一页',
            ],
            'no_data' => '暂无数据',
        ],
        'list' => '返回列表',
    ],

    /*** Modal ***/
    'modal' => [
        'title' => '喜豆点信息',
        'user_point' => '用户喜豆点',
        'list' => '列表',
        'table' => [
            'no' => 'No',
            'point' => '喜豆点',
            'description' => '降序',
            'date' => '日期',
        ],
        'close' => '关闭',
    ],

    'message' => [
        'modify' => [
            'confirm' => '是否确认修改信息?',
            'success' => '城市.',
            'error' => '服务器错误',
        ],
        'nickname_validation' => '请输入昵称',
    ],

    'point' => [
        'type'  => [
            'recommender'       => '推荐人获得喜豆点',
            'recommend'         => '被推荐人获得喜豆点',
            'ticket'            => '兑换喜豆券',
            'identification'    => '验证',
            'add_info'          => '附加信息',
            'cash_out'          => '提现',
        ]
    ]
];
