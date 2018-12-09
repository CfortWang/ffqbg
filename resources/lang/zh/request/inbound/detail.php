<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/request/inbound/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '喜豆码请求',
        'depth1' => '主页',
        'depth2' => '喜豆码请求',
        'depth3' => '入库详情'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => '入库请求详情',
        'list' => '返回列表',
        'response' => '处理',
        'requestConfirm' => '确认',
        'requestInfo' => [
            'title' => '请求信息',
            'requester' => '请求 ID',
            'amount' => '数量',
            'status' => '状态',
            'requestDate' => '请求日期',
            'confirmedDate' => '确认时间',
            'responsedDate' => '处理时间',
            'canceledDate' => '删除日期',
            'forwardedDate' => 'Forward date'
        ],
        'history' => [
            'title' => '请求记录',
            'table' => [
                'title' => [
                    'type' => '类型',
                    'id' => 'ID',
                    'status' => '状态'
                ],
                'contents' => [
                    'seller' => '零售代表',
                    'agency' => '区县销售合伙人',
                    'distributor' => '市级销售合伙人',
                    'provider' => '省级销售合伙人',
                    'headquarter' => '总部'
                ]
            ]
        ],
        'package' => [
            'title' => '发货',
            'table' => [
                'search' => '搜索',
                'title' => [
                    'code' => '喜豆码',
                    'type' => '类型',
                    'startno' => '起始码',
                    'endno' => '结束码',
                    'createdDate' => '创建日期',
                    'status' => '状态'
                ],
                'pagination' => [
                    'prev' => '上一页',
                    'next' => '下一页'
                ],
                'no_data' => '暂无数据'
            ]
        ]
    ],

    /*** Message ***/
    'message' => [
        'confirm' => '是否确认此请求?',
        'response' => '是否处理选中的请求?',
        'error' => '服务器错误'
    ]
];
