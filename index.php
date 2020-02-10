<?php
require_once('controller/AcceuilController.php');

function redirectIndex() {
    //Root vers AcceuilController
    $route = new AcceuilController();
    $route->acceuil();
}


if (isset($_GET['Connexion'])) 
{
    if($_GET['Connexion'] == 'true'){
    //Root vers ConnexionController
    /*$route = new ConnexionController();
    $data = $_POST;
    $route->connexion($data);
    */
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
