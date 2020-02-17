<?php

require_once("vendor/autoload.php");
require_once('DisplayController.php');


/**
 * Controller qui se charge d'ffiche la base de donnée en fonction des filtres et recherche
 */
class DisplayController
{
    
    private $twig;

    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/projet/templates');
        $this->twig = new \Twig\Environment($loader);
    }

    public function acceuil()
    {
        echo $this->twig->render('display.html.twig', [
            "Title" => "Acceuil"
        ]);
    }
}

?>
