<?php
// namespace : 해당 파일의 주소를 할당
// 일반적으로 해당파일의 패스(경로)
namespace php\ex;

class Shark {
    public function test() {
        echo "namespace의 Shark 클래스\n";
    }
}

// use : namespace를 이용해서 특정 클래스를 지정
// 별칭을 줄수도 있음(선택), 별칭을 줬으면 무조건 별칭으로 사용
use php\ex\Shark as ExShark;
use php\es\namespace\Shark as NamespaceShark;

$obj = new ExShark("죠스");
$obj->swim();
$obj = new NamespaceShark();
$obj->test();