<?php

namespace modelMembre;

require_once('connexion.php');

use Connexion;

class Membre extends Connexion {

    //* Récupérer tout les membres.

    public function getAllMembre() {
        $req = $this -> getDb() -> query("SELECT * 
                                        FROM membre") -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }


    //* Ajouter un nouveau membre.

    public function createMembre($values) {
        $mdp = password_hash($values['mdp'], PASSWORD_DEFAULT);

        $req = $this -> getDb() -> prepare("INSERT INTO membre 
                                            VALUES ( NULL, :pseudo, :mdp, :nom, :prenom, :email, :civilite, :statut, now() )");
        $req -> bindParam(':pseudo', $values['pseudo'], \PDO::PARAM_STR);
        $req -> bindParam(':mdp', $mdp, \PDO::PARAM_STR);
        $req -> bindParam(':nom', $values['nom'], \PDO::PARAM_STR);
        $req -> bindParam(':prenom', $values['prenom'], \PDO::PARAM_STR);
        $req -> bindParam(':email', $values['email'], \PDO::PARAM_STR);
        $req -> bindParam(':civilite', $values['civilite'], \PDO::PARAM_STR);
        $req -> bindParam(':statut', $values['statut'], \PDO::PARAM_STR);
        $req -> execute();
    }


    //* Supprimer un membre.

    public function deleteMembre() {

        $id = $_GET['id'];

        $req = $this -> getDb() -> query("DELETE FROM membre
                                        WHERE id_membre = $id ")
                                        -> fetchAll(\PDO::FETCH_ASSOC);
        return $req;
    }
}

?>        