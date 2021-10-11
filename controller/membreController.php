<?php

require_once('../model/membre.php');

USE modelMembre as MM;

class Membre {

    private $pdo;

    //* Mon constructeur.

    public function __construct() {
        $this -> pdo = new MM\Membre;
    }

    //*  Montrer les membres.

    public function showMembre() {
        $reponse = $this -> pdo -> getAllMembre();
        return $reponse;
    }

    //* Envoyer les données d'un nouveau membre.

    public function postMembre($values) {
        $this -> pdo -> createMembre($values);
    } 

    //* Suppresion d'un membre.

    public function postDeleteMembre() {
        $this -> pdo -> deleteMembre();
    }
}

$membre = new Membre;

//* Tableau contenant la liste des membres.

$arrayMembre = $membre -> showMembre();

?>