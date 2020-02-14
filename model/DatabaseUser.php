<?php

require_once("Database.php");

class DatabaseUser extends Database
{

    /**
     *Ajoute utilisateur base de donnée
     *@param string Username
     *@param string Password
     */
    public function add_user($username, $password)
    {
        
        $req = $this->_pdo->prepare('INSERT INTO User (Username, Mdp) VALUES(?, ?)');
        $req->execute(array(htmlentities($username), htmlentities(password_hash($password, PASSWORD_BCRYPT))));

    }

    /**
     *Retire utilisateur base de donnée
     *@param string Username
     */
    public function remove_user($username){
        $req = $this->_pdo->prepare('DELETE FROM User WHERE Username = ?');
        $req->execute(array(htmlentities($username)));

    }

    /**
     * Renvoie vrai si l'utilisateur est dans la base de donnée 
     * @param string username to search
     */
    public function search($username){
        $req = $this->_pdo->prepare('SELECT Username FROM User WHERE Username = ?');
        $req->execute(array(htmlentities($username)));  
        while($user_row =$req->fetch()){
            return true;
        }
        return false;
    }

    /**
     * Verifie si le mot de passe correspond
     * @param string Username 
     * @param string password
     */
    public function check_password($username, $password){
        $column = 'Username';
        $req = $this->_pdo->prepare('SELECT Username, Mdp FROM User WHERE '.$column.' = ?');
        $req->execute(array(htmlentities($username)));
        while($user_row = $req->fetch()){
            if(password_verify($password, $user_row['Mdp'])){
                return true;
            }
        } 
        return false;
    }   
    

}


?> 