<?php

require_once("vendor/autoload.php");


class DisplayController
{
    //Affiche la base de donnée puis gestion des filtres et recherche
    private $twig;

    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/projet/templates');
        $this->twig = new \Twig\Environment($loader);
    }

    public function acceuil()
    {
        echo $this->twig->render('display.html.twig');
    }
}

?>
