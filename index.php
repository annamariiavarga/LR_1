<?php

require('utils.php');

$factories = getFactories();

$factories = factoriesFilter($factories);


?>

<!DOCTYPE html>
<html lang="ua">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LR</title>
</head>
<body>
    
    <?php if (!empty($_GET['msg'])):?>
        <p style="color: red;">Message: <?=$_GET['msg']?></p>
    <?php endif?>
    <div style="padding: 10px;">
        <form>
            <input type="text" name="id" placeholder="id" value="<?=inputFillerByGET('id')?>">
            <input type="text" name="title" placeholder="title" value="<?=inputFillerByGET('title')?>">
            <input type="text" name="employees_count" placeholder="employees_count" value="<?=inputFillerByGET('employees_count')?>">
            <input type="text" name="branch" placeholder="branch" value="<?=inputFillerByGET('branch')?>">
            <input type="text" name="address" placeholder="address" value="<?=inputFillerByGET('address')?>">
            <button type="submit">Search</button>
            <a href="index.php">Reset filter</a>
        </form>

        <br>

        <table border="1">
        <thead>
            <tr>
                <td>id</td>
                <td>title</td>
                <td>employees_count</td>
                <td>branch</td>
                <td>address</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($factories as $factory):?>
                <tr>
                    <td><?=$factory['id']?></td>
                    <td><a href="<?='factory.php?id='.$factory['id']?>"><?=$factory['title']?></a></td>
                    <td><?=$factory['employees_count']?></td>
                    <td><?=$factory['branch']?></td>
                    <td><?=$factory['address']?></td>
                    <td><a href="delete.php?id=<?=$factory['id']?>">Delete</a></td>
                </tr>
            <?php endforeach?>
            <?php if (!$factories):?>
                <tr>
                    <td colspan="5" align="center">Nothing!</td>
                </tr>
            <?php endif?>
        </tbody>
    </table>
    
    <br>

    <a href="add.php">Add Factory</a>
    </div>
</body>
</html>