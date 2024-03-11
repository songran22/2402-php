-- 1.
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
	,'shin'
	,'songran'
	,'F'
	,20240311	
);

-- 2.
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,190000
	,NOW()
	,99990101
);


INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'Engineer'
	,NOW()
	,99990101
);


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d005'
	,NOW()
	,99990101
);


-- 3.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500001
	,20000101
	,'lee'
	,'seolin'
	,'F'
	,20240311	
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500001
	,190000
	,NOW()
	,99990101
);


INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500001
	,'Engineer'
	,NOW()
	,99990101
);


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500001
	,'d005'
	,NOW()
	,99990101
);


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
	,19990101
	,'kwon'
	,'hyeonsu'
	,'M'
	,20240311	
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500002
	,190000
	,NOW()
	,99990101
);


INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500002
	,'Engineer'
	,NOW()
	,99990101
);


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500002
	,'d005'
	,NOW()
	,99990101
);


-- 4.
UPDATE dept_emp
SET dept_no = 'd009'
WHERE emp_no IN (500000, 500001);

-- 5.
DELETE FROM dept_emp
WHERE emp_no = 500001;

DELETE FROM salaries
WHERE emp_no = 500001;

DELETE FROM titles
WHERE emp_no = 500001;

DELETE FROM employees
WHERE emp_no = 500001;

-- 6.
UPDATE dept_manager
SET
	emp_no = 500000
WHERE
	dept_no = 'd009'
	AND to_date >= NOW();

-- 7.
UPDATE titles
SET title = 'Senior Engineer', 
    to_date = NOW()
WHERE emp_no = 500000;

-- 8.
SELECT
	emp.emp_no
	,emp.first_name
	,emp.last_name
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.salary = (
    SELECT MAX(salary) FROM salaries
)
OR sal.salary = (
    SELECT MIN(salary) FROM salaries
);

-- 9.
SELECT
	AVG(sal.salary) avg_sal	
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no;	
		
		
-- 10.
SELECT
	AVG(sal.salary) avg_sal	
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND emp.emp_no = 499975;
		
		
-- 11.
CREATE DATABASE users;
USE users;
CREATE TABLE users (
	userid			INT 				PRIMARY KEY AUTO_INCREMENT
	,usersname 		VARCHAR(30) 	NOT NULL
	,authflg			CHAR(1)			NOT NULL
	,birthday		DATE				NOT NULL
	,created_at		DATETIME			DEFAULT CURRENT_TIMESTAMP()
);


-- 12.
INSERT INTO
	users (usersname, authflg, birthday)
VALUES ('그린', '0', 20240126);


-- 13.
UPDATE users
SET usersname = '테스터',
    authflg = '1',
    birthday = 20070301
WHERE userid = 1;


-- 14.
DELETE FROM users
WHERE userid = 1;


-- 15.
ALTER TABLE users
ADD COLUMN addr VARCHAR(100) NOT NULL DEFAULT '-';


-- 16.
DROP TABLE users;


-- 17.
SELECT
	users.username
	,users.birthday
	,ran.rankname
FROM users
	JOIN rankmanagement ran
		ON users.userid = ran.userid;