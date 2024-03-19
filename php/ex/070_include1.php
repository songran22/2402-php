<?php
// include : 다른 파일의 소스코드를 사용하기위해 불러오는 방법
include("./070_include2.php"); // 다른 파일 불러오기
include_once("./070_include2.php"); // 한번만 불러오기

echo my_sum(1, 2);