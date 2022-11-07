<?php
require('utils.php');

$errors = [];

if (!empty($_POST)) {
    if (empty($_POST['title'])) {
        array_push($errors, 'Invalid title!');
    } 
    
    if (empty($_POST['employees_count'])) {
        array_push($errors, 'Invalid employees_count!');
    } 
    
    if (empty($_POST['branch'])) {
        array_push($errors, 'Invalid branch!');
    } 

    if (empty($_POST['address'])) {
        array_push($errors, 'Invalid address!');
    }

    if (empty($errors)) {
        $json = file_get_contents('factoriesList.json');
        $factories = json_decode($json, 'true');     

        $factories[] = [
            'id' => $_POST['id'],
            'title' => $_POST['title'],
            'employees_count' => $_POST['employees_count'],
            'branch' => $_POST['branch'],
            'address' => $_POST['address']
        ];
            
        $json = json_encode($factories, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        file_put_contents('factoriesList.json', $json);
        header("Location: index.php?msg=Factory added successfully");
    }
}

?>
<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <a href="index.php">Go to Home...</a>
    <form method="post">
        <p>ID: <input type="text" name="id"></p>
        <p>Title: <input type="text" name="title"></p>
        <p>Employees Count: <input type="text" name="employees_count"></p>
        <p>Branch: <input type="text" name="branch"></p>
        <p>Address: <input type="text" name="address"></p>
        <?php if (!empty($errors)):?>
            <?php foreach ($errors as $error):?>
                <p style="color: red;">Message: <?=$error?></p>
            <?php endforeach?>
        <?php endif?>
        <button type="submit">Add</button>
    </form>
</body>
</html>