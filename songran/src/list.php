<?php
// 설정 정보
require_once($_SERVER["DOCUMENT_ROOT"]."/songran/config.php"); // 최상단 위치
require_once(FILE_LIB_DB); // DB관련 라이브러리
$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화


// 예외 처리
try {
    // DB Connect
    $conn = my_db_conn(); // Connection 함수 호출

    // 파라미터에서 page 획득
    $page_num = isset($_GET["page"]) ? $_GET["page"] : $page_num;    

    // 게시글 수 조회
    $result_board_cnt = db_select_boards_cnt($conn);

    // 페이지 관련 설정 셋팅
    $max_page_num = ceil($result_board_cnt / $list_cnt); // 최대 페이지 수
    $offset = $list_cnt * ($page_num - 1); // OFFSET
    $prev_page_num = ($page_num - 1) < 1 ? 1 : ($page_num - 1); // 이전 버튼 페이지 번호
    $next_page_num = ($page_num + 1) > $max_page_num ? $max_page_num : ($page_num + 1); // 다음 버튼 페이지 번호

    // 게시글 리스트 조회
    $arr_param = [
        "list_cnt" => $list_cnt
		,"offset"  => $offset 
    ];
    $result = db_select_boards_paging($conn, $arr_param);

} catch (\Throwable $e) {
    echo $e->getMessage();
    exit; // 예외 발생 시 출력이 안되도록 함
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
    <title>list_page
    </title>
    <link rel="stylesheet" href="./css/common2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+KR:wght@100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2721191331.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <!-- 헤더 호출 -->
        <?php require_once(FILE_HEADER); ?>
        <main>
            <div class="middle">
                <?php
                foreach($result as $item) {
                ?>
                    <div class="board_content">
                        <a href="./detail.php?no=<?php echo $item["no"] ?>&page=<?php echo $page_num ?>">
                            <div class="content_text">
                                <div class="content_gird">
                                    <div>
                                        <p class="content_no"><?php echo "No.".$item["no"] ?></p>
                                        <p class="content_title"><?php echo $item["title"] ?></p>
                                    </div>
                                </div>
                                    <div class="person_container">
                                        <div class="person_circle">
                                            <img src="./img/detail_person.png" alt="">
                                        </div>
                                    </div>
                                <p class="content_date"><?php echo $item["created_at"] ?></p>
                            </div>
                        </a>
                    </div>  
                <?php
                }
                ?>
                <div class="board_content">
                    <a href="./insert.php" class="insert_btn">
                        글쓰기<i class="fa-regular fa-pen-to-square"></i>
                    </a>
                </div>
            </div>
        </main>
        <footer>
            <br>
            <div class="pagination">
                <a href="./list.php?page=<?php echo $prev_page_num ?>">&lt;</a>
                <?php 
                for($num = 1; $num <= $max_page_num; $num++) {
                ?>
                <a href="./list.php?page=<?php echo $num ?>"><?php echo $num ?></a>
                <?php
                }
                ?>
                <a href="./list.php?page=<?php echo $next_page_num ?>">&gt;</a>
            </div>  
        </footer>
    </div>
</body>