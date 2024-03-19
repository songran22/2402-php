<?php
// 쿠키 생성
// 기본 문법
// setcookie(쿠키명, 쿠키값, 쿠키폐기시간, 쿠키 적용 경로, 쿠키 적용 도메인);

setcookie("my_cookie1", "쿠키1", time() + 60);
// time() + 60 > 현재 시간에서 60초
setcookie("my_cookie2", "쿠키2", time() + 86400);