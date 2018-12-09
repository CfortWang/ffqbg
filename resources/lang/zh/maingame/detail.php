<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/ko/event/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '主游戏管理',
        'depth1' => '主页',
        'depth2' => '主游戏管理',
        'depth3' => '主游戏详情',
    ],
    
    /*** Contents ***/
    'contents' => [
        'round' => [
            'round' => '',
            'status' => [
                'progress' => '进行中',
                'draw' => '开奖中',
                'complete' => '已结束',
            ],
            'nums' => '中奖号码',
            'write_nums' => '输入中奖号码',
            
        ],
        'point' => [
            'title' => '累计喜豆点信息',
            'current' => '本次抽奖累计喜豆点数量',
            'last' => '继承上期奖池的喜豆点',
            'current_win' => '本次抽奖应发放的喜豆点',
            'remain' => '应继承到下期抽奖活动的喜豆点',
        ],
        'entry' => [
            'total_cnt' => '参与情况统计',
            'round' => '',
            'code' => '扫码参与数量',
            'ticket' => '用券参与数量',
        ],
        'win' => [
            'title' => '获奖情况',
        ],
        'win_list' => [
            'title' => '获奖用户列表',
        ],
        'list' => '列表',
    ],

    /*** Table ***/
    'table' => [
        'win' => [
            'title' => [
                'rank' => '中奖等级',
                'cnt' => '中奖人数',
                'personal_prize' => '人均奖励',
                'total_prize' => '小计',
            ],
            'contents' => [
                'rank1' => '一等奖',
                'rank2' => '二等奖',
                'rank3' => '三等奖',
                'rank4' => '四等奖',
                'rank5' => '五等奖',
                'rank6' => '六等奖', 
            ],
        ],
        'win_list' => [
            'title' => [
                'no' => '序号',
                'phone' => '手机号',
                'rank' => '中奖等级',
                'prize' => '奖励',
                'entry_type' => '参与方式',
            ],
            'contents' => [
                'code' => '扫码参与',
                'ticket' => '用券参与',
            ],
            'search' => '搜索',
            'no_data' => '暂无数据',
        ],
    ],

    /*** Modal ***/
    'modal' => [
        'title' => '输入获奖号码',
        'round' => '',
        'red_ball' => '红球',
        'blue_ball' => '蓝球',
        'close' => '关闭',
        'save' => '保存',
    ],

    'message' => [
        'insert' => '您确定要录入此号码吗？?',
        'success' => '录入成功',
        'error' => '服务器错误',
    ],
];
