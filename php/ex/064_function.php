<?php
// 함수(function)
// 두 수를 받아서 더하는 함수
// $num1,2 : 파라미터 : 매개변수(Parameter)
function my_sum($num1, $num2) {
    return $num1 + $num2;
}
echo my_sum(32, 54)."\n"; // 32,54 : 아규먼트 : 인수(Argument)

/**
 * 두 숫자를 더하는 함수
 * 
 * @param int $num1 더할 첫번째 숫자
 * @param int $num2 더할 두번째 숫자, default 10
 * @return int 합계
 */

// 파라미터 default 설정
function my_sum2(int $num1, int $num2 = 10) { // defaulf 설정할 파라미터는 뒤쪽에 배치!!
    return $num1 + $num2;
}
echo my_sum2(5)."\n";


// -, *, /, % 를 해주는 각각의 함수를 만들어 주세요.
function my_sub($num1, $num2) {  
    return $num1 - $num2;
}
echo my_sub(50, 17)."\n";

function my_multi($num1, $num2) { 
    return $num1 * $num2;
}
echo my_multi(23, 12)."\n";

function my_div($num1, $num2) {
    return $num1 / $num2;
}
echo my_div(96, 11)."\n";

function my_remind($num1, $num2) {
    return $num1 % $num2;
}
echo my_remind(10, 3)."\n";


$str = "처음 정의";  // $str 과 test(string $str)함수는 다름
function test(string $str) { // 파라미터로 작성한 변수는 함수내에서만 인식
    $str = "test()에서 변경";
}
// -------------------------------------------------------
function test2(string $str) { 
    $str = "test2()에서 변경";
    return $str; // return으로 현재 있는 str을 담아줘야 변경됨
}
echo test2($str)."\n"; // return으로 변경된 값을 출력
// -------------------------------------------------------
test($str);
echo $str;


// 가변 길이 파라미터 : 하나의 변수로 받을 수 있게 해줌

// PHP 5.5 이하
// function my_sum_all() { 
//     $numbers = func_get_args();
//     print_r($numbers); 
// }

// 넘어올 개수를 알 수 없을 때 사용
// PHP 5.6 이상
function my_sum_all(...$numbers) {  // 데이터타입 : 배열로 받아들임
    print_r($numbers); // 내가 적는 개수만큼 
}
my_sum_all(3,5,2,4,5)."\n";


// 파라미터로 받은 모든 수를 더하는 함수를 만들어 주세요.
function my_sum_all2(...$numbers) { 
    $sum = 0; // 값을 저장하는 임시 저장공간 > 초기값 0
    // foreach 루프안에 있으면 계속 반복되기때문에 초기값은 루프밖에 위치!!
    // 파라미터 루프해서 값을 획득 후 더하기
    foreach($numbers as $val) {  // 배열로 받은 수를 모두 더하는 로직
        $sum += $val; // 더하기 연산자 이용해서 더하기
        // 0+3 해서 sum 저장, 0+5 해서 sum 저장....루프 돌면서 저장
    }
    return $sum; // 합계 리턴
}
echo my_sum_all2(3,5,2,4,5)."\n";


// 참조 전달(Passing by Reference)
function test_v($num) {
    $num = 3;
}
function test_r(&$num) { // & : 참조 전달로서 해당 파라미터를 사용하겠다는 뜻
    $num = 5;
}
$num = 0;
test_r($num);
echo $num;

//  참조 변수 
$a = 1;
$b = &$a;
$a = 3;

echo $b;


