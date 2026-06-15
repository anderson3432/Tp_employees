<?php
include('fonction.php');
$recherche = recherche_employes(
    $_GET["department"],
    $_GET["nom"],
    $_GET["prenom"],
    $_GET["age_min"],
    $_GET["age_max"]
);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultats</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <a href="index.php" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Retour</a>
        <h1 class="mb-4">Résultats de recherche</h1>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Département</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Age</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($recherche)) { ?>
                    <tr>
                        <td colspan="3" class="text-center">Aucun résultat trouvé</td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($recherche as $employe) { ?>
                        <tr>
                            <td><?php echo $employe["dept_name"]; ?></td>
                            <td><?php echo $employe["first_name"]; ?></td>
                            <td><?php echo $employe["last_name"]; ?></td>
                            <td><?php echo $employe["age"]; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
        <a href="index.php" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i> Retour</a>
    </div>
</body>

</html>