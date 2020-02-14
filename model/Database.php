<?php



class Database
{
    protected $_pdo;

    public function __construct(){
        try
        {
        $this->_pdo = new PDO('mysql:host=localhost;dbname=Acu_bd;charset=utf8', 'admin', 'admin');
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }
}