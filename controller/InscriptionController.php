<?php

require_once("vendor/autoload.php");


class InscriptionController
{
    //Affiche la page de connexion plus traitement de la reponse : Gere si l'utilisateur est connecté ou non
    private $twig;


    public function __construct()
    {

        $loader = new \Twig\Loader\FilesystemLoader('/var/www/html/projet/templates');
        $this->twig = new \Twig\Environment($loader);
    }

    public function inscription()
    {
        
        if(!empty($_POST)){
            $database = new DatabaseUser();
            if($database->checkUser($_POST['Username'], $_POST['Password'])){
                echo $this->twig->render('inscription.html.twig', [
                    "Title" => "Inscription",
                    "erreur" => 2
                ]);
                return;                

            }
            $database->add_user($_POST['Username'], $_POST['Password']);
            echo $this->twig->render('inscription.html.twig', [
                "Title" => "Inscription",
                "erreur" => 0
            ]);
            return;
            
        }
        
        echo $this->twig->render('inscription.html.twig', [
            "Title" => "Inscription",
            "erreur" => 1
        ]);
    }
}

?>
