<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/package/detail.php
return [
    'header' => [
        'title'     => '喜豆码管理',
        'depth1'    => '主页',
        'depth2'    => '喜豆码管理',
        'depth3'    => '喜豆码列表',
        'depth4'    => '喜豆码详情'
    ],
    'package-detail' => [
        'title'             => '喜豆码详情',
        'seq'               => '喜豆码编码.',
        'status'            => '状态',
        'type'              => '码类型',
        'start-code-seq'    => '起始编号',
        'end-code-seq'      => '终止编号',
        'registered-at'     => '创建日期',
        'out-at'            => '快递时间',
        'sold-at'           => '卖出时间',
    ],
    'code-list-table'   => [
        'title'     => '喜豆码列表',
        'header'    => [
            'no'                        => '喜豆码编号',
            'max-users-cnt-per-code'    => '可被扫描次数',
            'entry-cnt-per-code'        => '被统计次数',
            'status'                    => '状态'
        ]
    ],
    'distribution-table'    => [
        'title'     => '分销状态',
        'header'    => [
            'provider'      => '省级销售合伙人',
            'distributor'   => '市级销售合伙人',
            'agency'        => '区县销售合伙人',
            'seller'        => '零售代表',
        ],
        'row-1-label'   => 'ID',
        'row-2-label'   => '状态',
        'row-3-label'   => '入库时间',
        'row-4-label'   => '发货时间',
    ],
    'sales' => [
        'title' => '销售状态',
    ],
    'sales-detail'  => [
        'title'                 => '销售详情',
        'seller-name'           => '零售代表',
        'buyer-name'            => '商家',
        'package-sales-price'   => '卖价',
        'payment-type'          => '付款方式',
        'status'                => '状态',
    ],
    'sold-package-list-table'  => [
        'title'     => '卖出喜豆码列表',
        'header'    => [
            'no'    => '喜豆码编码'
        ],
    ],
    'ajax-1'  => [
        '200'       => '成功',
        '400'       => '参数错误',
        '404'       => '页面未找到',
        '500'       => '服务器错误',
    ],
    'ajax-2'  => [
        '200'       => '成功',
        '400'       => '参数错误',
        '404'       => '页面未找到',
        '500'       => '服务器错误',
    ],
    'ajax-3'  => [
        '200'       => '成功',
        '400'       => '参数错误',
        '404'       => '页面未找到',
        '500'       => '服务器错误',
    ],
];
