<?php

require_once("vendor/autoload.php");
require_once('model/User.php');


class AccueilController
{
    //Controlleur qui affiche la page d'acceuil
    private $twig;


    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/projet/templates');
        $this->twig = new \Twig\Environment($loader);
    }

    public function accueil()
    {
        echo $this->twig->render('acceuil.html.twig', [
            "Title" => "Accueil"
        ]);
    }
}

?>
