<?php require_once 'display-header.php' ?>

<?= display_header('Nouvel admin', 'users-cog') ?>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 col-sm mx-auto">
                <?= display_session_alert(); ?>
                <?= display_session_alert('warning'); ?>
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h1 class="b-title fs-2 mb-2">Ajouter un Administrateur</h1>
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

                            <div class="role">
                                <label for="role">Rôle:</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="role">Rôle</label>
                                    <select class="form-select" id="role" name="role">
                                        <option value="modo" <?= !isset($_POST['role']) ? 'selected' : get_selected_tag('role', 'user')
                                        ?>>Utilisateur</option>
                                        <option value="modo" <?= get_selected_tag('role', 'modo') ?>>Moderateur</option>
                                        <option value="admin" <?= get_selected_tag('role', 'admin') ?>>Administrateur</option>
                                        <option value="super" <?= get_selected_tag('role', 'super') ?>>Super Administrateur</option>
                                    </select>
                                    <?= display_errors($errors, 'role') ?>
                                </div>
                            </div>

                            <input type="submit" name="add_user" value="Ajouter" class="cc-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>