<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/buyer/register.php
return [
    'header' => [
        'title' => '买家管理',
        'depth1' => '主页',
        'depth2' => '买家管理',
        'depth3' => '创建买家账号'
    ],
    'contents' => [
        'title'     => '注册买家',
        'title-1'   => '账户信息',
        'title-2'   => '银行账户信息',
        'title-3'   => '商铺信息',
        'description'=>'描述'
    ],
    'select' => [
        'default-option'    => [
            'country'   => '国家',
            'province'  => '省份',
            'city'      => '城市',
            'area'      => '地区',
        ]
    ],
    'label' => [
        'id'                => 'ID',
        'password'          => '密码',
        'rep-name'          => '代表姓名',
        'rep-phone-num'     => '代表电话',
        'sales-partner'     => '销售伙伴ID',
        'name'              => '姓名',
        'phone-num'         => '电话号码',
        'country'           => '国家',
        'province'          => '省份',
        'city'              => '城市',
        'area'              => '地区',
        'address-detail'    => '详细地址',
        'bank'              =>'银行',
        'account_num'       => '账号',
        'account_owner'     =>'账号主人',
        'branch_name'       =>'分店名称',
        'category'          =>'类别',
        'telephone'         =>'电话',
        'homepage'          =>'主页',
     ],
    'placeholder'   => [
        'id'                => '添加ID',
        'password'          => '添加密码',
        'rep-name'          => '添加代表姓名',
        'rep-phone-num'     => '添加代表电话',
        'name'              => '添加姓名',
        'phone-num'         => '添加电话号码',
        'address-detail'    => '添加详细地址',
        'account_num'       => '添加账号',
        'account_owner'     =>'添加账号主人',
        'branch_name'       =>'分店名称',
        'category'          =>'选择类别',
        'telephone'         =>'添加手机号码',
        'homepage'          =>'添加主页',
    ],
    'button'    => [
        'check-id'              => '检查ID',
        'search-sales-partner'  => '搜索',
        'register'              => '注册',
        'list'                  => '列表'
    ],
    'ajax-1'    => [
        '200'   => '可用',
        '409'   => 'ID已经存在',
    ],

    'modal-1'   => [
        'title' => '选择销售伙伴',
        'table' => [
            'header' => [
                'no'            => 'NO.',
                'type'          => '类型',
                'id'            => 'ID',
                'name'          => '姓名',
                'country-name'  => '国家名称',
                'province-name' => '省份名称',
                'city-name'     => '城市名称',
                'area-name'     => '地区名称',
                'created-at'    => '注册日期',
                'status'        => '状态'
            ],
            'button'   => [
                'select'    => '选择'
            ]
        ],
        
    ],

    'modal-2'   => [
        'title' => '点细节',
        'table' => [
            'header' => [
                'no'            => 'No',
                'id'            => 'ID',
                'name'          => '名称',
                'point'         =>'点',
                'total_point_in'         =>'总点数',
                'total_point_out'         =>'总指出',
                'status'        => '状态'
            ],
            'button'   => [
                'select'    => '选择'
            ]
        ],
        
    ]
];
