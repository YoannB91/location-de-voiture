<?php 

require_once('../model/auth.php');

USE modelAuth as MA;

class AuthController {

    private $pdo;

    public function __construct() {
        $this -> pdo = new MA\AuthModel;
    }

    public function sign_up($values) { //: $values = $_POST
        $this -> pdo -> sign_up($values);
    }

    public function sign($values) {
        $this -> pdo -> sign($values);
    }

    /*
    *   @logout

    .   Fonction qui permet de se déconnecter.
    */

    public function logout() {
        session_destroy();
        header('Location: index.php');
    }
}

$auth = new AuthController;