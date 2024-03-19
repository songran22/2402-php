<?php

// class : 동종의 객체들을 모아 정의한 것
// 관습적으로 파일명과 클래스명을 동일하게 지어준다.
class Whale { // 클래스명의 첫글자는 대문자로 작성
    // 프로퍼티
    // 접근 제어 지시자
    // public : class 외부, 내부 어디에서나 접근 가능
    public $str; // str은 Whale calss 밖에서도 접근 가능
    // private : class 내부에서만 접근 가능, 외부는 접근 불가능
    private $i; // i는 Whale 안에서만 접근이 가능, 외부는 접근 불가능
    // protected : class 내에서만 접근 가능, 외부에서는 접근 불가능
    // 단, 상속관계에서는 접근이 가능
    protected $boo;

    private $name;

    // 생성자(생성자 메소드)
    //- 클래스를 호출할 때, 자동으로 실행되는 메소드
    //- 접근 제어 지시자는 public으로 지정
    //- 메소드 명은 “__construct”로 지정
    public function __construct($name) {
        $this->name = $name;  // class 안에 $this 는 나자신을 의미(class)
        // $this->name >> private $name; 의미
    }

    // getter / setter : private이나 protected로 설정된 프로퍼티에 접근을 위해 사용하는 메소드
    public function getName() {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
    }

    // 메소드
    public function swim($opt) {  // public 이라서 외부에서 사용 가능!!
        echo $opt.$this->name." 헤엄 칩니다.\n";
    }
    public function breathe() {
        echo $this->name." 호흡 한다.\n";
    }

    // static 메소드 : 인스턴스 생성 없이 사용할 수 있는 메소드
    public static function big() { // 메모리에 바로 저장
        echo " 매우 크다.\n";  // $this 사용 불가
    }
}
// {} 안에 프로퍼티와 메소드가 들어감. {} : 블럭영역

// 클래스 인스턴스 생성
$obj_whale = new Whale("고래"); 
$obj_whale -> swim("흰 수염 "); // "->" 특정 클래스에 있는 멤버를 호출할때 사용하는 문법
// // public 이라서 외부에서 사용 가능!!
echo $obj_whale->getName()."\n";
$obj_whale -> breathe();

$obj_whale -> setName("참새");
$obj_whale -> swim("흰 수염 ");
$obj_whale -> breathe();

// static 메소드 호출
Whale::big();



// shark 클래스를 만들어주세요.
// 프로퍼티 : private name
// 생성자 메소드 : Whale 클래스랑 동일하게
// 메소드 : public swim, public breathe
class Shark {
    private $name;
    public function __construct($name) {
        $this->name = $name;
    }
    public function swim() {
        echo $this->name." 헤엄 칩니다.\n";
    }
    public function breathe() {
        echo $this->name." 호흡 한다.\n";
    }
}
$objShark = new Shark("상어");
$objShark -> swim();
$objShark -> breathe();