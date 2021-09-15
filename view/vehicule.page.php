<?php require_once('../layout/header.inc.php'); ?>

<?php require_once('../controller/vehiculeController.php'); ?>

<title>Véhicule</title>

<?php require_once('../layout/navbar.inc.php'); ?>

<main>

    <h1 class='text-center'>Véhicule</h1>

    <form method="POST" class="row mx-2 g-3">

        <div class="col-md-6">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'annonce">
        </div>

        <div class="col-md-6">
            <label for="photo" class="form-label">Photo</label>
            <input type="text" class="form-control" id="photo" name="photo" placeholder="Photo">
        </div>

        <div class="col-md-6">
            <label for="marque" class="form-label">Marque</label>
            <input type="text" class="form-control" id="marque" name="marque" placeholder="Marque">
        </div>

        <div class="col-md-6">
            <label for="modele" class="form-label">Modèle</label>
            <input type="text" class="form-control" id="modele" name="modele" placeholder="Modèle">
        </div>

        <div class="col-md-6">
            <label for="prix_journalier" class="form-label">Prix</label>
            <input type="text" class="form-control" id="prix_journalier" name="prix_journalier" placeholder="Prix journalier">
        </div>

        <!-- recupérer les agences dynamiquement -->
        <div class="col-md-6">
            <label for="id_agence" class="form-label">Agence</label>
            <select name="id_agence" class="form-select" id="id_agence">
                <!-- <option selected>Veuillez sélectionner l'agence dans laquelle le véhicule est disponible</option> -->
                <?php foreach($arrayAgence as $agence): ?>

                <option value="<?= $agence['id_agence']; ?>"> <?= $agence['ville']; ?> </option>

                <?php endforeach; ?>

            </select>
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="6" placeholder="Description de votre véhicule"></textarea>
        </div>

        <div class="col-12 text-center">
            <button type="submit" name="postVehicule" class="btn btn-primary">Enregistrer</button>
        </div>

    </form>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mt-4">

            <thead>
                <tr>
                    <th>vehicule</th>
                    <th>Agence</th>
                    <th>titre</th>
                    <th>marque</th>
                    <th>modèle</th>
                    <th>description</th>
                    <th>photo</th>
                    <th>prix</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php foreach($arrayVehicule as $vehicule): ?>

            <tr>
                <td><?= $vehicule['id_vehicule']; ?></td>
                <td><?= $vehicule['ville']; ?></td>
                <td><?= $vehicule['titre']; ?></td>
                <td><?= $vehicule['marque']; ?></td>
                <td><?= $vehicule['modele']; ?></td>
                <td><?= $vehicule['description']; ?></td>
                <td> <img src="<?= $vehicule['photo']; ?>" alt="Une photo représentant le véhicule, image non-contractuelle." class="img-fluid"></td>
                <td><?= $vehicule['prix_journalier']; ?> €</td>
                <td><i class="fas fa-search px-2 py-2"> </i><i class="fas fa-edit px-2 py-2"> </i><i class="fas fa-trash-alt px-2 py-2"></i></td>
            </tr>

            <?php endforeach; ?>

        </table>
    </div>

</main>

<?php require_once('../layout/footer.inc.php'); ?>