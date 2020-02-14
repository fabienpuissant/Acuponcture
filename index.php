<?php
require_once('controller/AccueilController.php');
require_once('controller/ConnexionController.php');


function redirectIndex() {
    //Root vers AcceuilController
    $route = new AccueilController();
    $route->accueil();
}


if (isset($_GET['Connexion'])) 
{
    if($_GET['Connexion'] == 'true'){
    //Root vers ConnexionController
    $route = new ConnexionController();
    $data = $_POST;
    $route->connexion($data);
    
    } else {
        redirectIndex();
    }

} 
else if(isset($_GET['Display']))
{
    if($_GET['Display'] == 'true'){
    //Root vers DisplayController
    /*$route = new DisplayController();
    $data = $_POST;
    $route->connexion($data);
    */
    }
    else 
    {
    redirectIndex();
    }
}
else {
    redirectIndex();
}
