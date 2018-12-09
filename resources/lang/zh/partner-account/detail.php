<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/partner-account/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '合伙人管理',
        'depth1' => '主页',
        'depth2' => '合伙人管理',
        'depth3' => '合伙人详情'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title'=> '合伙人详情',
        'change' => '修改信息',
        'delete' => '删除账户',
        'list' => '返回列表',
        'user'=> [
            'title' => '用户信息',
            'phone_num' => '手机',
            'phone' => '手机',
            'email' => 'E-mail',
            'name' => '姓名',
            'id' => 'ID',
            'created_at' => '创建日期',
            'gender' => [
                'male' => '男',
                'female' => '女',
                'title' => '性别',
            ]
        ],
        'bank' => [
                    'title' => '银行账户信息',
                    'bank_name' => '开户银行',
                    'account_num' => '开户账号',
                    'account_owner' => '开户姓名',
        ],
        'qualification' => [
            'title' => '授权状态',
            'name' => '合作商权限',
            'region' => '区域',
            'recommender' => '推荐人',
            'created_at' => '注册时间',
            'status' => '状态',
            'add' => '添加角色权限',
            'button' => '添加角色权限',
            'active' => '激活',
            'inactive' => '未激活',
            'city' => '城市',
            'province' => '省份',
            'area' => '地区',
            
        ],
        'modal' => [
            'title' => '增加区域',
            'msg' => '输入物流单号 ',
            'cancel' => '删除',
            'submit' => '增加',
        ],
        'select' => [
            'title' => '权限',
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
    ],
        
];
