<?php
// [ko] 한국어 KOREAN KOR ko kr
// resources/lang/ko/event/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '메인게임관리',
        'depth1' => 'home',
        'depth2' => '메인게임관리',
        'depth3' => '회차 상세',
    ],
    
    /*** Contents ***/
    'contents' => [
        'round' => [
            'round' => '회',
            'status' => [
                'progress' => '진행중',
                'draw' => '발표대기',
                'complete' => '추첨완료',
            ],
            'nums' => '당첨번호',
            'write_nums' => '당첨번호 입력',
            
        ],
        'point' => [
            'title' => '적립금 현황',
            'current' => '현재 회차 적립금',
            'last' => '이전 회차 이월 적립금',
            'current_win' => '현재 회차 당첨금',
            'remain' => '다음 회차 이월 금액',
        ],
        'entry' => [
            'total_cnt' => '총 응모수',
            'round' => '회',
            'code' => '코드 응모',
            'ticket' => '응모권 응모',
        ],
        'win' => [
            'title' => '당첨자 현황',
        ],
        'win_list' => [
            'title' => '당첨자 정보',
        ],
        'list' => '목록',
    ],

    /*** Table ***/
    'table' => [
        'win' => [
            'title' => [
                'rank' => '순위',
                'cnt' => '인원',
                'personal_prize' => '개인 상금',
                'total_prize' => '총 상금',
            ],
            'contents' => [
                'rank1' => '1st',
                'rank2' => '2nd',
                'rank3' => '3rd',
                'rank4' => '4th',
                'rank5' => '5th',
                'rank6' => '6th', 
            ],
        ],
        'win_list' => [
            'title' => [
                'no' => 'No',
                'phone' => '핸드폰번호',
                'rank' => '순위',
                'prize' => '상금',
                'entry_type' => '응모 방법',
            ],
            'contents' => [
                'code' => '코드',
                'ticket' => '응모권',
            ],
            'search' => '검색',
            'no_data' => '데이터 없음',
        ],
    ],

    /*** Modal ***/
    'modal' => [
        'title' => '당첨번호 입력',
        'round' => '회',
        'red_ball' => '빨간공',
        'blue_ball' => '파란공',
        'close' => '닫기',
        'save' => '저장',
    ],

    'message' => [
        'insert' => '입력하신 번호를 등록하시겠습니까?',
        'success' => '당첨번호 입력을 완료했습니다.',
        'error' => '서버에러',
    ],
];
