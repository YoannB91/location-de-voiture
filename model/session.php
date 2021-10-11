<?php

namespace modelSession;

require_once('connexion.php');

use Connexion;

class Session extends Connexion {

    public function createSession($values) {
        $req = $this -> getDb() -> prepare("INSERT INTO membre (pseudo, mdp, nom, prenom, email, civilite)
                                            Values (:pseudo, :mdp, :nom, :prenom, :email, :civilite) ");
        $req -> bindParam(':pseudo', $values['pseudo'], \PDO::PARAM_STR);
        $req -> bindParam(':mdp', $values['mdp'], \PDO::PARAM_STR);
        $req -> bindParam(':nom', $values['nom'], \PDO::PARAM_STR);
        $req -> bindParam(':prenom', $values['prenom'], \PDO::PARAM_STR);
        $req -> bindParam(':email', $values['email'], \PDO::PARAM_STR);
        $req -> bindParam(':civilite', $values['civilite'], \PDO::PARAM_STR);
        $req -> execute();
    }
}

?>        
