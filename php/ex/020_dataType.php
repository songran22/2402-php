<?php
// int : 숫자, 정수
var_dump(123);

// double : 실수
var_dump(3.141592);

// string : 문자열
var_dump("abcd");
var_dump('efgh');

// boolean : 논리
var_dump(true, false);

// NULL
var_dump(null);

// array : 배열
var_dump([1,2,3]);

// object : 객체
$obj = new DateTime();
var_dump($obj);

// 형변환 : 변수 앞에 (데이터타입) 작성
var_dump((int)'123');
var_dump((string)456);
var_dump((int)"abc"); // <<이렇게는 하면 안된다. 문자는 숫자가 아님