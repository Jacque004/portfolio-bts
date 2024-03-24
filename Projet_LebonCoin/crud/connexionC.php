<?php
include_once("includes/connexionC.php");

class Connect extends PDO{

    const HOST = "localhost";
    const DB = "127_0_0_1"; 
    const USER = "root";
    const PSW = "";

    public function __construct(){
        try{
            parent::__construct("mysql:dbname=".self::DB.";host=".self::HOST, self::USER, self::PSW);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Activez le mode d'erreur pour les exceptions PDO
        } catch(PDOException $e){
            echo $e->getMessage()." ".$e->getFile()." ".$e->getLine();
        }
    }
}

?>
