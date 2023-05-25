<?php require_once 'display-header.php' ?>

<?= display_header('Liste des utilisateurs', 'users') ?>

<section class="">
    <div class="row me-0">
        <?php require_once 'singleViews/_profile_left.php' ?>
        <div class="col-md-10 px-0">
            <div class="container-fluid px-0">
                <?= display_session_alert(); ?>
                <?= display_session_alert('warning'); ?>
                <?= display_session_alert('info'); ?>

                <div class="card">
                    <div class="card-header  bg-dark text-light">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h1 class="fs-2 mb-2 b-title text-start">Liste des utilisateurs</h1>
                            </div>
                            <div class="col-md-4">
                                <form action="<?= $_SERVER['PHP_SELF'] ?>">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control rounded-0" placeholder="Rechercher..." aria-label="Rechercher..." aria-describedby="basic-addon1" name="q" value="<?= get_get_data($_GET, 'q') ?>">
                                        <button class="btn btn-outline-success input-group-text rounded-0" id="basic-addon1"><i class="fas fa-search"></i></button>
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
                                <th scope="col">Nom</th>
                                <th scope="col">Rôle</th>
                                <th scope="col">Inscrit le</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if ($users): ?>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td scope="row"><?= $user->id ?></td scope="row">
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <img src="<?= $user->image ?>" alt="Photo de profil de <?= $user->name ?>" width="30" height="30"
                                                     class="rounded-circle">
                                                <div class="user-name-email">
                                                    <div class=""><?= $user->name ?> <?= $user->firstname ?></div>
                                                    <small class="text-muted fst-italic"><?= $user->email ?></small>
                                                </div>
                                            </div>

                                        </td>
                                        <td><?= $user->role ?></td>
                                        <td><?= time_format($user->created_at) ?></td>
                                        <td>
                                            <a href="user_delete.php?id=<?= $user->id ?>" onclick="return(confirm('Confirmer la suppression de cet ' +
                                     'élément'))" class="text-danger"><i class="fas fa-trash-alt"></i>
                                            </a>
                                            <a href="user_edit.php?id=<?= $user->id ?>" class="text-primary"><i class="fas fa-user-edit"></i>
                                            </a>
                                            <a href="#" class="text-dark" data-bs-toggle="modal" data-bs-target="#<?= $user->name.$user->firstname
                                            .$user->id ?>"><i class="fas fa-info-circle"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
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
                    <?php if ($users): ?>
                        <?php foreach($users as $user): ?>
                            <div class="modal fade" id="<?= $user->name.$user->firstname.$user->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"><?= $user->name . ' ' . $user->firstname ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="d-flex align-items-center justify-content-between gap-4">
                                                <div class="user-modal-info">
                                                    Utilisateur N° <?= $user->id ?> <br>
                                                    <?= $user->name ?> <?= $user->firstname ?> <br>
                                                    <span class="fw-bold">Rôle : </span> <?= $user->role ?> <br>
                                                    Présent depuis le <?= time_format($user->created_at) ?> <br>
                                                    Ajouter par super administrateur <span class="fw-bold">Coding City</span>
                                                </div>

                                                <div class="user-modal-img">
                                                    <img src="<?= $user->image?>" alt="<?= $user->name ?>" width="100">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
