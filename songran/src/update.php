<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/songran/config.php"); // 최상단 위치
require_once(FILE_LIB_DB); // DB관련 라이브러리
$list_cnt = 5; // 한 페이지 최대 표시 수
$page_num = 1; // 페이지 번호 초기화

try {
    // DB Connect
    $conn = my_db_conn(); // PDO 인스턴스

    if(REQUEST_METHOD === "GET") {
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
    } else if(REQUEST_METHOD === "POST") {
        // 파라미터 획득
        $no = isset($_POST["no"]) ? $_POST["no"] : ""; // no 획득
        $page = isset($_POST["page"]) ? $_POST["page"] : ""; // page 획득
        $title = isset($_POST["title"]) ? $_POST["title"] : ""; // title 획득
        $content = isset($_POST["content"]) ? $_POST["content"] : ""; // content 획득

        // 파라미터 예외처리
        $arr_err_param = [];
        if($no === "") {
            $arr_err_param[] = "no";
        }
        if($page === "") {
            $arr_err_param[] = "page";
        }
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            throw new Exception("Parameter Error : ".implode(", ",$arr_err_param));
        }

        // Transaction 시작
        $conn->beginTransaction();

        // 게시글 수정 처리
        $arr_param = [
            "no" => $no
            ,"title" => $title
            ,"content" => $content
        ];
        $result = db_update_boards_no($conn, $arr_param);

        // 수정 예외 처리
        if($result !== 1) {
            throw new Exception("Update boards no count");
        }

        // 커밋
        $conn->commit();

        // 상세페이지로 이동
        header("Location: detail.php?no=".$no."&page=".$page);
        exit;
    }

} catch (\Throwable $e) {
    if(!empty($conn && $conn->inTransaction())) {
        // inTransaction : Transaction이 시작됐는지 확인
        $conn->rollBack();
    }
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
    <title>update_page
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
        <main>
            <form action="./update.php" method="post">
                <input type="hidden" name="no" value="<?php echo $item["no"]; ?>"> 
                <input type="hidden" name="page" value="<?php echo $page; ?>">
                <div class="main-middle">
                    <div class="line-item">
                        <div class="line-title">NO.</div>
                        <div class="line-content"><?php echo $item["no"] ?></div>
                    </div>
                    <div class="insert_content">
                        <div class="line-item">
                            <label class="line-title" for="title">
                                <span>제목</span>
                            </label>
                            <div class="line-content">
                                <input type="text" name="title" id="title" value="<?php echo $item["title"]; ?>">
                            </div>
                        </div>
                        <div class="line-item">
                            <label class="line-title" for="content">
                                <div class="line-title-textarea">내용</div>
                            </label>
                            <div class="line-content">
                                <textarea name="content" id="content" rows="10"><?php echo $item["content"]; ?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="btn_container">
                    <button type="submit" class="content_btn">완료</button>
                    <a href="./detail.php?no=<?php echo $no; ?>&page=<?php echo $page; ?>" class="content_btn">취소</a>
                </div>
            </form>
        </main>
    </div>
</body>