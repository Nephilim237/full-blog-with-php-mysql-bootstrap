<?php require_once 'display-header.php' ?>

<?= display_header('Inscription', 'user-plus') ?>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 col-sm mx-auto">
                <?= display_session_alert(); ?>
                <?= display_session_alert('warning'); ?>
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h1 class="b-title fs-2 mb-2">Rejoignez-nous.</h1>
                    </div>
                    <div class="card-body border-top border-orange">
                        <form action="" method="post">
                            <div class="nom">
                                <label for="name" class="form-label">Nom : </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="name" placeholder="Entrez votre nom" name="name" value="<?= get_post_data($_POST, 'name') ?>">
                                    <?= display_errors($errors, 'name') ?>
                                </div>
                            </div>

                            <div class="prenom">
                                <label for="firstname" class="form-label">Prénom : </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    <input type="text" class="form-control" id="firstname" placeholder="Entrez votre prénom" name="firstname" value="<?= get_post_data($_POST, 'firstname') ?>">
                                    <?= display_errors($errors, 'firstname') ?>
                                </div>
                            </div>

                            <div class="email">
                                <label for="email" class="form-label">Email : </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                                    <input type="text" class="form-control" id="email" placeholder="Entrez votre email" name="email" value="<?= get_post_data($_POST, 'email') ?>">
                                    <?= display_errors($errors, 'email') ?>
                                </div>
                            </div>

                            <div class="password">
                                <label for="password" class="form-label">Mot de passe : </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                                    <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password"
                                           value="<?=
                                    get_post_data($_POST, 'password') ?>">
                                    <?= display_errors($errors, 'password') ?>
                                </div>
                            </div>

                            <input type="submit" name="register" value="S'inscrire" class="cc-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>