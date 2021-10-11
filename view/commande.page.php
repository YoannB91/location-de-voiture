<?php require_once ('../layout/header.inc.php'); ?>

<?php require_once ('../controller/commandeController.php'); ?>

    <title>Commande</title>

<?php require_once ('../layout/navbar.inc.php'); ?>

    <h1 class='text-center'>Commande</h1>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mt-4">

            <thead>
                <tr>
                    <th>Commande</th>
                    <th>Membre</th>
                    <th>Vehicule</th>
                    <th>Agence</th>
                    <th>date et heure de départ</th>
                    <th>date et heure de fin</th>
                    <th>prix total</th>
                    <th>date et heure d'enregistrement</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php foreach($arrayCommande as $commande): ?>

            <tr>
                <td><?= 'Commande N°' . $commande['id_commande']; ?></td>
                <td><?= 'Membre N°' . $commande['id_membre'] . ' ' . '-' . ' ' . $commande['prenom'] . ' ' . $commande['nom']; ?></td>
                <td><?= 'Véhicule N°' . $commande['id_vehicule'] . ' ' . '-' . ' ' . $commande['titreV']; ?></td>
                <td><?= 'Agence N°' . $commande['id_agence'] . ' ' . '-' . ' ' . $commande['titreA']; ?></td>
                <td><?= $commande['date_heure_depart']; ?></td>
                <td><?= $commande['date_heure_fin']; ?></td>
                <td><?= $commande['prix_total']; ?> €</td>
                <td><?= $commande['date_enregistrement']; ?></td>
                <td>
                    <!-- //, Le filtre. -->
                    <i class="fas fa-search px-2 py-2"> </i>
                    <!-- //, La modification. -->
                    <i class="fas fa-edit px-2 py-2"> </i>
                    <!-- //, La suppression. -->
                    <a href="?actionC=deleteCommande&id=<?= $commande['id_commande'] ?>"> <i class="fas fa-trash-alt px-2 py-2"> </i> </a>
                </td>
            </tr>

            <?php endforeach; ?>

        </table>
    </div>

</main>

<?php require_once ('../layout/footer.inc.php'); ?>