<?php

require_once('../model/session.php');

USE modelSession as MS;

class Session {

    private $pdo;

    public function __construct() {
        $this -> pdo = new MS\Session;
    }

    public function postSession($values) {
        $this -> pdo -> createSession($values);
    }
}

$session = new Session;

?>