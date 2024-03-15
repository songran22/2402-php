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

