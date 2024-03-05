-- INSERT문 : 신규 데이터 저장
-- INSERT INTO 테이블명 ( 컬럼1, 컬럼2...)
-- VALUES (값1, 값2...);

SELECT MAX(emp_no) FROM employees;

INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500000
	,19920804
	,'hong'
	,'gildong'
	,'M'
	,20240305	
);

SELECT * FROM employees WHERE emp_no = 500000;

-- SELECT INSERT : SELECT한 결과를 가지고 INSERT를 실행
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
SELECT
	500001
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
FROM employees
WHERE emp_no = 500000;

-- 신입 사원들의 직책 정보를 select insert를 이용해서 저장
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
SELECT
	emp_no
	,'신입'
	,DATE(NOW())
	,DATE(99990101)
FROM employees
WHERE hire_date >= 20240305;

-- 자신의 사원 정보를 사원 테이블에 저장
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500002
	,19920804
	,'shin'
	,'songran'
	,'F'
	,20240305	
);

-- 자신의 직책 정보 저장
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'Engineer'
	,DATE(NOW())
	,DATE 99990101
);

-- 자신의 급여 정보 저장
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,190000
	,DATE(NOW())
	,DATE 99990101
);

SELECT * FROM employees WHERE emp_no = 500002;