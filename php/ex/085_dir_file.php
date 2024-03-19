<?php
// 디렉토리(폴더) 생성 전 먼저 해야하는 것
// 디렉토리(폴더) 존재여부 체크
// 기본 문법 
// is_dir(디렉토리 경로); // 
if(is_dir("./test")) {
    echo "이미 존재하는 디렉토리\n";
}
else {
    echo "없는 디렉토리\n";
}


// 디렉토리(폴더) 생성
// 기본 문법
// mkdir(생성할 디렉토리 명이 포함 된 경로, 퍼미션 설정값); // return true OR false
$result = mkdir("./test", 777);
if($result) {
    echo "디렉토리 생성 성공\n";
}
else {
    echo "디렉토리 생성 실패\n";
}
// 일반적으로 예외 처리시 아래 처럼 사용
// if(!$result) {
//     echo "디렉토리 생성 실패";
// }


// 디렉토리 삭제
$result = rmdir("./test");
if($result) {
    echo "디렉토리 삭제 성공\n";
}
else {
    echo "디렉토리 삭제 실패\n";
}


// 디렉토리 열기 및 읽기
// 기본 문법
// $open_dir= opendir(폴더 경로); // 디렉토리 열기
// 반복문을 통해 오픈한 디렉토리의 리스트를 하나씩 가져옴
$open_dir= opendir("./"); // 디렉토리 열기
while($item = readdir($open_dir)) {  // 읽어서 변수에 담기(open_dir를 읽어서 item에 담기)
    echo $item."\n";
}


// 디렉토리 닫기
// 기본 문법
// $open_dir= opendir(폴더 경로); // 디렉토리 열기
// closedir($open_dir); // 디렉토리 닫기
closedir($open_dir);


// -----------------------------------------------
// 파일 오픈
$file = fopen("./999_test.php", "a"); // 파일을 오픈할때는 파일을 담을 변수를 만들어준다.
if($file) {
    echo "파일 오픈 성공\n";
    // 파일에 데이터 쓰기
    fwrite($file, "글쓰기 테스트\n");
    // 파일 닫기
    fclose($file);
}
else {
    echo "파일 오픈 실패\n";
}


// 파일 삭제
unlink("./999_test.php");
