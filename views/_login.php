<?php

require_once 'display-header.php';

 echo display_header('Se connecter', "sign-in-alt"); ?>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 col-sm mx-auto">
                <?= display_session_alert(); ?>
                <?= display_session_alert('warning'); ?>
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h1 class="b-title fs-2 mb-2">Se connecter</h1>
                    </div>
                    <div class="card-body border-top border-orange">
                        <form action="" method="post">
                            <div class="nom">
                                <label for="username" class="form-label">Nom d'utilisateur : </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-at"></i></span>
                                    <input type="text" class="form-control" id="username" placeholder="Pseudo ou email" name="username" value="<?= get_post_data($_POST, 'username') ?>">
                                    <?= display_errors($errors, 'username') ?>
                                </div>
                            </div>

                            <div class="prenom">
                                <label for="password" class="form-label">Mot de passe : </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                    <input type="password" class="form-control" id="password" placeholder="Saisissez votre mot de passe" name="password" value="<?= get_post_data($_POST, 'password') ?>">
                                    <?= display_errors($errors, 'password') ?>
                                </div>
                            </div>

                            <input type="submit" name="login" value="Se Connecter" class="cc-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>