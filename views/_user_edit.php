<?php

require_once 'display-header.php';

echo display_header('Gerer les roles', "users-cog");

?>

<section>
    <div class="row me-0">
        <?php require_once 'singleViews/_profile_left.php'?>
        <div class="col-md-10 px-0">
            <div class="container-fluid px-0">
                <div class="row">
                    <div class="col-md-8 col-sm mx-auto">
                        <?= display_session_alert(); ?>
                        <?= display_session_alert('warning'); ?>
                        <div class="card bg-dark text-light">
                            <div class="card-header">
                                <h1 class="b-title fs-2 mb-2">Modifier les accès</h1>
                            </div>
                            <div class="card-body border-top border-orange">
                                <form action="" method="post">
                                    <div class="role">
                                        <label for="role">Rôle:</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="role">Rôle</label>
                                            <select class="form-select" id="role" name="role">
                                                <option value="user" <?= !isset($_POST['role']) ? 'selected' : get_selected_tag('role', 'user',
                                                    $user->role)
                                                ?>>Utilisateur</option>
                                                <option value="modo" <?= get_selected_tag('role', 'modo', $user->role) ?>>Moderateur</option>
                                                <option value="admin" <?= get_selected_tag('role', 'admin', $user->role) ?>>Administrateur</option>
                                                <option value="super" <?= get_selected_tag('role', 'super', $user->role) ?>>Super
                                                    Administrateur</option>
                                            </select>
                                            <?= display_errors($errors, 'role') ?>
                                        </div>
                                    </div>

                                    <input type="submit" name="change_role" value="Changer" class="cc-btn">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
