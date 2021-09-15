<?php



//+ Les agences.
if(isset($_POST['postAgences'])) { $agences -> postAgences($_POST); }




//+ Les membres.
if(isset($_POST['postMembre'])) { $membre -> postMembre($_POST); }




//+ Le formulaire d'inscription.
if(isset($_POST['sign_up'])) { $auth -> sign_up($_POST); }



//+ Le formulaire de connexion.
if(isset($_POST['sign'])) { $auth -> sign($_POST); }



//+ La déconnexion
if(isset($_GET['action']) == 'logout') $auth -> logout();



//+ Les véhicules.
if(isset($_POST['postVehicule'])) { $vehicule -> postVehicule($_POST); }



//+ Les commandes.
if(isset($_POST['postSelection'])) { $commande -> postSelection($_POST); } /* print_r($_POST) */


if(isset($_POST['postComande'])) { $commande -> postCommande($_POST); }  /* print_r($_POST) */



?>