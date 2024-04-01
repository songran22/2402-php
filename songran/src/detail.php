<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/songran/config.php");
require_once(FILE_LIB_DB); 

try {
    // DB connect
    $conn = my_db_conn(); // PDO 인스턴스 생성

    // 게시글 데이터 조회
    // 파라미터 획득
    $no = isset($_GET["no"]) ? $_GET["no"] : ""; // no 획득
    $page = isset($_GET["page"]) ? $_GET["page"] : ""; // page 획득

    // 파라미터 예외처리
    $arr_err_param = [];
    if($no === "") {
        $arr_err_param[] = "no";
    }
    if($page === "") {
        $arr_err_param[] = "page";
    }
    if(count($arr_err_param) > 0) {
        throw new Exception("Parameter Error : ".implode(", ",$arr_err_param));
    }   // implode > 배열을 특정 구분 문자로 연결시켜서 문자열로 리턴
 
    // 게시글 정보 획득
    $arr_param = [
        "no" => $no
    ];
    $result = db_select_boards_no($conn, $arr_param);
    if(count($result) !== 1) {
        throw new Exception("Select Boards no count");
    }
    
    // 아이템 셋팅
    $item = $result[0]; 

} catch (\Throwable $e) {
    echo $e->getMessage();
    exit;
} finally {
    // PDO 파기
    if(!empty($conn)) {
        $conn = null;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>detail_page
    </title>
    <link rel="stylesheet" href="./css/common2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2721191331.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php require_once(FILE_HEADER); ?>
        <div class="middle">
            <main>
                <div class="update_content">
                    <div class="content_text">
                        <p class="content_no"><?php echo "No.".$item["no"] ?></p>
                        <p class="content_title"><?php echo $item["title"] ?></p>
                    </div>
                    <div class="content_text2">
                        <p class="content_detail_title"><?php echo $item["content"] ?></p>
                    </div>
                    <div class="person_container e">
                        <div class="person_circle">
                            <img src="./img/detail_person.png" alt="">
                        </div>
                    </div>             
                    <p class="update_date"><?php echo $item["created_at"] ?></p>   
                    </div>     
                <div class="btn_container">
                    <a href="./update.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="content_btn">수정</a>
                    <a href="./list.php?page=<?php echo $page ?>" class="content_btn">취소</a>
                    <a href="./delete.php?no=<?php echo $no ?>&page=<?php echo $page ?>" class="content_btn">삭제</a>
                </div>
            </main>
        </div>    
    </div>
</body>