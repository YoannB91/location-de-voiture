<?php

require_once('../model/vehicule.php');

USE modelVehicule as MV;

class Vehicule {

    private $pdo;

    //* Mon constructeur.

    public function __construct() {
        $this -> pdo = new MV\Vehicule;
    }

    //* Montrer les agences.

    public function showAgence() {
        $reponse = $this -> pdo -> getAllAgence();
        return $reponse;
    }

    //* Montrer les véhicules.

    public function showVehicule() {
        $reponse = $this -> pdo -> getAllVehicule();
        return $reponse;
    }

    public function postSelection($values) {
        $reponse = $values;
        return $reponse;
    }

    /*     
    public function showSelection() {
        $reponse = $this -> pdo -> getAllSelection();
        return $reponse;
    } 
    */

    //* Envoi des données d'un nouveau véhicule.

    public function postVehicule($values) {
        $this -> pdo -> createVehicule($values);
    } 

    //* Suppression d'un véhicule.

    public function postDeleteVehicule() {
        $this -> pdo -> deleteVehicule();
    }
}

$vehicule = new Vehicule;

//* Tableau contenant la liste des véhicules.

$arrayVehicule = $vehicule -> showVehicule();


//* Tableau contenant la liste des agences.

$arrayAgence = $vehicule -> showAgence();

/* $arraySelection = $vehicule -> showSelection(); */

?>