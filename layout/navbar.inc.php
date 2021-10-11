
</head>

<?php require_once('../router.php'); ?>

<body>

<header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Location</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">

                <ul class="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><i class="fas fa-key"></i> acceuil</a>
                    </li>

                    <?php if(!isset($_SESSION['membre'])) : ?>

                    <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#sign_up"><i class="fas fa-user-plus"></i> s'inscrire</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#sign"><i class="fas fa-user"></i> se connecter</a>
                    </li>

                    <?php endif; ?>

                    <?php if(isset($_SESSION['membre'])) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="compte.page.php"><i class="fas fa-user-circle"></i> mon compte</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> contactez-nous</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="?action=logout"><i class="fas fa-power-off"></i> déconnexion</a>
                    </li>

                    <?php else: ?>

                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-envelope"></i> contactez-nous</a>
                    </li>

                    <?php endif; ?>

                    <?php if(isset($_SESSION['membre']) && $_SESSION['membre'] ['statut'] == 1 ): ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-folder-open"></i> Dashboard
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li>
                                <a class="dropdown-item" href="agences.page.php"><i class="fas fa-building"></i> Agences</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="vehicule.page.php"><i class="fas fa-car"></i> Véhicules</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="membre.page.php"><i class="fas fa-users"></i> Membre</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="commande.page.php"><i class="fas fa-box"></i> Commande</a>
                            </li>
                        </ul>
                    </li>

                    <?php endif; ?>

                    <li class="nav-item">

                        <?php if(isset($_SESSION['membre'])): ?>

                            <a class="nav-link"><i class="fas fa-coffee"></i> Bonjour <?= $_SESSION['membre']['prenom'] . " " . $_SESSION['membre']['nom']; ?>.</a>

                        <?php endif; ?>

                    </li>

                </ul>

            </div>
        </div>
    </nav>


    <!-- Modal Inscription -->
    <div class="modal fade" id="sign_up" tabindex="-1" aria-labelledby="sign_upLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="sign_upLabel">S'inscrire</h4>
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#sign">Déjà inscrit ?</a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Le formulaire. -->
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="prenom" placeholder="Votre prenom">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="nom" placeholder="Votre nom">
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo">
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control" name="email" placeholder="Votre email">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe">
                        </div>
                        <div class="mb-3">
                            <select name="civilite" class="form-select">
                                <option value="m">Homme</option>
                                <option value="f">Femme</option>
                            </select>
                        </div>
                        <button type="submit" name="sign_up" class="btn btn-primary">Inscription</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


        <!-- Modal Connexion -->
        <div class="modal fade" id="sign" tabindex="-1" aria-labelledby="signLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="signLabel">Se connecter</h4> 
                    <a class="nav-link modal-title" data-bs-toggle="modal" data-bs-target="#sign_up">Vous n'avez pas encore de compte?</a>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Le formulaire. -->
                    <form method="POST">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="pseudo" placeholder="Votre pseudo">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" name="mdp" placeholder="Votre mot de passe">
                        </div>
                        <button type="submit" name="sign" class="btn btn-primary">Connexion</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</header>

<main>

    <a href="index.php"> <img src="../image/logo-veville.png" alt="Notre logo." style="display: block; margin-left: auto; margin-right: auto;"> </a>