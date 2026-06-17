<?php
function dbconnect()
{
    static $connect = null;

    if ($connect === null) {

        $connect = mysqli_connect('localhost', 'root', '', 'employees');

        if (!$connect) {
            // Arrete le scrpit et affiche une erreur si la connexion a echoue
            die('erreur de connexion a la base de donnee : ' . mysqli_connect_error());
        }

        // Optionnel :  definir l'encodage des caracteres pour gerer les acents 
        mysqli_set_charset($connect, 'utf8mb4');
    }
    return $connect;
}

// function get_all_departement(){
//     $sql = 'select * FROM departments';
//     // echo $sql;
//     $new_req = mysqli_query(dbconnect(),$sql);
//     $result = array();        
//     while ($news = mysqli_fetch_assoc($new_req)) {
//         $result[] = $news;
//     }
//     mysqli_free_result($new_req);
//     return $result;

// }
function get_all_departement()
{
    $sql = "SELECT d.dept_no, d.dept_name, e.first_name, e.last_name , COUNT(de.emp_no) as nbr_employees
            FROM departments d
            JOIN dept_manager dm ON d.dept_no = dm.dept_no
            JOIN employees e ON dm.emp_no = e.emp_no
            JOIN dept_emp de ON d.dept_no = de.dept_no
            WHERE dm.to_date = '9999-01-01'
            GROUP BY d.dept_no, d.dept_name, e.first_name, e.last_name
            ORDER BY d.dept_no";
    $new_req = mysqli_query(dbconnect(), $sql);
    $result = array();
    while ($news = mysqli_fetch_assoc($new_req)) {
        $result[] = $news;
    }
    mysqli_free_result($new_req);
    return $result;
}
function get_employes_by_departement($dept_no)
{
    $sql = "SELECT e.emp_no, e.first_name, e.last_name, e.hire_date, t.title
            FROM employees e
            JOIN dept_emp de ON e.emp_no = de.emp_no
            JOIN titles t ON e.emp_no = t.emp_no
            WHERE de.dept_no = '%s'
            AND de.to_date = '9999-01-01'
            AND t.to_date = '9999-01-01'
            ORDER BY e.last_name";
    $sql = sprintf($sql, $dept_no);
    $new_req = mysqli_query(dbconnect(), $sql);
    $employes = array();
    while ($row = mysqli_fetch_assoc($new_req)) {
        $employes[] = $row;
    }
    mysqli_free_result($new_req);
    return $employes;
}


function get_formulaire_employeer($num)
{
    $sql = "SELECT * FROM employees e 
                WHERE e.emp_no = '%s'";
    $sql = sprintf($sql, $num);
    $new_req = mysqli_query(dbconnect(), $sql);
    $employes = array();
    while ($row = mysqli_fetch_assoc($new_req)) {
        $employes[] = $row;
    }
    mysqli_free_result($new_req);
    return $employes;
}
function get_historique_salaire($num)
{
    $sql = "SELECT * FROM salaries s 
                WHERE s.emp_no = '%s'";
    $sql = sprintf($sql, $num);
    $new_req = mysqli_query(dbconnect(), $sql);
    $employes = array();
    while ($row = mysqli_fetch_assoc($new_req)) {
        $employes[] = $row;
    }
    mysqli_free_result($new_req);
    return $employes;
}

function recherche_employes($department, $nom, $prenom, $age_min, $age_max)
{
    $sql = "SELECT departments.dept_name, employees.first_name, employees.last_name,
                TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) AS age
    FROM employees 
    JOIN dept_emp ON employees.emp_no = dept_emp.emp_no
    JOIN departments ON dept_emp.dept_no = departments.dept_no
    WHERE dept_emp.to_date = '9999-01-01'";

    if (!empty($department)) {
        $sql .= " AND departments.dept_name LIKE '%$department%'";
    }
    if (!empty($nom)) {
        $sql .= " AND employees.first_name LIKE '%$nom%'";
    }
    if (!empty($prenom)) {
        $sql .= " AND employees.last_name LIKE '%$prenom%'";
    }
    if ($age_min !== "" && $age_max !== "") {
        $sql .= " AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) BETWEEN $age_min AND $age_max";
    } elseif ($age_min !== "") {
        $sql .= " AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) >= $age_min";
    } elseif ($age_max !== "") {
        $sql .= " AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) <= $age_max";
    }

    $new_req = mysqli_query(dbconnect(), $sql);
    $employes = array();
    while ($row = mysqli_fetch_assoc($new_req)) {
        $employes[] = $row;
    }
    mysqli_free_result($new_req);
    return $employes;
}

function get_info_dept($dept_no){
    $sql = "SELECT d.dept_no, d.dept_name, de.from_date
            FROM departments d
            JOIN dept_emp de ON d.dept_no = de.dept_no
            WHERE d.dept_no = '%s'
            AND de.to_date = '9999-01-01'
            LIMIT 1";
    $sql = sprintf($sql, $dept_no);
    $new_req = mysqli_query(dbconnect(), $sql);
    $row = mysqli_fetch_assoc($new_req);
    mysqli_free_result($new_req);
    return $row;
}
function get_dept_employe($emp_no){
    $sql = "SELECT d.dept_name, de.from_date
            FROM departments d
            JOIN dept_emp de ON d.dept_no = de.dept_no
            WHERE de.emp_no = '%s'
            AND de.to_date = '9999-01-01'";
    $sql = sprintf($sql, $emp_no);
    $new_req = mysqli_query(dbconnect(), $sql);
    $row = mysqli_fetch_assoc($new_req);
    mysqli_free_result($new_req);
    return $row;
}

function get_dept_actuel($emp_no){
    $sql = "SELECT dept_no FROM dept_emp WHERE emp_no = '%s' AND to_date = '9999-01-01'";
    $sql = sprintf($sql, $emp_no);
    $new_req = mysqli_query(dbconnect(), $sql);
    $row = mysqli_fetch_assoc($new_req);
    mysqli_free_result($new_req);
    return $row["dept_no"];
}

function changer_departement($emp_no, $dept_no, $from_date){

    $sql1 = "UPDATE dept_emp SET to_date = '%s' WHERE emp_no = '%s' AND to_date = '9999-01-01'";
    $sql1 = sprintf($sql1, $from_date, $emp_no);
    mysqli_query(dbconnect(), $sql1);

    $sql2 = "INSERT INTO dept_emp (emp_no, dept_no, from_date, to_date) VALUES ('%s', '%s', '%s', '9999-01-01')";
    $sql2 = sprintf($sql2, $emp_no, $dept_no, $from_date);
    mysqli_query(dbconnect(), $sql2);
}


function get_employes_gender()
{
    $sql = "SELECT count(emp_no) as nbr_employees, gender FROM employees
    Group by gender";
    $new_req = mysqli_query(dbconnect(), $sql);
    $employes = array();
    while ($row = mysqli_fetch_assoc($new_req)) {
        $employes[] = $row;
    }
    mysqli_free_result($new_req);
    return $employes;
}
function get_avg()
{
    $sql = "SELECT titles.title , AVG(salary) AS salaire_moyen
FROM employees
JOIN titles   ON employees.emp_no = titles.emp_no
JOIN salaries ON employees.emp_no = salaries.emp_no
WHERE titles.to_date   = '9999-01-01'
  AND salaries.to_date = '9999-01-01'
GROUP BY titles.title";
    $new_req = mysqli_query(dbconnect(), $sql);
    $employes = array();
    while ($row = mysqli_fetch_assoc($new_req)) {
        $employes[] = $row;
    }
    mysqli_free_result($new_req);
    return $employes;
}
?>