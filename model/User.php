<?php

require_once('DatabaseUser.php');

class User
{
    /**
     * Nom de connexion
     */
    private $username;

    /**
     * Mot de passe de connexion
     */
    private $password;

    /**
     * Database manager
     */
    private $databaseUser;

    public function __construct(){
        $this->databaseUser = new DatabaseUser();
    }

    /**
     * Getter username
     */
    Public function getUsername(){
        return $this->username;
    }

    /**
     * @param string username to set
     * Setter username
     * @return self 
     */
    public function setUsername($username){
        $this->username = $username;
        return $this;
    }

    Public function getPassword(){
        return $this->password;
    }

    /**
     * @param string password to set
     * Setter password
     * @return self 
     */
    public function setPassword($password){
        $this->password = $password;
        return $this;
    }

    /**
     *Ajoute utilisateur base de donnée
     *@param string Username
     *@param string Password
     */
    public function ajouter(){
        
        $this->databaseUser->add_user($this->username, $this->password);
        
    }

    /**
     *Retire utilisateur base de donnée
     *@param string Username
     */
    public function enlever(){
        
        $this->databaseUser->remove_user($this->username);
        
    }

    /**
     * Renvoie vrai si l'utilisateur est dans la base de donnée 
     * @param string username to search
     */
    public function rechercher(){
        return $this->databaseUser->search($this->username);
    }

    /**
     * Verifie si le mot de passe correspond
     * @param string Username 
     * @param string password
     */
    public function verifier(){
        return $this->databaseUser->check_password($this->username, $this->password);
    }

    

    
    
    
}


?>