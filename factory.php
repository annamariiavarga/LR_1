<?php 
require('utils.php');



if (empty($_GET['id'])) {
    header('Location: index.php');
}

$factory = getFactory($_GET['id']);


?>

<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factory</title>
</head>
<body>
    <a href="index.php">Go back...</a>
    <br>
    <p>ID: <?=$factory['id']?></p>
    <p>Title: <?=$factory['title']?></p>
    <p>Employees Count: <?=$factory['employees_count']?></p>
    <p>Branch: <?=$factory['branch']?></p>
    <p>Address: <?=$factory['address']?></p>
    <a href="edit.php?id=<?=$factory['id']?>">Edit...</a>
</body>
</html>