<?php
include('fonction.php');
$emp_no       = $_GET["emp_no"];
$dept_no      = $_GET["dept_no"];
$from_date    = $_GET["from_date"];
$date_actuelle = $_GET["date_actuelle"];

if($from_date <= $date_actuelle){
    header("Location: ficheEmployer.php?num=" . $emp_no . "&erreur=date");
}
else{
    changer_departement($emp_no, $dept_no, $from_date);
    header("Location: ficheEmployer.php?num=" . $emp_no);
}
?>