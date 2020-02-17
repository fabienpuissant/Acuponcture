<?php
session_start();    

require_once('controller/AccueilController.php');
require_once('controller/ConnexionController.php');
require_once('controller/InscriptionController.php');
require_once('controller/DisplayController.php');
require_once('controller/InformationController.php');
require_once('controller/LogoutController.php');






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
    $route = new DisplayController();
    $data = $_POST;
    $route->acceuil($data);
    
    }
    else 
    {
    redirectIndex();
    }
}
else if(isset($_GET['Inscription']))
{
    if($_GET['Inscription'] == 'true'){
    //Root vers InscriptionController
    $route = new InscriptionController();
    $data = $_POST;
    $route->inscription($data);
    
    }
    else 
    {
    redirectIndex();
    }
}
else if(isset($_GET['Info']))
{
    if($_GET['Info'] == 'true'){
    //Root vers InformationController
    $route = new InformationController();
    $route->info();
    
    }
    else 
    {
    redirectIndex();
    }
}
else if(isset($_GET['Deco']))
{
    if($_GET['Deco'] == 'true'){
    //Root vers InformationController
    $route = new LogoutController();
    $route->deco();
    
    }
    else 
    {
    redirectIndex();
    }
}
else {
    redirectIndex();
}
