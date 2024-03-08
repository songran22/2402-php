-- DB 생성
CREATE DATABASE test;

-- DB 선택
USE test;

-- TABLE 생성
-- 회원 정보 테이블
CREATE TABLE users (
	user_id INT PRIMARY KEY AUTO_INCREMENT
	,user_name VARCHAR(50) NOT NULL
	,user_tel VARCHAR(20) NOT NULL COMMENT '- 제외 숫자'
	,user_addr VARCHAR(150) NOT NULL
	,user_birth_at DATE NOT NULL COMMENT 'YYYY-MM-DD'
	,user_gender CHAR(1) NOT NULL COMMENT '0:남자,1:여자'
	,created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at DATETIME COMMENT 'YYYY-MM-DD hh:mi:ss'
);

-- 상품 목록 테이블
CREATE TABLE products (
	product_id 			INT 				PRIMARY KEY AUTO_INCREMENT
	,product_name 		VARCHAR(200) 	NOT NULL
	,product_price 	INT 				NOT NULL
	,created_at 		DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,updated_at			DATETIME 		NOT NULL DEFAULT CURRENT_TIMESTAMP() COMMENT 'YYYY-MM-DD hh:mi:ss'
	,deleted_at			DATETIME 		COMMENT 'YYYY-MM-DD hh:mi:ss'
);

-- 주문 테이블
CREATE TABLE orders (
	order_id 			INT 				PRIMARY KEY AUTO_INCREMENT
	,user_id				INT				NOT NULL
	,product_id			INT				NOT null
	,payment_type		CHAR(1)			NOT NULL DEFAULT '0' COMMENT '0:결제전, 1:카드, 2:계좌이체'
);

-- ALTER TABLE : 테이블의 구조를 수정하는 SQL
-- FK 추가
ALTER TABLE orders ADD CONSTRAINT fk_orders_user_id FOREIGN KEY (user_id)
REFERENCES users(user_id);

ALTER TABLE orders ADD CONSTRAINT fk_orders_product_id FOREIGN KEY (product_id)
REFERENCES products(product_id);

-- users 테이블에 회원id 추가 필요
ALTER TABLE users ADD COLUMN user_member_id VARCHAR(100) NOT NULL;
ALTER TABLE users ADD CONSTRAINT uk_users_user_member_id UNIQUE (user_member_id);

-- UK 삭제
ALTER TABLE users DROP CONSTRAINT uk_users_user_member_id;
ALTER TABLE users DROP CONSTRAINT user_member_id;

-- user_member_id 데이터타입 변경
ALTER TABLE users MODIFY COLUMN user_member_id VARCHAR(150) NOT NULL;

-- TABLE 삭제
DROP TABLE orders;
DROP TABLE users, products;

-- 데이터베이스 삭제
DROP DATABASE test;


-- TRUNCATE TABLE : 테이블의 모든 데이터 삭제
TRUNCATE TABLE titles;




