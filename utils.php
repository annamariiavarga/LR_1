<?php

function getFactories(){
    $json = file_get_contents('factoriesList.json');
    $factories = json_decode($json, true);
    return $factories;
}

function getFactory($id){
    $json = file_get_contents('factoriesList.json');
    $factories = json_decode($json, true);
    foreach ($factories as $factory){
       if ($factory['id'] == $id){
        return $factory;
       }
    }
    return null;
}

function factoriesFilter($factories){
    $prepared_factories = [];
    foreach ($factories as $factory){
        if (
            (empty($_GET['id']) || (!empty($_GET['id']) && $factory['id'] == $_GET['id'])) && 
            (empty($_GET['title']) || (!empty($_GET['title']) && str_contains($factory['title'], $_GET['title']))) &&
            (empty($_GET['employees_count']) || (!empty($_GET['employees_count']) && $factory['employees_count'] == $_GET['employees_count'])) &&
            (empty($_GET['branch']) || (!empty($_GET['branch']) && $factory['branch'] == $_GET['branch'])) &&
            (empty($_GET['address']) || (!empty($_GET['address']) && str_contains($factory['address'], $_GET['address'])))
        ){
            array_push($prepared_factories, $factory);
        }
    }
    return $prepared_factories;
}

function inputFillerByGET(string $param){
    return !empty($_GET[$param]) ? $_GET[$param] : '';
}