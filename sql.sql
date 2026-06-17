select employees.first_name, titles.title from employees 
join titles on employees.emp_no = titles.emp_no limit 10;
