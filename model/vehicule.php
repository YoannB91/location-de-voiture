<?php

namespace modelVehicule;

class Vehicule {

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

    public function getAllAgence() {
        $req = $this -> getDb() -> query("SELECT * 
                                        From agences")
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }

    public function getAllVehicule() {
        $req = $this -> getDb() -> query("SELECT vehicule.*,agences.ville
                                        FROM vehicule
                                        JOIN agences
                                        ON vehicule.id_agence = agences.id_agence ") 
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }
/* 
    public function getAllSelection() {
        $req = $this -> getDb() -> query("SELECT *
                                        FROM vehicule
                                        WHERE id_agence = $this -> postSelection() ")
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    } */

    public function createVehicule($values) {
        $req = $this -> getDb() -> prepare("INSERT INTO vehicule (id_agence, titre, marque, modele, photo, description, prix_journalier) 
                                            VALUES (:id_agence, :titre, :marque, :modele, :photo, :description, :prix_journalier) ");
        $req -> bindParam(':id_agence', $values['id_agence'], \PDO::PARAM_STR);
        $req -> bindParam(':titre', $values['titre'], \PDO::PARAM_STR);
        $req -> bindParam(':marque', $values['marque'], \PDO::PARAM_STR);
        $req -> bindParam(':modele', $values['modele'], \PDO::PARAM_STR);
        $req -> bindParam(':photo', $values['photo'], \PDO::PARAM_STR);
        $req -> bindParam(':description', $values['description'], \PDO::PARAM_STR);
        $req -> bindParam(':prix_journalier', $values['prix_journalier'], \PDO::PARAM_STR);
        $req -> execute();
    }
}

?>       