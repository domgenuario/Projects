/* PROBLEM 1 BEGIN */
SELECT wrk.empno, wrk.empfname
FROM emp wrk
WHERE NOT EXISTS
(SELECT boss.*
FROM emp boss
WHERE wrk.bossno = boss.empno);


/* PROBLEM 1 END */

/* PROBLEM 2 BEGIN */
SELECT wrk.empno, wrk.empfname, boss.empno AS mgrno, boss.empfname AS mgrfname
FROM emp wrk 
JOIN emp boss 
ON wrk.bossno = boss.empno
GROUP BY wrk.empfname;
/* PROBLEM 2 END */

/* PROBLEM 3 BEGIN */

SELECT deptname
FROM emp
WHERE NOT EXISTS
(SELECT * 
FROM dept 
WHERE emp.empno = dept.empno)
GROUP BY deptname
HAVING AVG(empsalary) > 25000;
/* PROBLEM 3 END */

/* PROBLEM 4 BEGIN */

SELECT empno, empfname
FROM emp
WHERE bossno = (SELECT bossno FROM emp WHERE empfname = 'Andrew');
/* PROBLEM 4 END */

/* PROBLEM 5 BEGIN */
SELECT empno, empfname, empsalary
FROM emp
WHERE bossno = (SELECT bossno FROM emp WHERE empfname = 'Andrew')
HAVING MAX(empsalary);
/* PROBLEM 5 END */

/* PROBLEM 6 BEGIN */
SELECT empno, empfname
FROM emp
WHERE NOT EXISTS
(SELECT * 
FROM dept 
WHERE dept.empno = emp.empno)
AND empno IN (SELECT bossno FROM emp);
/* PROBLEM 6 END */

/* PROBLEM 7 BEGIN */
SELECT "Put your query here";
/* PROBLEM 7 END */
