<?php
// [en] ENGLISH ENG eng 영어
// resources/lang/en/buyer/list.php
return [
    'header' => [
        'title' => '提现',
        'depth1' => '主页',
        'depth2' => '提现',
        'depth3' => '提现列表'
    ],

    'contents' => [
        'title' => '提现请求列表' 
    ],
    'button'  =>[
        'excel'=>'导出表格',
        'rejected'=>'驳回',
        'deposited'=>'处理'
    ],
    'table' => [
        'title' => [
            'No'               => '序号',
            'Amount'            => '金额',
            'userID'             => '用户ID',
            'Bank'           => '开户银行',
            'Holder'            =>'开户姓名',
            'Account'             => '开户账号',
            'Register_Date'           => '申请时间',
            'status'            =>'状态'
        ],
        'pagination' => [
            'prev' => '上一页',
            'next' => '下一页'
        ],
        'no_data' => '暂无数据'
    ],
];
