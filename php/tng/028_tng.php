<?php
// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****
for($i = 0; $i < 6; $i++ ) {
    echo "*****\n";
}


// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****
for($i = 0; $i < 5; $i++ ) {
    for($z = 0; $z <= $i; $z++) {
        echo "*";
    }
    echo "\n";
}


// 아래처럼 별을 찍어주세요.
// 예시)
//     *
//    **
//   ***
//  ****
// *****
for($dan = 1; $dan < 6; $dan++ ) {
    for($space = 5; $space > $dan; $space--) {
        echo " ";
    }
    for($space = 1; $space <= $dan; $space++) {
        echo "*";
    }
    echo "\n";
}

// ------for문 + if문-------
$num = 5;
for($i = 1; $i <= $num; $i++) {
    $cnt_space = $num - $i; // 스페이스를 몇개 찍을지 미리 정함
    // for문 1개 + if문 이용
    for($z = 1; $z <= $num; $z++) {
        if($z <= $cnt_space) {
            echo " ";
        }
        else {
            echo "*";
        }
    }
    echo "\n";
}

for($i=0; $i<$num; $i++) {
    for($z=$num-1; $z=0; $z--) {
        if($z<=$i) {
            echo "*";
        }
        else{
            echo " ";
        }
    }
    echo "\n";
}


// ------for문 2개-------
for($i=0; $i<$num; $i++) {
    // for문 2개 이용
    // 공백찍는 for문
    for($z=0; $z<$num-$i; $z++) {
        echo " ";
    }
    // 별찍는 for문
    for($y=0; $y<=$i; $y++) {
        echo "*";
    }
    echo "\n";
}