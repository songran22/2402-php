<?php
// PHP 내장 함수

// trim(문자열) : 공백 제거 함수
$str = "  홍길동 ";
echo trim($str);

// strtoupper(문자열) : 영어 대문자 출력
echo strtoupper("sdfsdfsd");

// strtolower(문자열) : 영어 소문자 출력
echo strtolower("SDFSFSFD");

// str_replace(대상문자열, 변경 문자열, 대상 문자열) : 특정 문자를 치환
echo str_replace("c","Z","abcdefg"); // 마지막 문자열에서 c를 Z로 변경해서 출력
echo str_replace("cd","","abcdefg"); // 마지막 문자열에서 cd 를 삭제해서 출력
echo str_replace("a","", str_replace("f","","abcdefg\n")); // a,f 를 삭제해서 출력

// mb_substr(문자열, 시작위치, 출력할 개수) : 문자열을 시작위치에서 종료위치까지 잘라서 반환
$str = "홍길동갑순이";
echo mb_substr($str, 0, 3)."\n"; // 홍(0)에서 시작해 3개 출력 > 홍길동
echo mb_substr($str, 1, 4)."\n"; // 길(1)에서 시작해 4개 출력 > 길동갑순
echo mb_substr($str, 2)."\n"; // 동(2)부터 끝까지 출력 >> 동갑순이
echo mb_substr($str, -2)."\n"; // 오른쪽부터 2개만 출력 >> 순이

// mb_strpos(대상 문자열, 검색할 문자열) : 검색할 문자열이 있는 위치가 반환(int로 반환)
$str = "나는 홍길동 입니다.";
echo mb_strpos($str, "홍")."\n"; // '홍'의 위치 > 3 / 왼쪽부터 처음
// 특정단어가 포함되어있는지를 확인할때 사용
if(mb_strpos($str, "입") !==false) { // 'ㅁ'이라는 글자가 없기때문에 결과는 "없어" 출력
    echo "포함됨";          // '홍'으로 입력 시 "포함됨" 출력
}                           // !==false >> '나'입력시 "없어"로 출력되는 현상 수정
else {
    echo "없어";
}
echo "\n";

// sprintf(포맷문자열, 대입 문자열1, 대입문자열2...)
$base_msg = "%s이/가 틀렸습니다.(%s)"; // 여러개 사용 가능 > 콤마로 구분
$print_msg = sprintf($base_msg, "비밀번호","에러코드00"); // 문자열을 대입
echo $print_msg."\n"; // printf보다는 sprintf로 사용 
printf($print_msg."\n"); 

// isset(변수) : 변수의 설정 여부 확인 true/false 리턴
$ans1 = ""; // 빈문자열이라는 값을 가지고 있음
$ans2 = NULL; // 아무값도 가지고있지않음
$ans3 = 0;
$ans4 = [];
var_dump(isset($ans1), isset($ans2), isset($ans3), isset($ans4), isset($ans5));
// D:\workspace\2402-php\php\ex\036_php_function.php:49:
// bool(true)
// D:\workspace\2402-php\php\ex\036_php_function.php:49:
// bool(false)
// D:\workspace\2402-php\php\ex\036_php_function.php:49:
// bool(true)
// D:\workspace\2402-php\php\ex\036_php_function.php:49:
// bool(true)
// D:\workspace\2402-php\php\ex\036_php_function.php:49:
// bool(false)

// empty(변수) : 변수의 값이 비어있는지 확인, true/false 리턴
var_dump(empty($ans1), empty($ans2), empty($ans3), empty($ans4), empty($ans5));
// D:\workspace\2402-php\php\ex\036_php_function.php:62:
// bool(true)
// D:\workspace\2402-php\php\ex\036_php_function.php:62:
// bool(true)
// D:\workspace\2402-php\php\ex\036_php_function.php:62:
// bool(true)
// D:\workspace\2402-php\php\ex\036_php_function.php:62:
// bool(true)
// D:\workspace\2402-php\php\ex\036_php_function.php:62:
// bool(true)

// gettype(변수) : 데이터 타입을 문자열로 반환
$str1 = "abc";
$int1 = 5;
$arr = [];
$double1 = 1.4;
$boo = true;
$null1 = NULL;
$obj = new DateTime();
var_dump(gettype($str1), gettype($int1), gettype($arr)
        ,gettype($double1), gettype($boo), gettype($null1), gettype($obj));
// D:\workspace\2402-php\php\ex\036_php_function.php:82:
// string(6) "string"
// D:\workspace\2402-php\php\ex\036_php_function.php:82:
// string(7) "integer"
// D:\workspace\2402-php\php\ex\036_php_function.php:82:
// string(5) "array"
// D:\workspace\2402-php\php\ex\036_php_function.php:82:
// string(6) "double"
// D:\workspace\2402-php\php\ex\036_php_function.php:82:
// string(7) "boolean"
// D:\workspace\2402-php\php\ex\036_php_function.php:82:
// string(4) "NULL"
// D:\workspace\2402-php\php\ex\036_php_function.php:82:
// string(6) "object"

$i = 3; // 원본
$i2 = (string)$i; // 데이터타입 변경
var_dump($i, $i2); 
// D:\workspace\2402-php\php\ex\036_php_function.php:101:
// int(3)
// D:\workspace\2402-php\php\ex\036_php_function.php:101:
// string(1) "3"

// settype(변수) : 변수의 데이터 형을 변환, 원본 변수 자체가 변경되므로 주의
$i = 3;
$i2 = settype($i, "string"); // 숫자3을 문자열3으로 변경
var_dump($i, $i2);
// D:\workspace\2402-php\php\ex\036_php_function.php:110:
// string(1) "3"
// D:\workspace\2402-php\php\ex\036_php_function.php:110:
// bool(true)

// time() : 유닉스 타임스탬프
// echo time();
// echo time()-86400; >> 하루 전 날짜 획득

// date(포맷형식, 타임스탬프값) : 타임스탬프 값을 날짜 포맷형식으로 변환해서 반환
echo date("Y-m-d H:i:s", time()); // 2000-01-01 13:50:06
// echo date("Y-m-d H:i:s", time()-86400); >> 초단위로 조절가능
// 윤달 계산 주의!!

// ceil(숫자-올림), round(숫자-반올림), floor(숫자-내림)
var_dump(ceil(1.4), round(2.5), floor(1.9));
// 2024-03-18 11:04:20D:\workspace\2402-php\php\ex\036_php_function.php:126:
// double(2)   // 1.4 > 2 (올림)
// D:\workspace\2402-php\php\ex\036_php_function.php:126:
// double(3)   // 2.5 > 3 (반올림)
// D:\workspace\2402-php\php\ex\036_php_function.php:126:
// double(1)   // 1.9 > 1 (내림)

// random_int(시작값, 마지막값) : 시작값~마지막값 범위의 랜덤한 숫자를 반환
echo random_int(1, 10); // 1~10사이의 랜덤한 숫자를 가져옴

