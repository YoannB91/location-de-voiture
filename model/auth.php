<?php

namespace modelAuth;

class AuthModel {

    private $db;

    public function getDb() {

        if(!$this -> db) {
            try {
                $this -> db = new \PDO("mysql:host=localhost;dbname=location", "root", "", array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_WARNING, \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            }

            catch(\Exception $error) {
                echo "Probleme de connexion : " . $error -> getMessage();
            }
        } 

        return $this -> db;
    }

    /*
    *   @sign-up

    .   Fonction pour s'inscrire.
    */

    public function sign_up($values) {
        //, Tout d'abord je vérifie que l'utilisateur n'existe pas déjà.
        $req = $this -> getDb() -> query("SELECT * 
                                    FROM membre
                                    WHERE pseudo = '$values[pseudo]' ");

        if($req -> rowCount() >= 1) {
            //§ Si la taille de $req est supérieur à 1 alors cela signifie qu'un utilisateur avec le même pseudo à été trouvé. 
            return false;
        } else {
            //. Je crypte le mot de passe.
            $mdp = password_hash($values['mdp'], PASSWORD_DEFAULT);

            $req = $this -> getDb() -> prepare("INSERT INTO membre
                                                VALUES ( NULL, :pseudo, :mdp, :nom, :prenom, :email, :civilite, 0, now() )");
            $req -> bindParam(':pseudo', $values['pseudo'], \PDO::PARAM_STR);
            $req -> bindParam(':mdp', $mdp, \PDO::PARAM_STR);
            $req -> bindParam(':nom', $values['nom'], \PDO::PARAM_STR);
            $req -> bindParam(':prenom', $values['prenom'], \PDO::PARAM_STR);
            $req -> bindParam(':email', $values['email'], \PDO::PARAM_STR);
            $req -> bindParam(':civilite', $values['civilite'], \PDO::PARAM_STR);
            $req -> execute();
        }
    } 

    /*
    *   @Sign

    .   Fonction qui permet de se connecter.
    */

    public function sign($values) {
        /*
        *   @trim

        .   Supprime les espaces (ou d'autres caractère) en début et fin de chaîne.
        */

        $pseudo = trim($values['pseudo']);
        $mdp = trim($values['mdp']);

        /*
        :   Je vais effectuer une requête afin de vérifier que le pseudo existe bien dans la bdd.

        *       @Placeholder

        .       Évite les injections sql à notre requête.
        */

        //?  ("SELECT *  FROM membre  WHERE pseudo = '$pseudo' ")
        $req = $this -> getDb() -> prepare("SELECT * 
                                            FROM membre 
                                            WHERE pseudo = ? ");
        $req -> execute([$pseudo]);

        $user = $req -> fetch(\PDO::FETCH_ASSOC);

        /*
        ,   Exemple sans FETCH_ASSOC :

        +       [0] => prenom
        +       [prenom] => prenom
        +       [1] => nom
        +       [nom] => nom

        ,   Exemple avec FET_ASSOC :

        +       [prenom] => prenom
        +       [nom] => nom
        */

        //§ On vérifie si le tableau est comptable, et s'il l'es alors on vérifie s'il est supérieur à 0 (et donc qu'un utilisateur à été trouvé.)
        if(is_countable($user) && count($user) > 0) {
            //§ On vérifie si le mdp saisi correspond à celui dont on dispose dans la bdd.
            if(password_verify($mdp, $user['mdp'])) {
                //§ On génère une session membre avec toutes les données de l'utilisateur qui souhaite se connecter.
                foreach ($user as $key => $values) {
                    // $_SESSION['membre'] ['prenom'] = $user['prenom'];
                    $_SESSION['membre'] [$key] = $values;
                }
            } else {
                echo "Votre mot de passe est incorrect.";
            }
        } else {
            echo "Ce compte n'existe pas.";
        }
    }
}

?>       