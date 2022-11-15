<?php require_once 'display-header.php' ?>

<?= display_header('Gestion des catégories', 'edit') ?>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 col-sm mx-auto">
                <?= display_session_alert(); ?>
                <?= display_session_alert('warning'); ?>
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h1 class="b-title fs-2 mb-2">Ajouter une catégorie</h1>
                    </div>
                    <div class="card-body border-top border-orange">
                        <form action="" method="post">
                            <div class="cc-form-group">
                                <label for="category" class="form-label">Nom de(s) catégorie(s) : </label>
                                <input type="text" class="cc-form-control" id="category" name="category" placeholder="Saisissez une ou plusieurs catégories..." value="<?= get_post_data($_POST, 'category') ?>">
                                <?= display_errors($errors, 'category') ?>
                            </div>

                            <input type="submit" name="add_category" value="Ajouter" class="cc-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
