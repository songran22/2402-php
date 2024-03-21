<?php
print_r($_POST);
// print_r($_POST["chk"]);
// count($_POST["chk"]);
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
    <form action="/146_http_method_post.php" method="post">
        <!-- 유저에겐 안보이지만 우리에게 필요한 정보의 경우 hidden 태그 사용 -->
        <input type="hidden" name="hidden" value="숨겨졌다.">
        <!-- <input type="hidden" name="method" value="DELETE"> -->
        
        <label for="id">ID</label>
        <input type="text" name="id" id="id">
        <br>
        <label for="id">PW</label>
        <input type="password" name="pw" id="pw">
        <br>
        <label for="subway">Subway</label>
        <input type="checkbox" name="chk[]" id="subway" value="subway">
        <label for="pang">빵</label>
        <input type="checkbox" name="chk[]" id="pang" value="pang">
        <label for="do">도삭면</label>
        <input type="checkbox" name="chk[]" id="do" value="do">
        <!-- checkbox 는 value로 설정해야함 / "name[]"을 같은 이름으로 지정해줘야함-->
        <br><br>
        <label for="m">남자</label>
        <input type="radio" name="radio" id="m" value="남자">
        <label for="f">여자</label>
        <input type="radio" name="radio" id="f" value="여자">
        <br>
        <button type="submit">로그인</button>
    </form>
</body>
</html>