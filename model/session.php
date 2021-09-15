<?php

namespace modelSession;

class Session {

    private $db;

    public function getDb() {
        if(!$this -> db) {
            try {
                $this -> db = new \PDO("mysql:host=localhost;dbname=location", "root", "", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING, \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            }

            catch(\Exception $error) {
                echo "Probleme de connexion : " . $error -> getMessage();
            }
        }

        return ($this -> db);
    }

    public function createSession($values) {
        $req = $this -> getDb() -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite)
                                            Values (:pseudo, :mdp, :nom, :prenom, :email, :civilite) ");
        $req -> bindParam(':pseudo', $values['pseudo'], \PDO::PARAM_STR);
        $req -> bindParam(':mdp', $values['mdp'], \PDO::PARAM_STR);
        $req -> bindParam(':nom', $values['nom'], \PDO::PARAM_STR);
        $req -> bindParam(':prenom', $values['prenom'], \PDO::PARAM_STR);
        $req -> bindParam(':email', $values['email'], \PDO::PARAM_STR);
        $req -> bindParam(':civilite', $values['civilite'], \PDO::PARAM_STR);
        $req -> execute();
    }
}

?>        
