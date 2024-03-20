<?php
// try, catch, finally
try {
    // 예외가 발생할 처리를 작성
    $i = 5 / 0;
    echo "\$i의 값은 : ";
    echo $i;
}
catch(Throwable $e) {  
    // 예외가 발생했을 때 처리를 작성
    echo "예외 발생 : ".$e->getMessage()."\n";
}
finally { // 생략 가능
    // 예외 발생 여부와 상관없이 무조건 마지막 실행
    echo "finally\n";
}

echo "계산 완료\n";
// $i = 5 / 0;
// echo "\$i의 값은 : "; // "\"변수로 인식되지 않게 하기 위해 사용 > 문자로 사용
// echo $i;