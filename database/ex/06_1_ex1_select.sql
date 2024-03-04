-- 테이블의 모든 데이터 조회 : * (Asterisk)
SELECT *
FROM employees;

-- 특정 컬럼만 조회
SELECT 
	emp_no
	,birth_date
FROM employees;

-- 1. titles 테이블의 모든 데이터를 조회해 주세요.
SELECT *
FROM titles;

-- titles 테이블에서 emp_no, title 을 출력해 주세요.
SELECT
	emp_no
	,title
FROM titles;

-- 특정 조건의 데이터만 조회 : WHERE 절
-- 비교연산자 : =, >=, <=, <, >, <>
-- 사번이 10009인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE emp_no = 10009;

-- 사원 이름이 'Mary'인 사원의 모든 정보를 조회
-- 숫자 / 문자 구별 > 문자의 경우 'OOO'
SELECT *
FROM employees
WHERE first_name = 'Mary';

-- 생일이 1960/01/01 이상인 사원 모든 정보를 조회
SELECT *
FROM employees
WHERE birth_date >= 19600101;

-- 입사일이 1990/12/25 이상인 사원의 사번, 이름, 성을 조회
SELECT
	emp_no
	,FIRST_name
	,last_name
FROM employees
WHERE hire_date >= 19901225;

-- 복수의 조건을 적용시켜서 조회 : AND, OR 연산자
-- 사원번호가 10005 ~ 10009 인 사원의 모든 정보 조회
SELECT *
FROM employees
WHERE
	emp_no >= 10005 
	AND emp_no <= 10009;
	
-- 사원 이름이 'Mary', 성이 'Piazza' 인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE
	first_name = 'Mary'
	And last_name = 'Piazza';
	
-- 사원 이름이 'Mary'또는 'Moto'이고, 성이 'Piazza' 인 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE
	(
		 first_name = 'Mary'
		 OR first_name = 'Moto'
 	)
	And last_name = 'Piazza';
	
-- BETWEEN 연산자 : 지정한 범위 내의 데이터를 조회
SELECT * FROM employees
FROM emp_no >= 10005 AND emp_no <= 10009;

SELECT * FROM employees
WHERE emp_no BETWEEN 10005 AND 10009;

-- IN 연산자 : 다수의 지정한 값과 일치하는 데이터 조회
-- 10005, 10007 사원의 모든 정보를 조회
SELECT *
FROM employees
WHERE 
	emp_no = 10005
	or emp_no = 10007;
	
SELECT *
FROM employees
WHERE emp_no IN(10005, 10009);

-- LIKE 절 : 문자열의 내용을 조회(대소문자 구분x)
-- % : 글자수 상관없이 조회
-- 이름이 gr로 끝나는 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE('%ge');

-- 이름이 ge로 시작하는 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE('ge%');

-- 이름에 ge가 포함되어있는 데이터 조회
SELECT *
FROM employees
WHERE first_name LIKE('%ge%');

-- _ : 언더바의 개수 만큼 글자의 개수가 제한돼서 조회
SELECT *
FROM employees
WHERE first_name LIKE('___ge_');

-- ORDER BY 절 : 데이터를 정렬해서 조회
SELECT *
FROM employees
ORDER BY birth_date DESC, hire_date;
-- ASC : 오름차순 / DESC : 내림차순
-- ASC 생략 가능
