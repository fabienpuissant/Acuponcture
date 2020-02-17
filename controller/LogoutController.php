<?php

require_once("vendor/autoload.php");


class LogoutController
{
    //Controlleur qui affiche la page d'acceuil
    private $twig;

    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/projet/templates');
        $this->twig = new \Twig\Environment($loader);
    }


    public function deco()
    {
        session_destroy();
        echo $this->twig->render('acceuil.html.twig');
    }
}

?>
