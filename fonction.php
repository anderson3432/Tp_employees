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


        function get_all_departement(){
            $sql = 'select * FROM departments';
            // echo $sql;
            $new_req = mysqli_query(dbconnect(),$sql);
            $result = array();        
            while ($news = mysqli_fetch_assoc($new_req)) {
                $result[] = $news;
            }
            mysqli_free_result($new_req);
            return $result;

        }


?>