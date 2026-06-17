<?php
include('fonction.php');
$emp_no             = $_GET["emp_no"];
$from_date          = $_GET["from_date"];
$date_manager_actuel = $_GET["date_manager_actuel"];

if($from_date <= $date_manager_actuel){
    header("Location: ficheEmployer.php?num=" . $emp_no . "&erreur=manager");
}
else{
    devenir_manager($emp_no, $from_date);
    header("Location: ficheEmployer.php?num=" . $emp_no);
}
?>