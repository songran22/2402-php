<?php
// while 문
// 기본문법
// while(조건){
	// 연산 처리
// }
$cnt = 0;
while($cnt<3) {
    echo "conunt : $cnt \n";
    $cnt++;
}

$cnt = 0;
while(true) {
    echo "$cnt \n";
    if($cnt === 3) {
        break;
    }
    $cnt++;
}

// while을 이용해서 2단을 출력해 주세요.
// 2 X 1 = 2 ...
$dan = 2;
$cnt = 1;
while($cnt < 10) {
    echo "$dan X $cnt = ".($dan * $cnt)."\n";
    $cnt++;
}

$num = 1;
while($num < 10) {
    echo "2 X ".$num." = ".(2 * $num)."\n";
    $num++;
}

// 구구단 2~9단
// 단수와 곱해지는 수 > 변수가 2개 필요
$dan = 2; // 단수
$multi_num = 1; // 곱해지는 수
while($dan < 10) { // 단수가 9단까지만 돌면되니까 10
    $multi_num = 1; // << $multi_num 초기값을 지정해준다. (아래 while문이 시작되기 전 최상단)
    // 현재는 while문 안에서만 사용되기 때문에 안에 지정
    // 다른곳에도 $multi_num 가 나오면 밖에 최상단에 지정
    echo $dan."단\n";
    // 아래 while문에 초기값이 없음(초기값이 없을 경우 위의 단수만 나옴 ex-2단)
    while($multi_num < 10) { // 곱해지는 수가 9까지 돌도록
        echo $dan." X ".$multi_num." = ".($dan*$multi_num)."\n"; // '단' X '곱해지는수' = 단*곱해지는수
        $multi_num++; // 곱해지는 숫자 증가
    }
    $dan++; // 단수 증가
} // 초기화를 제대로 해줘야 루프가 제대로 돈다.