<?php
include('fonction.php');
$num = $_GET["num"];
// echo "num recu : " . $num;
$ficheEmploye = get_formulaire_employeer($num);
$historiqueSalaire = get_historique_salaire($num);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employés</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <a href="javascript:history.back()" class="btn btn-secondary mb-3"><i class="bi bi-arrow-left"></i> Retour</a>
    <h2 class="mb-4">Fiche de l'employé n° <?php echo $num; ?></h2>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Numéro</th>
                <th>Date de naissance</th>
                <th>Prenom</th>
                <th>Nom</th>
                <th>Genre</th>
                <th>Date d'embauche</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($ficheEmploye as $emp) { ?>
            <tr>
                <td><?php echo $emp["emp_no"]; ?></td>
                <td><?php echo $emp["birth_date"]; ?></td>
                <td><?php echo $emp["first_name"]; ?></td>
                <td><?php echo $emp["last_name"]; ?></td>
                <td><?php echo $emp["gender"]; ?></td>
                <td><?php echo $emp["hire_date"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

    <h2 class="mb-4">Historique de son salaire</h2>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <!-- <th>Numéro</th> -->
                <th>Salaire</th>
                <th>Date début</th>
                <th>Date fin</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($historiqueSalaire as $emp) { ?>
            <tr>
                
                <td><?php echo $emp["salary"]; ?></td>
                <td><?php echo $emp["from_date"]; ?></td>
                <td><?php echo $emp["to_date"]; ?></td>

            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>