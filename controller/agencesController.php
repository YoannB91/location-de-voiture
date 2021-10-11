<?php

require_once('../model/agences.php');

USE modelAgences as MA;

class Agences {

    private $pdo;

    //* Mon constructeur.

    public function __construct() {
        $this -> pdo = new MA\Agences;
    }

    //* Montrer les agences.

    public function showAgences() {
        $reponse = $this -> pdo -> getAllAgences();
        return $reponse;
    }

    //* Envoi des données d'une nouvelle agence.

    public function postAgences($values) {
        $this -> pdo -> createAgences($values);
    } 

        //* Suppression d'une agence.

    public function postDeleteAgence() {
        $this -> pdo -> deleteAgence();
    }
}

$agences = new Agences;

//* Tableau contenant la liste des agences.

$arrayAgences = $agences -> showAgences();

?>