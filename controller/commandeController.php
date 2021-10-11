<?php

require_once('../model/commande.php');


USE modelCommande as MC;

class Commande {

    private $pdo;

    //* Mon constructeur. 

    public function __construct() {
        $this -> pdo = new MC\Commande;
    }

    //* Montrer les agences.

    public function showAgence() {
        $reponse = $this -> pdo -> getAllAgence();
        return $reponse;
    }

    //* Montrer les commandes.

    public function showCommande() {
        $reponse = $this -> pdo -> getAllCommande();
        return $reponse;
    }

    //* Montrer les commandes du membre connecté au site.

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

    //* Envoi des données d'une nouvelle commande.

    public function postCommande($values) {
        $this -> pdo -> createCommande($values);
    }

    //* Suppression d'une commande.

    public function postDeleteCommande() {
        $this -> pdo -> deleteCommande();
    }
}

$commande = new Commande;

//* Tableau contenant la liste des commandes.

$arrayCommande = $commande -> showCommande();

//* Tableau contenant la liste des agences.

$arrayAgence = $commande -> showAgence();

//* Tableau contenant la liste des commandes du membre connecter au site.

$arrayCommandeMembre = $commande -> showCommandeMembre();




// $arraySelection = $commande -> postSelection($values);

// $arraySelection = $commande -> postSelection($values['id_agence']);

// if(isset($_POST['postSelection'])) { $arraySelection = $commande -> postSelection($values);}

// $arraySelection = if(isset ($_POST['postSelection'])) { Commande -> postSelection($values); }

?>