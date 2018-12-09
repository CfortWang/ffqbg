<?php
// [ko] 한국어 KOREAN KOR ko kr
// resources/lang/ko/user/detail.php
return [
    /*** Header ***/
    'header' => [
        'title' => '회원관리',
        'depth1' => 'home',
        'depth2' => '회원관리',
        'depth3' => '회원 상세'
    ],
    
    /*** Contents ***/
    'contents' => [
        'title' => '회원 상세정보 확인 및 정보수정',
        'user' => [
            'title' => '사용자 기본 정보',
            'phone' => '핸드폰번호',
            'email' => '이메일',
            'nickname' => '닉네임',
            'name' => '이름',
            'birthday' => '생일',
            'gender' => [
                'title' => '성별',
                'male' => '남',
                'female' => '여',
            ],
            'marry' => [
                'title' => '결혼여부',
                'married' => '기혼',
                'single' => '미혼',
            ],
            'region' => [
                'province' => '지방/성',
                'city' => '도시',
                'area' => '지역',
            ],
            'recommend_code' => '추천 코드',
            'created_at' => '가입일', 
            'last_login_at' => '마지막 로그인',
        ],
        'submit' => '제출',
        'point' => [
            'title' => '포인트',
            'user_point' => '사용자 포인트',
            'list' => '적립/사용 내역',
        ],
        'ticket' => [
            'user_ticket' => '보유 응모권',
            'sheet' => '장',
        ],
        'entry' => [
            'title' => '응모현황',
            'round' => '회',
            'search' => '검색',
            'table' => [
                'no' => 'No',
                'ball1' => 'ball1',
                'ball2' => 'ball2', 
                'ball3' => 'ball3',
                'ball4' => 'ball4',
                'ball5' => 'ball5',
                'ball6' => 'ball6',
                'ball7' => 'ball7',
                'date' => '응모일',
            ],
            'pagination' => [
                'prev' => '이전',
                'next' => '다음',
            ],
            'no_data' => '응모내역 없음',
        ],
        'list' => '목록',
    ],

    /*** Modal ***/
    'modal' => [
        'title' => '포인트 정보',
        'user_point' => '사용자 포인트',
        'list' => '적립/사용 내역',
        'table' => [
            'no' => 'No',
            'point' => '포인트',
            'description' => '내역',
            'date' => '적립/사용일',
        ],
        'close' => '닫기',
    ],

    'message' => [
        'modify' => [
            'confirm' => '사용자 정보를 수정하시겠습니까?',
            'success' => '변경사항이 저장되었습니다.',
            'error' => '서버에러',
        ],
        'nickname_validation' => '닉네임을 입력해주세요.',
    ],

    'point' => [
        'type'  => [
            'recommender'       => '추천인 포인트',
            'recommend'         => '추천 포인트',
            'ticket'            => '응모권 구매',
            'identification'    => '신분 인증 완료',
            'add_info'          => '추가 정보 입력 완료',
            'cash_out'          => '출금',
        ]
    ]
];
