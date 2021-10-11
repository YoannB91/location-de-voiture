<?php require_once('../layout/header.inc.php'); ?>

<?php require_once('../controller/agencesController.php'); ?>

<title>Agences</title>

<?php require_once('../layout/navbar.inc.php'); ?>

    <h1 class='text-center'>Agences</h1>

    <form method="POST" class="row mx-2 g-3">

        <div class="col-md-6">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" id="titre" name="titre" placeholder="Titre de l'agence">
        </div>

        <div class="col-md-6">
            <label for="photo" class="form-label">Photo</label>
            <input type="text" class="form-control" id="photo" name="photo" placeholder="Photo">
        </div>

        <div class="col-12">
            <label for="adresse" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" placeholder="Adresse">
        </div>

        <div class="col-md-6">
            <label for="ville" class="form-label">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" placeholder="Ville">
        </div>

        <div class="col-md-6">
            <label for="cp" class="form-label">Code Postal</label>
            <input type="text" class="form-control" id="cp" name="cp" placeholder="Code Postal">
        </div>

        <div class="col-12">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="6" placeholder="Description de votre agence"></textarea>
        </div>

        <div class="col-12 text-center">
            <button type="submit" name="postAgences" class="btn btn-primary">Enregistrer</button>
        </div>

    </form>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mt-4">

            <thead>
                <tr>
                    <th>Agence</th>
                    <th>titre</th>
                    <th>adresse</th>
                    <th>ville</th>
                    <th>cp</th>
                    <th>description</th>
                    <th>photo</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php foreach($arrayAgences as $agence): ?>

            <tr>
                <td><?= $agence['id_agence']; ?></td>
                <td><?= $agence['titre']; ?></td>
                <td><?= $agence['adresse']; ?></td>
                <td><?= $agence['ville']; ?></td>
                <td><?= $agence['cp']; ?></td>
                <td><?= $agence['description']; ?></td>
                <td><img src="<?= $agence['photo']; ?>" alt="Une photo représentant la ville où se situe l'agence." class="img-fluid"></td>
                <td>
                <!-- //, Le filtre. -->
                <i class="fas fa-search px-2 py-2"> </i>
                <!-- //, La modification. -->
                <i class="fas fa-edit px-2 py-2"> </i>
                <!-- //, La suppression. -->
                <a href="?actionA=deleteAgence&id=<?= $agence['id_agence'] ?>"> <i class="fas fa-trash-alt px-2 py-2"> </i> </a>
                </td>
            </tr>

            <?php endforeach; ?>

        </table>
    </div>

</main>

<?php require_once('../layout/footer.inc.php'); ?>