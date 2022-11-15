<?php require_once 'display-header.php' ?>

<?= display_header('Modifier Une catégorie', 'edit') ?>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-10 col-sm mx-auto">
                <?= display_session_alert(); ?>
                <?= display_session_alert('warning'); ?>
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h1 class="b-title fs-2 mb-2">Mettre à jour une catégorie</h1>
                    </div>
                    <div class="card-body border-top border-orange">
                        <form action="" method="post">
                            <div class="cc-form-group">
                                <label for="category" class="form-label">Catégorie : </label>
                                <input type="text" class="cc-form-control" id="category" name="category" value="<?=get_post_data($_POST, 'category', $currentCategory->title)?>">
                                <?= display_errors($errors, 'category') ?>
                            </div>
                            <input type="submit" name="edit_category" value="Mettre à jour" class="cc-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
