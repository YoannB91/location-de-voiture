<?php

namespace modelCommande;

ini_set('display_errors', 'on');

require_once('connexion.php');

use Connexion;

class Commande extends Connexion {

    //* Récupérer toutes les agences de la base de donnée.

    public function getAllAgence() {
        $req = $this -> getDb() -> query("SELECT * 
                                        From agences")
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }

    //* Récupérer toutes les commandes de la base de donnée.

    public function getAllCommande() {
        $req = $this -> getDb() -> query("SELECT commande.*, agences.titre AS titreA, vehicule.titre AS titreV, membre.* 
                                        FROM commande
                                        JOIN agences
                                        ON commande.id_agence = agences.id_agence
                                        JOIN vehicule
                                        ON commande.id_vehicule = vehicule.id_vehicule
                                        JOIN membre
                                        ON commande.id_membre = membre.id_membre ") 
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }

    //* Récupérer toutes les commandes faites par le membre connecté au site.

    public function getAllCommandeMembre() {

        $membre = $_SESSION['membre']['id_membre']; 

        $req = $this -> getDb() -> query("SELECT commande.*, agences.titre AS titreA, vehicule.* 
                                        FROM commande 
                                        JOIN agences
                                        ON commande.id_agence = agences.id_agence
                                        JOIN vehicule
                                        ON commande.id_vehicule = vehicule.id_vehicule
                                        WHERE id_membre = $membre ")
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }


    public function createSelection($values) {
        
        $id_agence = $values['id_agence'];

        $req = $this -> getDb() -> query("SELECT *
                                            FROM vehicule
                                            WHERE id_agence = $id_agence ")
                                            -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }

    //* Ajouter une commande.

    public function createCommande($values) {

        //, Le prix payé pour chaque journée de location.
        $prix_journalier = $values['prix_journalier'];

        //, Calcul du nombre de journée durant lesquels le véhicule sera loué.
        $date1 = new \DateTime($values['date_heure_depart']); 
        $date2 = new \DateTime($values['date_heure_fin']); 
        $diff = $date2->diff($date1)->format("%a");
        $nbJour = $diff + 1;

        //, Le prix total à payé pour la durée de la location.
        $prix_total = $nbJour * $prix_journalier;

        // print_r($values); print_r($nbJour); echo '<br />'; print_r($prix_total); echo '<br />';

        //, J'insère la commande dans la base de donnée.
        $req = $this -> getDb() -> prepare("INSERT INTO commande 
                                            VALUES (NULL, :id_membre, :id_vehicule, :id_agence, :date_heure_depart, :date_heure_fin, :prix_total, now() )");
        // var_dump($req);
        $req -> bindParam(':id_membre', $values['id_membre'], \PDO::PARAM_STR);
        $req -> bindParam(':id_vehicule', $values['id_vehicule'], \PDO::PARAM_STR);
        $req -> bindParam(':id_agence', $values['id_agence'], \PDO::PARAM_STR);
        $req -> bindParam(':date_heure_depart', $values['date_heure_depart'], \PDO::PARAM_STR);
        $req -> bindParam(':date_heure_fin', $values['date_heure_fin'], \PDO::PARAM_STR);
        $req -> bindParam(':prix_total', $prix_total, \PDO::PARAM_STR);
        $req -> execute();
    }

    //* Supprimer une commande.

    public function deleteCommande() {

        $id = $_GET['id'];

        $req = $this -> getDb() -> query("DELETE FROM commande
                                        WHERE id_commande = $id ")
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }
}

?>        