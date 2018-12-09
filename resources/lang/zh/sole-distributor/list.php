<?php
// [zh] 중국어 Chinese 中國 CHINA
// resources/lang/zh/partentAccount/list.php
return [
    /*** Header ***/
    'header' => [
        'title' => '合伙人管理',
        'depth1' => '主页',
        'depth2' => '合伙人管理',
        'depth3' => '市级销售合伙人详情',
        'depth4' => '合伙人详情'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => '合伙人列表'
    ],
    /* Status */
    'status' => [
        'title' => '市级销售合伙人状态',
        'provider' => '省级销售合伙人',
        'distributor' => '市级销售合伙人状态',
        'agency' => '区县销售合伙人',
        'register' => '注册用户',
        'inactive' => '未激活',
    ],
    /*** Tables ***/
    'table' => [
        'search' => '搜索',
        'title' => '市级销售合伙人详情',
        'provider' => '省级销售合伙人',
        'distributor' => '区县销售合伙人',
        'agency' => '注册用户',
        'inactive' => '未激活',
        'active' => '激活',
        'contents' => [
            'is_cert_yes' => 'Yes',
            'is_cert_no' => 'No'
        ],
        'header' => [
            'no' => 'No',
            'id' => 'ID',
            'register_date' => '注册日期',
            'name' => '姓名',
            'province' => '省份',
            'city' => '城市',
            'area' => '区县',
            'recommender' => '推荐人',
            'register Date' => '注册用户',
            'status' => '状态',
        ],
        'pagination' => [
            'prev' => '上一页',
            'next' => '下一页'
        ],
        'province' => [
            'label' => '省份',
            'select_title' => '选择省份',
        ],
        'city' => [
            'label' => '城市',
            'select_title'=> '选择城市',
        ],
        'no_data' => '暂无数据',
    ]
];
