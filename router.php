<?php



//+ Les agences.
if(isset($_POST['postAgences'])) { $agences -> postAgences($_POST); }


//§ Supprimer une agence.
if(isset($_GET['actionA']) == 'deleteAgence') { $agences -> postDeleteAgence($_GET['id']); }



//+ Les membres.
if(isset($_POST['postMembre'])) { $membre -> postMembre($_POST); }


//§ Supprimer un membre.
if(isset($_GET['actionM']) == 'deleteMembre') { $membre -> postDeleteMembre($_GET['id']); }



//: Le formulaire d'inscription.
if(isset($_POST['sign_up'])) { $auth -> sign_up($_POST); }



//: Le formulaire de connexion.
if(isset($_POST['sign'])) { $auth -> sign($_POST); }



//§ La déconnexion
if(isset($_GET['action']) == 'logout') $auth -> logout();



//+ Les véhicules.
if(isset($_POST['postVehicule'])) { $vehicule -> postVehicule($_POST); }


//§ Supprimer un véhicule.
if(isset($_GET['actionV']) == 'deleteVehicule') { $vehicule -> postDeleteVehicule($_GET['id']); }



//+ Les commandes.
if(isset($_POST['postComande'])) { $commande -> postCommande($_POST); }  /* print_r($_POST) */


//§ Supprimer une commande.
if(isset($_GET['actionC']) == 'deleteCommande') { $commande -> postDeleteCommande($_GET['id']); }

?>