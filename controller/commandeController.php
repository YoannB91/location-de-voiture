<?php

require_once('../model/commande.php');


USE modelCommande as MC;

class Commande {

    private $pdo;

    public function __construct() {
        $this -> pdo = new MC\Commande;
    }

    public function showAgence() {
        $reponse = $this -> pdo -> getAllAgence();
        return $reponse;
    }

    public function showCommande() {
        $reponse = $this -> pdo -> getAllCommande();
        return $reponse;
    }

    public function showCommandeMembre() {
        if(isset($_SESSION['membre'])) {
        $reponse = $this -> pdo -> getAllCommandeMembre(); 
        return $reponse;}
    }


    public function postSelection($values) {

        // var_dump($values);

        if(isset($_POST['postSelection'])) {
        $this -> pdo -> createSelection($values);
        }
    }


    public function postCommande($values) {
        $this -> pdo -> createCommande($values);
    }
}

$commande = new Commande;

$arrayCommande = $commande -> showCommande();

$arrayAgence = $commande -> showAgence();

$arrayCommandeMembre = $commande -> showCommandeMembre();

// $arraySelection = $commande -> postSelection($values);

// $arraySelection = $commande -> postSelection($values['id_agence']);

// if(isset($_POST['postSelection'])) { $arraySelection = $commande -> postSelection($values);}

// $arraySelection = if(isset ($_POST['postSelection'])) { Commande -> postSelection($values); }

?>