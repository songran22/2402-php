<?php
// if문 : 조건에 따라서 서로 다른 처리를 하는 문법
if( 1 > 2 ) {
    echo "1 > 2";
}
else if( 1 !== 1 ) {
    echo "1 === 1";
}
else {
    echo "모두 false";
}

$arr = [1,2,3];
if(true) {
    $arr[] = 4;
}
print_r($arr);

// $num가 1이면 1등, 2면 2등, 3이면 3등, 그 외는 순위 외(단, 7이면 럭키세븐)라고 출력
$num = 6;

if( $num === 1 ) {
    echo "1등";
}
else if( $num === 2 ) {
    echo "2등";
}
else if( $num === 3 ) {
    echo "3등";
}
else{
    if( $num !== 7) {
        echo "순위 외";
    }
    else  {
        echo "럭기 세븐";
    }
}
// if문 입력 시 조건의 순서 확인 중요
// 빈도가 높은 조건을 위에 적어주는게 좋음

// 1번 문제의 정답은 2, 2번 문제의 정답은 5
// 한 문제당 점수는 50점
// 둘 다 정답이면 100점
// 둘 중 하나만 정답이면 50점
// 둘 다 틀리면 0점
// 1. 변수를 2개 설정(나의 정답)
$answer1 = 1;
$answer2 = 5;

// 2. 조건별로 if문 작성
if( $answer1 === 2 && $answer2 === 5 ) {
    echo "100점";
}
else if( $answer1 === 2 || $answer2 === 5 ) {
    echo "50점";
}
else {
    echo "0점";
}
