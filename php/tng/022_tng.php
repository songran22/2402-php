<?php
// if로 만들어주세요.
// 성적
// 범위 :
// 100 : A+
// 90이상 100미만 : A
// 80이상 90미만 : B
// 70이상 80미만 : C
// 60이상 70미만 : D
// 60미만 : F
// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"
// 0~100 입력 받았을 때 "당신의 점수는 XXX점 입니다. <등급>" 라고 출력하고
// 그 외에 값일 경우 "잘못된 값을 입력했습니다." 라고 출력해 주세요.
$num = 100; //점수 저장용
$str_print = "당신의 점수는 ".$num."점 입니다."; //출력 포맷
$ster_print_err = "잘못된 값을 입력했습니다.";
$grade = ""; //등급저장용

if( $num === 100 ) {
    echo $str_print."<A+>";
}
else if( $num >= 90 && $num < 100 ) {
    echo $str_print."<A>";
}
else if( $num >= 80 && $num < 90 ) {
    echo $str_print."<B>";
}
else if( $num >= 70 && $num < 80 ) {
    echo $str_print."<C>";
}
else if( $num >= 60 && $num < 70 ) {
    echo $str_print."<D>";
}
else {
    if( $num > 100 || $num < 1 ) {
        echo $ster_print_err;
    }
    else {
        echo $str_print."<F>";
    }
}


// 다른 방법으로도 가능!!
if($num === 100) {
    $grade = "A+";
}
else if($num >= 90) {
    $grade = "A";
}
else if($num >= 80) {
    $grade = "B";
}
else if($num >= 70) {
    $grade = "C";
}
else if($num >= 60) {
    $grade = "D";
}
else {
    $grade = "F";
}
// 0~100 입력 받았을 때 "당신의 점수는 XXX점 입니다. <등급>" 라고 출력하고
// 그 외에 값일 경우 "잘못된 값을 입력했습니다." 라고 출력해 주세요.
$msg = sprintf($str_print, $num, $grade);
echo $msg;

