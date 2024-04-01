<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/songran/config.php");
require_once(FILE_LIB_DB);

// POST 처리
if (REQUEST_METHOD === "POST") {
    try {
        // 파라미터 획득
        $title = isset($_POST["title"]) ? trim($_POST["title"]) : ""; // title 획득
        $content = isset($_POST["content"]) ? trim($_POST["content"]) : ""; // content 획득
        
        // 파라미터 에러 체크
        $arr_err_param = [];
        if($title === "") {
            $arr_err_param[] = "title";
        }
        if($content === "") {
            $arr_err_param[] = "content";
        }
        if(count($arr_err_param) > 0) {
            // 예외 처리
            throw new Exception("Parameter Error : ".implode(", ", $arr_err_param));
        }

        // DB Connect
        $conn = my_db_conn(); // PDO 인스턴스

        // Transaction 시작
        $conn->beginTransaction();

        // 게시글 작성 처리
        $arr_param = [
            "title" => $title
            ,"content" => $content
        ];
        $result = db_insert_boards($conn, $arr_param);
        
        // 글 작성 예외처리
        if($result !== 1) {
            throw new Exception("Insert Boards count");
        }

        // 커밋
        $conn->commit();

        // 리스트 페이지로 이동
        header("Location: list.php");
        exit;

    } catch (\Throwable $e) {
        if(!empty($conn)) {
            $conn->rollBack();
        }
        echo $e->getMessage();
        exit;
    } finally {
        if(!empty($conn)) {
            $conn= null;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>insert_page
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
                <form action="./insert.php" method="post">
                    <div class="insert_content">
                        <div class="line-item">
                            <label class="line-title" for="title">
                                <span>제목</span>
                            </label>
                            <div class="line-content">
                                <input type="text" name="title" id="title" class="line_input">
                            </div>
                        </div>
                        <div class="line-item">
                            <label class="line-title" for="content">
                                <div class="line-title-textarea">내용</div>
                            </label>
                            <div class="line-content">
                                <textarea name="content" id="content" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="btn_container">
                        <button type="submit" class="content_btn">작성</button>
                        <a href="./list.php" class="content_btn">취소</button></a>
                    </div>     
                </form>
            </main>
        </div>
    </div>
</body>