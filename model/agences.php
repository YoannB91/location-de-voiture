<?php

namespace modelAgences;

class Agences {

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

        return $this -> db;
    }

    public function getAllAgences() {
        $req = $this -> getDb() -> query("SELECT * 
                                        FROM agences") -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }

    public function createAgences($values) {
        $req = $this -> getDb() -> prepare("INSERT INTO agences (titre, adresse, ville, cp, description, photo) 
                                            VALUES (:titre, :adresse, :ville, :cp, :description, :photo) ");
        $req -> bindParam(':titre', $values['titre'], \PDO::PARAM_STR);
        $req -> bindParam(':adresse', $values['adresse'], \PDO::PARAM_STR);
        $req -> bindParam(':ville', $values['ville'], \PDO::PARAM_STR);
        $req -> bindParam(':cp', $values['cp'], \PDO::PARAM_STR);
        $req -> bindParam(':description', $values['description'], \PDO::PARAM_STR);
        $req -> bindParam(':photo', $values['photo'], \PDO::PARAM_STR);
        $req -> execute();
    }
}

?>        