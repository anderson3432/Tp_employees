<?php
        function dbconnect(){
            static $connect = null;

            if($connect === null){
                
                $connect = mysqli_connect('localhost', 'root', '', 'employees');

                if(!$connect){
                    // Arrete le scrpit et affiche une erreur si la connexion a echoue
                    die('erreur de connexion a la base de donnee : ' . mysqli_connect_error());
                }
                
                // Optionnel :  definir l'encodage des caracteres pour gerer les acents 
                mysqli_set_charset($connect ,'utf8mb4');
            }
            return $connect;
        }


        function get_login($email,$mdp){
            $sql = "SELECT * FROM users where email = '%s' AND password = '%s'";
            $sql = sprintf($sql,$email,$mdp); 
            // echo $sql;
            $new_req = mysqli_query(dbconnect(),$sql);
            $result = mysqli_fetch_assoc($new_req);
            if ($result == null){
                return -1;
            }
                else {
                    return 1;
            }
        }
        function get_name($email){
            $sql = "SELECT username FROM users where email = '%s'";
            $sql = sprintf($sql,$email);
            // echo $sql;
            $new_req = mysqli_query(dbconnect(),$sql);
            $result = mysqli_fetch_assoc($new_req);
            return $result; 
        }


        function get_id($email){
            $sql = "SELECT username FROM users where email = '%s'";
            $sql = sprintf($sql,$email);
            // echo $sql;
            $new_req = mysqli_query(dbconnect(),$sql);
            $result = mysqli_fetch_assoc($new_req);
            return $result; 
        }

        function playlistes(){
            $sql = 'select * FROM playlists';
            // echo $sql;
            $new_req = mysqli_query(dbconnect(),$sql);
            $result = array();        
            while ($news = mysqli_fetch_assoc($new_req)) {
                $result[] = $news;
            }
            mysqli_free_result($new_req);
            return $result;

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
    function get_all_departement(){
    $sql = "SELECT d.dept_no, d.dept_name, e.first_name, e.last_name
            FROM departments d
            JOIN dept_manager dm ON d.dept_no = dm.dept_no
            JOIN employees e ON dm.emp_no = e.emp_no
            WHERE dm.to_date = '9999-01-01'
            ORDER BY d.dept_name";
    $new_req = mysqli_query(dbconnect(), $sql);
    $result = array();
    while ($news = mysqli_fetch_assoc($new_req)) {
        $result[] = $news;
    }
    mysqli_free_result($new_req);
    return $result;
    }
    function get_employes_by_departement($dept_no){
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


?>