<?php
// 변수(Variable)
$str = "안녕 php";
echo $str;

// 한글로도 설정이 가능하나, 사용하지 말자(버그가 생길 확률이 높음)
$숫자1 = 1;
echo $숫자1;

$user_name;

$Num = 1;
$num = 2;
echo $Num, $num;

// 네이밍 기법
// 스네이크 기법
$user_name;

// 카멜 기법
$userName;

echo "\n"; // <<개행 문자
// 상수(Constants) : 절대 변하지 않는 값
define("USER_AGE", 20);
// define("USER_AGE", 20); // 이미 선언된 상수이므로 워닝 일어나고 값이 바뀌지 않음
echo USER_AGE;

// 점심메뉴
// 탕수육 9000원
// 햄버거 10000원
// 빵 2000원

echo "\n";
$str1 = "점심메뉴";
$str2 = "탕수육 9000원";
$str3 = "햄버거 10000원";
$str4 = "빵 2000원";
echo $str1;
echo "\n";
echo $str2;
echo "\n";
echo $str3;
echo "\n";
echo $str4;

echo "\n";
$menu = "점심메뉴\n";
$tang = "탕수육 9000원\n";
$hamberger = "햄버거 10000원\n";
$bread = "빵 2000원";
echo $menu, $tang, $hamberger, $bread;

define("MENU", "점심메뉴\n");
echo MENU;

// 스왑
echo "\n";
$swap1 = "곤드레밥";
$swap2 = "짜장면";
$tmp = "";
$tmp = $swap1;
$swap1 = $swap2;
$swap2 = $tmp;
echo $swap1, $swap2;