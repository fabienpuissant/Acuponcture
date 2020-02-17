<?php

require_once("vendor/autoload.php");


class InformationController
{
    //Controlleur qui affiche la page d'acceuil
    private $twig;

    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/projet/templates');
        $this->twig = new \Twig\Environment($loader);
    }


    public function info()
    {
        echo $this->twig->render('info.html.twig');
    }
}

?>
