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
        <h1 class="mb-4">Recherche Employé</h1>
        <form action="recherche.php" method="get" class="row g-3">
            <div class="col-md-3">
                <label class="form-label">Département</label>
                <input type="text" name="department" class="form-control" placeholder="Departement...">
            </div>
            <div class="col-md-3">
                <label class="form-label">Nom employé</label>
                <input type="text" name="nom" class="form-control" placeholder="Nom...">
            </div>
            <div class="col-md-3">
                <label class="form-label">Prenom employé</label>
                <input type="text" name="prenom" class="form-control" placeholder="Prenom...">
            </div>
            <div class="col-md-2">
                <label class="form-label">Age min</label>
                <input type="number" name="age_min" class="form-control" placeholder="Min...">
            </div>
            <div class="col-md-2">
                <label class="form-label">Age max</label>
                <input type="number" name="age_max" class="form-control" placeholder="Max...">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100"><i class="bi bi-search"></i> Rechercher</button>
            </div>
        </form>
    </div>
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
                <?php foreach ($news as $donnees) { ?>
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