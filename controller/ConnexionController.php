<?php

require_once("vendor/autoload.php");


class ConnexionController
{
    //Affiche la page de connexion plus traitement de la reponse : Gere si l'utilisateur est connecté ou non
    private $twig;


    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/projet/templates');
        $this->twig = new \Twig\Environment($loader);
    }

    public function acceuil()
    {
        echo $this->twig->render('connexion.html.twig');
    }
}

?>
