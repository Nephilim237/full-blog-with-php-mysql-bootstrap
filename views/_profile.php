<?php

require_once 'display-header.php';
$param = "<span class='text-info'>" . ds_info('name') . ' ' . ds_info('firstname') . "</span>";

echo display_header('Bienvenue sur votre profil ' . $param, "user-cog"); ?>
<section class="">
    <div class="row me-0">
        <?php require_once 'singleViews/_profile_left.php' ?>
        <div class="col-md-9 cc-profile-right">
            <div class="container-fluid py-3">
                <?= display_session_alert(); ?>
                <?= display_session_alert('warning'); ?>
                <?= display_session_alert('info'); ?>

                <div class="row mx-0">
                    <div class="col-md-6">
                        <div class="col-12 border-bottom border-orange mb-3"><h1 class="piazzo text-center">
                                Informations</h1></div>
                        <span class="object fs-6 fw-bold">Nom : </span> <span
                                class="object-value fs-6"><?= ds_info('name') ?></span><br>
                        <span class="object fs-6 fw-bold">Prénom : </span> <span
                                class="object-value fs-6"><?= ds_info('firstname') ?></span><br>
                        <span class="object fs-6 fw-bold">Date de naissance : </span> <span
                                class="object-value fs-6"><?= ds_info('born_at') ?></span><br>
                        <span class="object fs-6 fw-bold">Sexe : </span> <span
                                class="object-value fs-6"><?= ds_info('gender') ?></span><br>
                        <span class="object fs-6 fw-bold">Adresse : </span> <span
                                class="object-value fs-6"><?= ds_info('adress') ?></span><br>
                        <span class="object fs-6 fw-bold">Téléphone : </span> <span
                                class="object-value fs-6"><?= ds_info('phone') ?></span><br>
                        <span class="object fs-6 fw-bold">Biographie : </span> <span
                                class="object-value fs-6"><?= ds_info('bio') ?></span><br>
                        <form action="" method="post">
                            <button class="btn-link btn" name="update_profile">Mettre à jour le profil</button>
                            <button class="btn-link btn" name="update_password">Mettre à jour le mot de passe</button>
                        </form>
                    </div>


                    <div class="col-md-6">
                        <div class="row">
                            <?php if (isset($_POST['update_profile']) || $profileForm === true): ?>
                            <!-- FORMULAIRE DE MISE A JOUR DU PROFIL DE L'UTILISATEUR -->
                            <div class="col-12 border-bottom border-orange">
                                <h1 class="piazzo text-center">Modifier votre profil</h1>
                            </div>
                            <div class="card border-0">
                                <div class="card-body ">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-calendar-alt"></i></span>
                                                <input type="text" class="form-control"
                                                       placeholder="Ex: 1998-10-31 ou 1998/10/31" name="born_at"
                                                       value="<?= get_post_data($_POST, 'born_at', $userInfo->born_at ?? '') ?>">
                                                <?= display_errors($errors, 'born_at') ?>
                                            </div>
                                        </div>
                                        <div class="cc-ff d-flex justify-content-evenly align-items-center mb-3 fs-6">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="male"
                                                       value="male" checked>
                                                <label class="form-check-label" for="male">
                                                    Homme
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="gender" id="female"
                                                       value="female">
                                                <label class="form-check-label" for="female">
                                                    Femme
                                                </label>
                                            </div>
                                            <?= display_errors($errors, 'gender') ?>
                                        </div>

                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-user"></i></span>
                                                <input type="text" class="form-control"
                                                       placeholder="Ex:. Avenue Kenedy - Carrefour Picart" name="adress"
                                                       value="<?= get_post_data($_POST, 'adress', $userInfo->adress ?? '') ?>">
                                                <?= display_errors($errors, 'adress') ?>
                                            </div>
                                        </div>

                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-at"></i></span>
                                                <input type="text" class="form-control" placeholder="Entrez votre email"
                                                       name="email" value="<?= get_post_data($_POST, 'email', $userInfo->email ?? '') ?>">
                                                <?= display_errors($errors, 'email') ?>
                                            </div>
                                        </div>

                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-phone-alt"></i></span>
                                                <input type="text" class="form-control" placeholder="Ex: +224004695278"
                                                       name="phone"
                                                       value="<?= get_post_data($_POST, 'phone', $userInfo->phone ?? '') ?>">
                                                <?= display_errors($errors, 'phone') ?>
                                            </div>
                                        </div>

                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <label class="input-group-text" for="profile-image">Photo de profil <i
                                                            class="fas fa-image"></i></label>
                                                <input type="file" class="form-control" id="profile-image" name="image">
                                                <?= display_errors($errors, 'image') ?>
                                            </div>
                                        </div>

                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                                <textarea class="form-control" id="bio"
                                                          placeholder="Ex:. Parlez-nous de vous"
                                                          name="bio"><?= get_post_data($_POST, 'bio', $userInfo->bio ?? '') ?> </textarea>
                                                <?= display_errors($errors, 'bio') ?>
                                            </div>
                                        </div>

                                        <div class="d-flex">
                                            <input type="submit" name="update_user" value="Mettre à jour"
                                                   class="cc-btn">
                                            <a href="profile.php?id=<?= ds_info('id') ?>"
                                               class="ms-5 btn btn-danger rounded-0">Annuler</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?><!-- FIN FORMULAIRE DE MISE A JOUR DU PROFIL DE L'UTILISATEUR -->

                            <?php if (isset($_POST['update_password']) || $passwordForm === true): ?><!-- FORMULAIRE DE MISE A JOUR DU MOT DE PASSE DE L'UTILISATEUR -->
                            <div class="col-12 border-bottom border-orange">
                                <h1 class="piazzo text-center">Modifier votre mot de passe</h1>
                            </div>
                            <div class="card border-0">
                                <div class="card-body ps-0">
                                    <form action="" method="post">
                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-lock-open"></i></span>
                                                <input type="password" class="form-control"
                                                       placeholder="Mot de passe actuel" name="actual_password"
                                                       value="<?= get_post_data($_POST, 'actual_password') ?>">
                                                <?= display_errors($errors, 'actual_password') ?>
                                            </div>
                                        </div>

                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-lock"></i></span>
                                                <input type="password" class="form-control"
                                                       placeholder="Nouveau mot de passe" name="new_password"
                                                       value="<?= get_post_data($_POST, 'new_password') ?>">
                                                <?= display_errors($errors, 'new_password') ?>
                                            </div>
                                        </div>

                                        <div class="cc-ff">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="basic-addon1"><i
                                                            class="fas fa-lock"></i></span>
                                                <input type="password" class="form-control"
                                                       placeholder="Confirmer mot de passe" name="confirm_password"
                                                       value="<?= get_post_data($_POST, 'confirm_password') ?>">
                                                <?= display_errors($errors, 'confirm_password') ?>
                                            </div>
                                        </div>

                                        <div class="d-flex">
                                            <input type="submit" name="change_password" value="Mettre à jour"
                                                   class="cc-btn">
                                            <a href="profile.php?id=<?= ds_info('id') ?>"
                                               class="ms-5 btn btn-danger rounded-0">Annuler</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php endif; ?><!-- FIN FORMULAIRE DE MISE A JOUR DU MOT DE PASSE DE L'UTILISATEUR -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
