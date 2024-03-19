<?php
// 상속 : 부모클래스의 자원을 자식클래스가 물려받아 사용하거나 재정의하는 것

class Parents {
    protected $name;

    public function __construct() {
        echo "부모클래스 생성자 실행\n";  // 자식클래스에 생성자가 없으면 부모 생성자 실행
    }
    private function home() {
        echo "집은 부모님 겁니다.\n";
    }
    public function car() {
        echo "차는 부모님 자식 다 씁니다.\n";
    }
}
class Child extends Parents {
    public function __construct($name) {
        $this->name = $name;
        echo "자식클래스 생성자 실행\n";  
    }
    public function dog() {
        echo "강아지는 제겁니다.\n";
    }

    // 오버라이딩 : 부모에게 상속받은 메소드를 자식이 재정의 하는 것
    public function car() {
        echo "이 자동차는 이제 제겁니다.\n";
    // 재정의 전 : "차는 부모님 자식 다 씁니다."
    // 재정의 후 : "이 자동차는 이제 제겁니다."
    }
    
    public function getName() {
        echo $this->name;
    }
}

$obj = new Child("홍길동"); // Parents class가 아니지만
$obj->car(); // 부모에게 상속받아서 사용 가능
// $obj->home(); // private 으로 지정되어있어 자식클래스가 사용 불가
$obj->getName();