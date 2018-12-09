<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/marketing-event/winner/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '营销活动',
        'depth1' => '主页',
        'depth2' => '营销活动',
        'depth3' => '获奖详情'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => '获奖详情',
        'registerEvent' => '创建活动',
        'event' => [
            'title' => '活动信息',
            'title2' => '标题',
            'max_winner' => 'Max winner',
            'winner_num' => '中奖人数',
        ],
        'winner' => [
            'title' => '获奖信息',
            'no' => 'No',
            'user_iD' => '用户 iD',
            'price' => '奖品',
            'receiver_name' => '获奖人姓名',
            'receiver_phone' => '获奖人电话',
            'receiver_address' => '收货地址',
            'delivery_number' => '运单号',
            'regi_date' => '发货时间',
            'status' => '状态',
            // 'active' => 
            // 'inactive' => 
        ],
        'button' => [
            'reject'=>'驳回',
            'ready'=>'已处理',
            'deliver'=>'已发货',
            'list'=>'返回列表',
        ],
        'modal' => [
            'title' => '物流',
            'title1' => '被驳回',
            'msg' => '请输入运单号 ',
            'msg1' => '请输入驳回原因',
            'cancel' => '删除',
            'submit' => '提交',
        ]
    ],

    /*** Tables ***/
    'table' => [
        'search' => '搜索',
        'title' => [
            'no' => '序号',
            'event_itle' => '活动标题',
            'type' => '类型',
            'status' => '状态'
        ],
        'pagination' => [
            'prev' => '上一页',
            'next' => '下一些'
        ],
        'no_data' => '暂无数据',
        'select' => [
            'all' => '全部',
            'activated' => '激活',
            'stopped' => '终止',
            'deleted' => '删除'
        ]
    ]
];

