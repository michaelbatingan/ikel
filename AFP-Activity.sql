select * from employee e;

select id,last_name,first_name from employee e;

select * from employee e 
	where last_name='Dela Torre' and email='juanadelatorre@gmail.com';

insert into employee (email, department_id, last_name, first_name, birthday, date_hired, created_date)
values ('juanadelacruz@gmail.com', 3, 'Dela Torre', 'Juana', '1998-11-11', '2026-05-02', '2026-05-02');