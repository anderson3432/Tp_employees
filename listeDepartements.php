<?php
include('fonction.php');
$news = get_all_departement();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
      <table border="1">
        <tr>
            <th>dept_no</th>
            <th>dept_name</th>
        </tr>
        <?php foreach($news as $donnees) {?>
            <tr>    
                <td><?php echo $donnees["dept_no"]; ?></td>
                <td><?php echo $donnees["dept_name"]; ?></td>
            </tr>
        <?php }?>
    </table>
</body>
</html>
