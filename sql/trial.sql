/**/









show TABLES;
desc country_master ;
desc state_master;
desc city_master ;
desc USER_master; 
SELECT * FROM user_master;

select * from country_master;


select * from country_master;

delete from country_master WHERE country_id = 2;
delete from state_master WHERE country_id = 2;
delete from city_master WHERE state_id = 8;

select * from state_master ;
select * from city_master ;
select * from state_master s INNER JOIN country_master c ON s.country_id = c.country_id;
delete FROM state_master WHERE state_id = 2;

insert into city_master(city_name, state_id) values('jodhpur', 7);

select * from city_master;
SELECT * from city_master c INNER JOIN state_master s ON c.state_id = s.state_id;

SELECT * FROM user_master;
insert into user_master (full_name) values('roushan kumar'); where username = 'roshan kumar';

TRUNCATE TABLE user_master;
INSERT INTO user_master (full_name, username, email, password  )    VALUES(
     'roushan kumar',
     'rksharma',
     'dev.rksharma1892@gmail.com',
     111

);



SELECT * FROM class_master;
select * from section_master;

INSERT INTO class_master ( class_name ) VALUES(
     'nursery'
);

SELECT * FROM class_master;
desc student_details; 