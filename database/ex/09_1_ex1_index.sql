-- Index

-- Index 확인
SHOW INDEX FROM employees;

SHOW INDEX FROM titles;


-- 0.157초
SELECT * FROM employees WHERE first_name = 'Saniya';
-- index 생성 후 0.015초

-- Index 생성
ALTER TABLE employees ADD INDEX idx_employees_first_name (first_name);

-- Index 삭제
DROP INDEX idx_employees_first_name ON employees;

