CREATE DATABASE test;

-- DB 선택
USE test;

-- 아래의 테이플을 작성
-- 1.
-- 1-1 users
CREATE TABLE users (
	id 				INT 				PRIMARY KEY AUTO_INCREMENT
	,name 			VARCHAR(50)	 	NOT NULL
	,email 			VARCHAR(100)	NOT NULL UNIQUE
	,created_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at 	DATE
);

-- 1-2 boards
CREATE TABLE boards (
	id 				INT 				PRIMARY KEY AUTO_INCREMENT
	,user_id 		INT 				NOT NULL
	,title 			VARCHAR(100) 	NOT NULL
	,content			VARCHAR(1000)	NOT NULL
	,created_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at 	DATE
	,FOREIGN KEY (user_id) REFERENCES users(id)
);


-- 1-3 wishlists
CREATE TABLE wishlists (
	id 				INT 				PRIMARY KEY AUTO_INCREMENT
	,user_id 		INT 				NOT NULL
	,board_id 		INT 				NOT NULL
	,created_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,updated_at 	DATE 				NOT NULL DEFAULT CURRENT_DATE()
	,deleted_at 	DATE
	,FOREIGN KEY (user_id) REFERENCES users(id)
	,FOREIGN KEY (board_id) REFERENCES boards(id)
);


-- 2. boards 테이블에 아래 컬럼을 추가
ALTER TABLE boards
ADD COLUMN views INT NOT NULL DEFAULT 0;


-- 3. users 테이블에 아래 3명의 정보를 작성
INSERT INTO users(
	name
	,email
	,created_at
	,updated_at
) 
VALUES (
    '홍길동'
    ,'gildong@gmail.com'
    ,DATE(NOW())
    ,DATE(NOW())
);

INSERT INTO users(
	name
	,email
	,created_at
	,updated_at
) 
VALUES (
    '갑돌이'
    ,'gapdol@gmail.com'
    ,DATE(NOW())
    ,DATE(NOW())
);
    
INSERT INTO users(
	name
	,email
	,created_at
	,updated_at
) 
VALUES (
    '갑순이'
    ,'gapsun@gmail.com'
    ,DATE(NOW())
    ,DATE(NOW())
);


-- 4. boards 테이블에 아래 데이터 작성
-- 홍길동 유저가 작성한 글 추가
INSERT INTO boards (
	user_id
	,title
	,content
) 
VALUES
	(1, '수업 시작 시간은?', '9시 30분')
	,(1, '수업 시작 시간은?-2', '9시 31분')
	,(1, '수업 시작 시간은?-3', '9시 32분')
	,(1, '수업 시작 시간은?-4', '9시 33분')
	,(2, '수업 시작 시간은?', '9시 34분')
	,(2, '수업 시작 시간은?-2', '9시 35분')
	,(2, '수업 시작 시간은?-3', '9시 36분')
	,(3, '수업 시작 시간은?', '9시 37분')
	,(3, '수업 시작 시간은?-2', '9시 38분');


-- 5. wishlists 테이블에 아래 데이터 작성
INSERT INTO wishlists (
	user_id
	,board_id
)
VALUES 
	('1','5')
	,('1','9')
	,('2','1')
	,('2','2')
	,('2','3')
	,('2','4')
	,('2','5')
	,('3','6')
	,('3','7')
	,('3','8')
	,('3','9')
	,('3','1')
	,('3','2')
	,('3','3')
	,('3','4')
	,('3','5')
;


-- 6. 홍길동 유저의 탈퇴 처리
UPDATE users
SET deleted_at = DATE(NOW())
WHERE id = 1;


-- 7. wishlists의 모든 데이터 물리적 삭제
DROP TABLE wishlists;


-- 8. 모든 테이블 제거
DROP TABLE users, boards;