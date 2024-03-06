DROP TABLE USERS;
CREATE TABLE USERS (ID integer primary key, username varchar(20), email varchar(20), passwd varchar(30), balance integer, code integer);

DROP TABLE TASKS;
CREATE TABLE TASKS (ID integer primary key, task_name varchar(30), descr text, frequency integer, numComps integer, completion_d varchar(20), complete boolean, rating integer, USERS_ID varchar(20));
