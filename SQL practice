/* PROBLEM 1 BEGIN 
(10 pts) Using the emp table, write a SQL query to find the “top boss” of the company). Hint:
What will have to be true about the boss id for an employee with no boss? Columns should be
empno and empfname). */

SELECT wrk.empno, wrk.empfname
FROM emp wrk
WHERE NOT EXISTS
(SELECT boss.*
FROM emp boss
WHERE wrk.bossno = boss.empno);

/* PROBLEM 1 END */

/* PROBLEM 2 BEGIN 
(10 pts) Using the emp table, write a SQL query to list all of the employees (employee id and
name) and their managers (employee id and name). The results should be sorted alphabetically
using the employee’s name. Columns should be empno, empfname, mgrno, mgrfname.
*/

SELECT wrk.empno, wrk.empfname, boss.empno AS mgrno, boss.empfname AS mgrfname
FROM emp wrk 
JOIN emp boss 
ON wrk.bossno = boss.empno
GROUP BY wrk.empfname;

/* PROBLEM 2 END */

/* PROBLEM 3 BEGIN 
(10 pts) Using the emp and dept tables, write a SQL query to list all of the departments where the
average salary of the employees, excluding the department manager, is greater than $25,000.
Column should be deptname. */

SELECT deptname
FROM emp
WHERE NOT EXISTS
(SELECT * 
FROM dept 
WHERE emp.empno = dept.empno)
GROUP BY deptname
HAVING AVG(empsalary) > 25000;

/* PROBLEM 3 END */

/* PROBLEM 4 BEGIN 
(10 pts) Using the emp table, write a SQL query to list all of the employees (employee id and
name) who have the same manager as Andrew. Andrew will be included in the results. The only
hard-coded value in your query should be Andrew’s name – NOT his employee id! Columns
should be empno, empfname. */

SELECT empno, empfname
FROM emp
WHERE bossno = (SELECT bossno FROM emp WHERE empfname = 'Andrew');

/* PROBLEM 4 END */

/* PROBLEM 5 BEGIN 
(10 pts) Using the emp table, write a SQL query to list the employee id, name and pay rate of the
person who currently makes the most money within Andrew’s group (his group being the
employees who have the same manager as Andrew). Again, do not hardcode Andrew’s empno.
Columns should be empno, empfname, empsalary. */

SELECT empno, empfname, empsalary
FROM emp
WHERE bossno = (SELECT bossno FROM emp WHERE empfname = 'Andrew')
HAVING MAX(empsalary);

/* PROBLEM 5 END */

/* PROBLEM 6 BEGIN 
(10 pts) Using the emp and dept tables, write a SQL query to list all managers who are NOT the
head of a department. Columns should be empno, empfname. */

SELECT empno, empfname
FROM emp
WHERE NOT EXISTS
(SELECT * 
FROM dept 
WHERE dept.empno = emp.empno)
AND empno IN (SELECT bossno FROM emp);

/* PROBLEM 6 END */

