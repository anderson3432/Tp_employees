<?php
include('fonction.php');
$dept_no = $_GET["dept_no"];
$employes = get_employes_by_departement($dept_no);
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
    <a href="index.php" class="btn btn-secondary mb-3">← Retour</a>
    <h2 class="mb-4">Employés du département <?php echo $dept_no; ?></h2>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>Numéro</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Titre</th>
                <th>Date d'embauche</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($employes as $emp) { ?>
            <tr>
                <td><?php echo $emp["emp_no"]; ?></td>
                <td><?php echo $emp["last_name"]; ?></td>
                <td>
                    <a href="ficheEmployer.php?num=<?php echo $emp["emp_no"]; ?>">
                        <?php echo $emp["first_name"]; ?>
                    </a>
                </td>
                <td><?php echo $emp["title"]; ?></td>
                <td><?php echo $emp["hire_date"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>