<?php // 유저가 보내온 값들을 받는 코드
$id = isset($_GET["id"]) ? $_GET["id"] : "";
$pw = isset($_GET["pw"]) ? $_GET["pw"] : "";
?> 

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>로그인</h1>
    <form action="/146_tng.php" method="get">
        <label for="id">ID</label>
        <input type="text" name="id" id="id">
        <br>
        <label for="id">PW</label>
        <input type="password" name="pw" id="pw">
        <button type="submit">로그인</button>
    </form>
    <!-- 하나의 form태그 안에 다 감싸주기! 
         하나의 form태그에는 submit 버튼이 하나만 있어야함 -->
    <?php
        if($id !== "") {
            echo  "<h2>당신의 ID는 $id 입니다.</h2>";
        }
        if($pw !== "") {
            echo  "<h2>당신의 PW는 $pw 입니다.</h2>";
        }
    ?>
</body>
</html>