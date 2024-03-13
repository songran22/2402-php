<?php
// 배열(array) : 하나의 변수에 여러 값을 담을 수 있는 데이터 타입
$arr1 = array(1, 2, 3); // 5.4버전 이전에 배열을 선언하던 방식
print_r($arr1);

$arr2 = [4, 5, 6]; // 5.4버전에 추가된 배열 선언 방식
print_r($arr2);

// 배열에서 특정 요소의 값 획득
echo $arr2[0];

// 배열에 요소(item) 추가
$arr2[] = 100;
print_r($arr2);

// 배열의 특정 요소의 값 변경
$arr2[1] = 300;
print_r($arr2);

// 음식종류 5개 이상을 인덱스 배열로 만들어주세요.
$arr_food = [
    "짜장면"
    ,"짬뽕"
    ,"볶음밥"
    ,"야끼우동"
    ,"탕수육"
];
print_r($arr_food);

echo $arr_food[1];

// 연관 배열(Associative Array)
$arr_asso = [
    "name" => "홍길동"
    ,"age" => 20
];
print_r($arr_asso);

echo $arr_asso["name"];

// $arr_asso 키(gender) 값(여자)인 아이템을 추가
$arr_asso["gender"] = "여자";
print_r($arr_asso);

$arr_asso["gender"] = "남자";
print_r($arr_asso);

// 다차원 배열(Multidimensional Array)
$arr_multi = [
    [1,2,3]
    ,[
        4
        ,[10,11,12]
        ,6
        ]
    ,7
];
echo $arr_multi[1][2];
echo $arr_multi[2];
echo $arr_multi[1][1][1];


$arr_result = [
    ["name" => "홍길동", "age" => 20]
    ,["name" => "갑돌이", "age" => 99]
    ,["name" => "갑순이", "age" => 15]
];
echo $arr_result[1]["name"];
echo $arr_result[2]["age"];
echo "\n";

// 배열의 길이
$arr = [1,2,3,4,5];
echo count($arr);
echo count($arr_result[0]);

// unset() : 배열의 특정 아이템 삭제
unset($arr[2]);
print_r($arr);

// 배열의 정렬
// asort() : 배열의 값을 기준으로 오름차순 정렬
$arr = [5,4,3,8,1];
asort($arr);
print_r($arr);
// arsort() : 배열의 값을 기준으로 내림차순 정렬
arsort($arr);
print_r($arr);
// ksort() : 배열의 키를 기준으로 오름차순 정렬
ksort($arr);
print_r($arr);
// krsort() : 배열의 키를 기준으로 내림차순 정렬
krsort($arr);
print_r($arr);

// 키는 요리명, 값은 주재료 하나로 이루어진 배열을 만들어주세요. (배열 길이는 4)
$arr_asso2 = [
    "떡볶이" => "떡"
    ,"갈비찜" => "갈비"
    ,"김치찌개" => "김치"
    ,"월남쌈" => "라이스페이퍼"
];

// 월남쌈의 주재료를 양파, 당근, 오이, 파인애플
$arr_asso2["월남쌈"] = ["양파","당근","오이","파인애플"];
print_r($arr_asso2);

