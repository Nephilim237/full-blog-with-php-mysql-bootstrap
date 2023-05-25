<?php

require_once 'display-header.php';

echo display_header('Modifier un article', "file-alt");

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
                        <h1 class="b-title fs-4 mb-2">Modifier l'article "<strong class="text-warning fw-bolder"><?= decode_string($post->title)
                                ?></strong>"</h1>
                    </div>
                    <div class="card-body border-top border-orange">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="cc-ff">
                                <label for="title" class="form-label">Titre : </label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-heading"></i></span>
                                    <input type="text" class="form-control" id="title" placeholder="Titre de l'article" name="title" value="<?=
                                    get_post_data($_POST, 'title', $post->title) ?>">
                                    <?= display_errors($errors, 'title') ?>

                                </div>
                            </div>

                            <div class="cc-ff">
                                <label for="category">Categorie:</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="category"><i class="fas fa-folder"></i></label>
                                    <select class="form-select" size="<?= count($assocCategoriesIdName) ?>" id="category" name="category[]" multiple>
                                        <?php foreach ($assocCategoriesIdName as $k => $category): ?>
                                            <option value="<?= $category ?>" <?= get_selected_tag('category', $category, $categoriesForThisPost) ?>><?=
                                                $category
                                                ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= display_errors($errors, 'category') ?>
                                </div>
                            </div>

                            <div class="cc-ff">
                                <label for="profile-image">Image :</label>
                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="profile-image" name="image">
                                    <label class="input-group-text" for="profile-image"><i
                                            class="fas fa-image"></i></label>
                                    <?= display_errors($errors, 'image') ?>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-sm-6">
                                        <img src="<?= $post->image ?>" alt="Illustration de l'article <?= $post->title ?>" class="img-fluid">
                                    </div>
                                </div>
                            </div>

                            <div class="cc-ff">
                                <label for="content">Article :</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text"><i class="fas fa-info-circle"></i></span>
                                    <textarea class="form-control" id="content"
                                              name="content"><?= get_post_data($_POST, 'content', $post->content) ?></textarea>
                                    <?= display_errors($errors, 'content') ?>
                                </div>
                            </div>

                            <input type="submit" name="update" value="Mettre à jour" class="cc-btn">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>