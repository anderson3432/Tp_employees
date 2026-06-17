<?php
include('fonction.php');
$employes = get_employes_gender();
$salaire  = get_avg();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des employés</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="font/bootstrap-icons.css">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <a href="index.php" class="btn btn-secondary mb-4">← Retour</a>

        <h2 class="mb-3">Répartition par genre</h2>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Genre</th>
                    <th>Nombre d'employés</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($employes as $employe): ?>
                    <tr>
                        <td><?php echo $employe['gender']; ?></td>
                        <td><?php echo $employe['nbr_employees']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2 class="mb-3 mt-5">Salaire moyen par poste</h2>
        <table class="table table-bordered table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Poste</th>
                    <th>Salaire moyen</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($salaire as $sal): ?>
                    <tr>
                        <td><?php echo $sal['title']; ?></td>
                        <td><?php echo $sal['salaire_moyen']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>

</html>