<?php

namespace modelVehicule;

require_once('connexion.php');

use Connexion;

class Vehicule extends Connexion {

    //* Récupérer toutes les agences de la base de donnée.

    public function getAllAgence() {
        $req = $this -> getDb() -> query("SELECT * 
                                        From agences")
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }

    //* Récupérer tout les véhicules de la base de donnée.

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


    //* Ajouter un véhicule.

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

    //* Supprimer un véhicule.

    public function deleteVehicule() {

        $id = $_GET['id'];

        $req = $this -> getDb() -> query("DELETE FROM vehicule 
                                        WHERE id_vehicule = $id ")
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }
}

?>       