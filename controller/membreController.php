<?php

require_once('../model/membre.php');

USE modelMembre as MM;

class Membre {

    private $pdo;

    public function __construct() {
        $this -> pdo = new MM\Membre;
    }

    public function showMembre() {
        $reponse = $this -> pdo -> getAllMembre();
        return $reponse;
    }

    public function postMembre($values) {
        $this -> pdo -> createMembre($values);
    } 
}

$membre = new Membre;

$arrayMembre = $membre -> showMembre();
?>