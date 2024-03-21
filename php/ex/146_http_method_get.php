<?php
// localhost/파일명?name=hong&gender=M
// localhost : 도메인
// 파일명 : 패스
// ?name=hong : 파라미터 name(키)=hong(값)
// & : 파라미터 연결
// 민감한 정보들은 get Method로 보내면 안됨!!(ex 주민번호 등)

// print_r($_GET);
// print_r($_GET["name"]);

// --------------------------------------------------------
// $question = ""; // 초기값
// if(isset($_GET["q"])) {
//     $question = $_GET["q"];
// }
// "q"가 있으면 세팅하고, 없으면 세팅하지않겠다는 if문
// --------------------------------------------------------

// 삼항연산자
// 변수  = 조건식 ? 참일 경우  : 거짓일 경우
$question = isset($_GET["q"]) ? $_GET["q"] : "";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>검색어를 입력하세요.</h1>

    <form action="/146_http_method_get.php" method="get">
        <input type="text" name="q">
        <button type="submit">검색</button>
    </form>
    <br>
    <br>
    <?php
        // 검색어가 있을때
        if($question !== "") {
            echo  "<h2>당신의 검색어는 $question 입니다.</h2>";
        }
    ?>
    <?php
        // 변수에 스타일주기
        if($question !== "") {
            echo  "<h2>당신의 검색어는 <span style=\"color:red;\">$question</span> 입니다.</h2>";
        }
    ?>
    <?php
        // php,html 완전 분리
        if($question !== "") {
    ?>
            <h2>당신의 검색어는 <span style="color:blue;"><?php echo $question ?></span> 입니다.</h2>
    <?php
        }
    ?>
</body>
</html>
