<?php require_once 'display-header.php' ?>

<?= display_header('Liste des utilisateurs', 'users') ?>

<section class="py-5">
    <div class="container">
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
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td scope="row"><?= $user->id ?></td scope="row">
                                <td>
                                    <div class="fw-bold"><?= $user->name ?> <?= $user->firstname ?></div>
                                    <small class="text-muted fst-italic">--<?= $user->email ?>--</small>

                                </td>
                                <td><?= $user->role ?></td>
                                <td><?= time_format($user->created_at) ?></td>
                                <td>
                                    <a href="delete_user.php?id=<?= $user->id ?>" onclick="return(confirm('Confirmer la suppression de cet élément'))" class="btn btn-sm btn-danger rounded-0"><i class="fas fa-trash-alt"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-dark rounded-0" data-bs-toggle="modal" data-bs-target="#<?= $user->name.$user->firstname.$user->id ?>"><i class="fas fa-info-circle"></i></button>
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
            <?php foreach($users as $user): ?>
                <div class="modal fade" id="<?= $user->name.$user->firstname.$user->id ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?= $user->name . ' ' . $user->firstname ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Utilisateur N° <?= $user->id ?> <br>
                                <?= $user->name ?> <?= $user->firstname ?> <br>
                                <span class="fw-bold">Rôle : </span> <?= $user->role ?> <br>
                                Présent depuis le <?= time_format($user->created_at) ?> <br>
                                Ajouter par super administrateur <span class="fw-bold">Coding City</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
