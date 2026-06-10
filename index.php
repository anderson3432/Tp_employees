<?php
include('fonction.php');
$news = get_all_departement();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Départements</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h1 class="mb-4">Liste des Départements</h1>
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>N° Dépt</th>
                <th>Département</th>
                <th>Manager</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($news as $donnees) { ?>
            <tr>
                <td><?php echo $donnees["dept_no"]; ?></td>
                <td>
                    <a href="employes.php?dept_no=<?php echo $donnees["dept_no"]; ?>">
                        <?php echo $donnees["dept_name"]; ?>
                    </a>
                </td>
                <td><?php echo $donnees["first_name"]; ?> <?php echo $donnees["last_name"]; ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

</body>
</html>
