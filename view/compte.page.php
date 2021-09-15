<?php require_once('../layout/header.inc.php'); ?>

<?php require_once('../controller/commandeController.php') ?>

<style>
    img {
        width: 250px;
    }
</style>

<title>Mon compte</title>

<?php require_once('../layout/navbar.inc.php'); ?>

<main>



    <h1 class='text-center'><?php if(isset($_SESSION['membre'])): ?>

    Bonjour <?= $_SESSION['membre']['prenom'] . " " . $_SESSION['membre']['nom']; ?>.

    <?php endif; ?> </h1>

    <p style="font-size: 3vh;"> Voici un récapitulatif de toutes vos commandes à ce jour : </p>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mt-4">

            <thead>
                <tr>
                    <th>N° de commande</th>
                    <th>email</th>
                    <th>Vehicule</th>
                    <th>photo</th>
                    <th>Agence</th>
                    <th>date et heure de début</th>
                    <th>date et heure de fin</th>
                    <th>date et heure d'enregistrement</th>
                    <th>prix total</th>
                </tr>
            </thead>

            <?php foreach($arrayCommandeMembre as $commande) : ?>

            <tr>
                <td><?= 'Commande N°' . $commande['id_commande']; ?></td>
                <td><?= $_SESSION['membre']['email']; ?> </td>
                <td><?= $commande['titre']; ?></td>
                <td><img src="<?= $commande['photo']; ?>" alt="Une photo représentant le véhicule, image non-contractuelle." class="img-fluid"></td>
                <td><?= $commande['titreA']; ?></td>
                <td><?= $commande['date_heure_depart']; ?></td>
                <td><?= $commande['date_heure_fin']; ?></td>
                <td><?= $commande['date_enregistrement']; ?></td>
                <td><?= $commande['prix_total']; ?> €</td>
            </tr>

            <?php endforeach; ?>

        </table>
    </div>

    <!-- 2 requetes 1 par défaut 
    ecrase si if condition -->