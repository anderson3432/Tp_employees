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
   <?php
$dept_actuel = get_dept_actuel($num);
$info_dept_actuel = get_info_dept($dept_actuel);
?>

<button class="btn btn-secondary mb-3" onclick="document.getElementById('form_dept').style.display='block'">
    Changer de département
</button>
<?php
$dept_employe = get_dept_employe($num);
?>


<div id="form_dept" style="display:none;" class="mt-3 p-3 border rounded">
    <h5>Changer de departement</h5>

        Departement actuel : <strong><?php echo $info_dept_actuel["dept_name"]; ?></strong>
        <br> debut : <strong><?php echo $info_dept_actuel["from_date"]; ?></strong>
 

    <form action="changer_dept.php" method="GET">
        <input type="hidden" name="emp_no" value="<?php echo $num; ?>">
        <input type="hidden" name="date_actuelle" value="<?php echo $info_dept_actuel["from_date"]; ?>">

        <div class="mb-3">
            <label>Nouveau departement</label>
            <select name="dept_no" class="form-select">
                <?php
                $deps = get_all_departement();
                foreach($deps as $dep){
                    if($dep["dept_no"] != $dept_actuel){
                ?>
                <option value="<?php echo $dep["dept_no"]; ?>">
                    <?php echo $dep["dept_name"]; ?>
                </option>
                <?php } } ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Date de début</label>
            <input type="date" name="from_date" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Confirmer</button>
        <button type="button" class="btn btn-secondary" onclick="document.getElementById('form_dept').style.display='none'">
            Annuler
        </button>
    </form>
</div>

</div>


</body>
</html>