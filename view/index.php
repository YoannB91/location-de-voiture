<?php require_once('../layout/header.inc.php'); ?>

<?php require_once('../controller/commandeController.php'); ?>

<?php require_once('../controller/vehiculeController.php'); ?>

<title>Acceuil</title>

<?php require_once('../layout/navbar.inc.php'); ?>

<main>

    <!-- <div class="container-fluid" -->

    <img src="../image/logo-veville.png" alt="Notre logo." style="display: block; margin-left: auto; margin-right: auto;">

    <h1 class='text-center'>Acceuil</h1>

    <h2 class='text-center'>Bienvenue à bord</h2>

    <p class='text-center'>Location de voiture 24h/24 et 7j/7</p>

    <!-- <img src="https://garagedm.com/wp-content/uploads/2017/10/garagedm-banniere-rouille.jpg" alt="Une voiture à louer. class="img-fluid">
    </div> -->

    <!-- Le formulaire des dates. -->
    <div class="container">
        <form method="POST" class="row mx-2 g-3">

            <div class="col-md-3 mx-2">
                <label for="id_agence" class="form-label"> <i class="fas fa-map-marker-alt mx-2"></i> Adresse de depart</label>
                <select name="id_agence" class="form-select form-select-sm">
                    <?php foreach ($arrayAgence as $agence) : ?>
                        <option value="<?= $agence['id_agence']; ?>"> <?= $agence['ville']; ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-md-3 mx-4">
                <label for="date_heure_depart"> <i class="fas fa-calendar-alt mx-2"></i> Début de location</label>
                <input type="datetime-local" name="date_heure_depart" value="<?php echo date('Y-m-d') . 'T' . date('H:i'); ?>">
            </div>

            <div class="col-md-3 mx-2">
                <label for="date_heure_fin"><i class="fas fa-calendar-alt mx-2"></i> Fin de location</label>
                <input type="datetime-local" name="date_heure_fin" value="<?php echo date('Y-m-d') . 'T' . date('H:i'); ?>">
            </div>

            <div class="col-12 text-center pb-4">
                <button type="submit" name="postSelection" class="btn btn-primary">Rechercher les disponibilités</button>
            </div>

        </form>
    </div>


    <div class="table-responsive container">
        <table class="table">
            <tbody>

                <?php foreach($arrayVehicule as $vehicule): ?>

                <tr>
                    <th scope="row">
                        <img src="<?= $vehicule['photo']; ?>" alt="Une photo représentant le véhicule, image non-contractuelle." class="img-fluid">
                    </th>

                    <td>
                        <?= $vehicule['titre']; ?> <br />
                        <?= $vehicule['description']; ?> <br />
                        <?= $vehicule['prix_journalier']; ?> € / jour -
                        <?= $vehicule['ville']; ?> <br />

                        <?php if(!isset($_SESSION['membre']) && isset($_POST['postSelection'])) : ?>

                            <a class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#sign_up">Réserver et payer</a>

                        <?php elseif(isset($_SESSION['membre']) && isset($_POST['postSelection'])) : ?>

                            <form method="POST">

                                <input type="hidden" name="id_agence" value="<?= $_POST['id_agence']; ?>">

                                <input type="hidden" name="date_heure_depart" value="<?= $_POST['date_heure_depart']; ?>">

                                <input type="hidden" name="date_heure_fin" value="<?= $_POST['date_heure_fin']; ?>">

                                <input type="hidden" name="id_membre" value="<?= $_SESSION['membre'] ['id_membre']; ?>">

                                <input type="hidden" name="id_vehicule" value="<?= $vehicule['id_vehicule']; ?>">

                                <input type="hidden" name="prix_journalier" value="<?= $vehicule['prix_journalier']; ?>">

                                <button type="submit" name="postComande" class="btn btn-primary mt-4">Réserver et payer</button>

                            </form>

                        <?php else : ?>

                            <div class="alert alert-danger alert-dismissible" role="alert">Veuillez commencer par sélectionner une agence de départ et des dates pour la location afin de vérifier les disponibilités de nos véhicules.</div>

                        <?php endif; ?>

                    <?php endforeach; ?>

                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</main>

<?php require_once('../layout/footer.inc.php') ?>