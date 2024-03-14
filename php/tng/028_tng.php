<?php
// 아래처럼 별을 찍어주세요.
// 예시)
// *****
// *****
// *****
// *****
// *****
for($dan = 1; $dan < 6; $dan++ ) {
    echo "*****\n";
}


// 아래처럼 별을 찍어주세요.
// 예시)
// *
// **
// ***
// ****
// *****
for($dan = 1; $dan < 6; $dan++ ) {
    for($space = 0; $space < $dan; $space++) {
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
