<?php require_once ('../layout/header.inc.php'); ?>

<?php require_once ('../controller/membreController.php'); ?>

    <title>Membre</title>

<?php require_once ('../layout/navbar.inc.php'); ?>

<main>

    <img src="../image/logo-veville.png" alt="Notre logo." style="display: block; margin-left: auto; margin-right: auto;">

    <h1 class='text-center'>Membre</h1>

    <form method="POST" class="row mx-2 g-3">

        <div class="col-md-6">
            <label for="prenom" class="form-label">Prénom</label>
            <div class="input-group flex-nowrap ">
                <span class="input-group-text" for="prenom"><i class="fas fa-pencil-alt"></i></span>
                <input type="text" class="form-control" id="prenom" name="prenom" placeholder="votre prénom">
            </div>
        </div>

        <div class="col-md-6">
            <label for="nom" class="form-label">Nom</label>
            <div class="input-group flex-nowrap ">
                <span class="input-group-text" for="nom"><i class="fas fa-pencil-alt"></i></span>
                <input type="text" class="form-control" id="nom" name="nom" placeholder="votre nom">
            </div>
        </div>

        <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <div class="input-group flex-nowrap ">
                <span class="input-group-text" for="email"><i class="fas fa-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" placeholder="email">
            </div>
        </div>

        <div class="col-md-6">
            <label for="mdp" class="form-label">Mot de passe</label>
            <div class="input-group flex-nowrap ">
                <span class="input-group-text" for="mdp"><i class="fas fa-lock"></i></span>
                <input type="password" class="form-control" id="mdp" name="mdp" placeholder="mot de passe">
            </div>
        </div>

        <div class="col-md-6">
            <label for="pseudo" class="form-label">Pseudo</label>
            <div class="input-group flex-nowrap ">
                <span class="input-group-text" for="pseudo"><i class="fas fa-user"></i></span>
                <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="pseudo">
            </div>
        </div>

        <div class="col-md-6">
            <label for="civilite" class="form-label">Civilité</label>
            <select name="civilite" class="form-select">
                <!-- <option selected>Veuillez sélectionner votre civilité</option> -->
                <option value="m">Homme</option>
                <option value="f">Femme</option>
            </select>
        </div>

        <div class="col-md-6">
            <label for="statut" class="form-label">Statut</label>
            <select name="statut" class="form-select">
                <!-- <option selected>Veuillez sélectionner votre rôle</option> -->
                <option value="1">Admin</option>
                <option value="0">Membre</option>
            </select>
        </div>

        <div class="col-12 text-center">
            <button type="submit" name="postMembre" class="btn btn-primary">Enregistrer</button>
        </div>

    </form>

    <div class="table-responsive">
        <table class="table table-bordered align-middle mt-4">

            <thead>
                <tr>
                    <th>id membre</th>
                    <th>pseudo</th>
                    <th>nom</th>
                    <th>prénom</th>
                    <th>email</th>
                    <th>civilité</th>
                    <th>statut</th>
                    <th>date d'inscription</th>
                    <th>action</th>
                </tr>
            </thead>

            <?php foreach($arrayMembre as $membre): ?>

            <tr>
                <td><?= $membre['id_membre']; ?></td>
                <td><?= $membre['pseudo']; ?></td>
                <td><?= $membre['nom']; ?></td>
                <td><?= $membre['prenom']; ?></td>
                <td><?= $membre['email']; ?></td>
                <td><?= $membre['civilite']; ?></td>
                <td><?= $membre['statut']; ?></td>
                <td><?= $membre['date_enregistrement']; ?></td>
                <td><i class="fas fa-search px-2 py-2"> </i><i class="fas fa-edit px-2 py-2"> </i><i class="fas fa-trash-alt px-2 py-2"></i></td>
            </tr>

            <?php endforeach; ?>

        </table>
    </div>

    <p class='text-center'>Rappel : Un statut 0 désigne un membre et un 1 désigne un administrateur du site.</p>

</main>

<?php require_once ('../layout/footer.inc.php'); ?>