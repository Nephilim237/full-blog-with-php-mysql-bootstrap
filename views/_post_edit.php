<?php

require_once 'display-header.php';

echo display_header('Ajouter un article', "file-alt");

?>

<section>
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 col-sm mx-auto">
                <?= display_session_alert(); ?>
                <?= display_session_alert('warning'); ?>
                <?= display_session_alert('info'); ?>
                <div class="card bg-dark text-light">
                    <div class="card-header">
                        <h1 class="b-title fs-2 mb-2">Ajouter un article</h1>
                    </div>
                    <div class="card-body border-top border-orange">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="cc-ff">
                                <label for="title" class="form-label">Titre : </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="title"><i class="fas fa-heading"></i></span>
                                    <input type="text" class="form-control" id="title" placeholder="Titre de l'article" name="title" value="<?= get_post_data($_POST, 'title') ?>">
                                    <?= display_errors($errors, 'title') ?>

                                </div>
                            </div>

                            <div class="cc-ff">
                                <label for="category">Categorie:</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="category"><i class="fas fa-folder"></i></label>
                                    <select class="form-select" id="category" name="category[]" multiple>
                                        <?php foreach ($categories as $k => $category): ?>
                                            <option value="<?= $category ?>" <?= get_selected_tag('category', $category) ?>><?= $category ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= display_errors($errors, 'category') ?>
                                </div>
                            </div>

                            <div class="cc-ff">
                                <label for="category">Image :</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="profile-image" name="image">
                                    <label class="input-group-text" for="profile-image"><i
                                            class="fas fa-image"></i></label>
                                    <?= display_errors($errors, 'image') ?>
                                </div>
                            </div>

                            <div class="cc-ff">
                                <label for="category">Article :</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                    <textarea class="form-control" id="content"
                                              name="content"><?= get_post_data($_POST, 'content') ?></textarea>
                                    <?= display_errors($errors, 'content') ?>
                                </div>
                            </div>

                            <input type="submit" name="post" value="Ajouter" class="cc-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>