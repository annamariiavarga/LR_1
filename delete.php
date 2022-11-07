<?php
if (!empty($_GET['id'])) {
        $json = file_get_contents('factoriesList.json');
        $factories = json_decode($json, 'true');     

        $factories = array_filter($factories, function ($factory){
            return $factory['id'] != $_GET['id'];
        });
            
        $json = json_encode($factories, JSON_PRETTY_PRINT|JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
        file_put_contents('factoriesList.json', $json);
        
}

header("Location: index.php?msg=Factory with id=".$_GET['id']." deleted successfully");