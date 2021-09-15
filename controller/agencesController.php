<?php

require_once('../model/agences.php');

USE modelAgences as MA;

class Agences {

    private $pdo;

    public function __construct() {
        $this -> pdo = new MA\Agences;
    }

    public function showAgences() {
        $reponse = $this -> pdo -> getAllAgences();
        return $reponse;
    }

    public function postAgences($values) {
        $this -> pdo -> createAgences($values);
    } 
}

$agences = new Agences;

$arrayAgences = $agences -> showAgences();
?>