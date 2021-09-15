<?php

require_once('../model/vehicule.php');

USE modelVehicule as MV;

class Vehicule {

    private $pdo;

    public function __construct() {
        $this -> pdo = new MV\Vehicule;
    }

    public function showAgence() {
        $reponse = $this -> pdo -> getAllAgence();
        return $reponse;
    }

    public function showVehicule() {
        $reponse = $this -> pdo -> getAllVehicule();
        return $reponse;
    }

    public function postSelection($values) {
        $reponse = $values;
        return $reponse;
    }

/*     public function showSelection() {
        $reponse = $this -> pdo -> getAllSelection();
        return $reponse;
    } */

    public function postVehicule($values) {
        $this -> pdo -> createVehicule($values);
    } 
}

$vehicule = new Vehicule;

$arrayVehicule = $vehicule -> showVehicule();

$arrayAgence = $vehicule -> showAgence();

/* $arraySelection = $vehicule -> showSelection(); */

?>