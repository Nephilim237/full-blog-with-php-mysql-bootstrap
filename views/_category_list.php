<?php
require_once 'display-header.php';
?>

<?= display_header('Liste des catégories', 'clipboard-list') ?>

<section class="py-5">
    <div class="container">
        <?= display_session_alert(); ?>
        <?= display_session_alert('warning'); ?>
        <?= display_session_alert('info'); ?>

        <?php if (empty($categories)): ?>
            <div class="col-md-8 mx-auto">
                <h1 class="fs-2 mb-2 b-title text-start">Aucune catégorie pour le moment</h1>
            </div>
        <?php else: ?>
            <div class="card">
                <div class="card-header  bg-dark text-light">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h1 class="fs-2 mb-2 b-title text-start">Liste des catégories</h1>
                        </div>
                        <div class="col-md-4">
                            <form action="<?= $_SERVER['PHP_SELF'] ?>">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control rounded-0" placeholder="Rechercher..." aria-label="Rechercher..."
                                           aria-describedby="basic-addon1" name="q" value="<?= get_get_data($_GET, 'q') ?>">
                                    <button class="btn btn-outline-success input-group-text rounded-0" id="basic-addon1"><i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="card-body border-top border-orange">
                    <table class="table table-striped table-hover">
                        <thead class="text-uppercase fw-bold">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titre</th>
                            <th scope="col">Date Création</th>
                            <th scope="col">Auteur</th>
                            <th scope="col">Actions</th>
                        </tr>

                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category): ?>
                            <?php $fullName = $category->name . ' ' . $category->firstname ?>
                        <?php $modalId = str_replace([" ", "\n", "\r", "\t", "\v", "\00", "'", ","], '', $category->title . $category->id) ?>
                            <tr>
                                <td scope="row"><?= $category->id ?></td scope="row">
                                <td class="fw-bold"><?= $category->title ?></td>
                                <td><?= time_format($category->created_at) ?></td>
                                <td><?= $fullName ?></td>
                                <td>
                                    <a href="category_edit.php?id=<?= $category->id ?>" class="text-primary"><i
                                                class="fas fa-edit"></i></a>
                                    <a href="category_delete.php?id=<?= $category->id ?>"
                                       onclick="return(confirm('Confirmer la suppression de cet élément'))" class="text-danger"><i
                                                class="fas fa-trash-alt"></i>
                                    </a>
                                    <a href="#" type="button" class="text-info" data-bs-toggle="modal" data-bs-target="#<?=
                                    $modalId ?>"><i class="fas fa-info-circle"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <nav class="blog-pagination mb-2"><!-- Pagination -->
                    <ul class="cc-pagination">
                        <?= display_pagination($totalPages) ?>
                    </ul>
                </nav><!-- End pagination -->
            </div>

            <div class="category-info">
                <!-- Modal -->
                <?php foreach ($categories as $category): ?>
                    <?php $modalId = str_replace([" ", "\n", "\r", "\t", "\v", "\00", "'", ","], '', $category->title . $category->id) ?>
                    <div class="modal fade" id="<?= $modalId ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"><?= $category->title ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Catégorie N° <?= $category->id ?> crée le <?= time_format($category->created_at) ?> par <?= $fullName ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>