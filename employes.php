<?php
include('fonction.php');
// $news = get_all_departement();
$dept_no = $_GET["dept_no"];
$employes = get_employes_by_departement($dept_no);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <a href="listeDepartements.php"> Retour</a>
    <h2>Employes du département <?php echo $dept_no; ?></h2>
    <table border="1">
        <tr>
            <th>Numero</th>
            <th>Prenom</th>
            <th>Nom</th>
            <th>Titre</th>
            <th>Date embauche</th>
        </tr>
        <?php foreach($employes as $emp) { ?>
        <tr>
            <td><?php echo $emp["emp_no"]; ?></td>
            <td><?php echo $emp["first_name"]; ?></td>
            <td><?php echo $emp["last_name"]; ?></td>
            <td><?php echo $emp["title"]; ?></td>
            <td><?php echo $emp["hire_date"]; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>