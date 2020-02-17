<?php

require_once("vendor/autoload.php");
require_once('DisplayController.php');



class ConnexionController
{
    //Affiche la page de connexion plus traitement de la reponse : Gere si l'utilisateur est connecté ou non
    private $twig;


    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/projet/templates');
        $this->twig = new \Twig\Environment($loader);
    }

    public function connexion()
    {
        if(!empty($_POST)){
            $user = new User();
            $user->setUsername($_POST["Username"])->setPassword($_POST["Password"]);
            if($user->verifier()){
                $_SESSION['Connected'] = true;
                $route = new DisplayController();
                $route->acceuil();
                return;
            }
            echo $this->twig->render('connexion.html.twig', [
                "Title" => "Connexion",
                'erreur' => 1
            ]);
            return;
        }

        echo $this->twig->render('connexion.html.twig', [
            "Title" => "Connexion",
            'erreur' => 2
        ]);
        
  
    }
}

?>
