<?php
require_once 'display-header.php';
?>

<?= display_header('Tableau de bord', 'tachometer-alt') ?>
<section class="">
    <div class="row me-0">
        <?php require_once 'singleViews/_profile_left.php' ?>
        <div class="col-md-10 px-0">
            <div class="container-fluid py-5">
                <div class="row mx-0 py-5">
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 bg-light border-start border-5 border-primary text-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-primary">Utilisateurs</h5>
                                        <h4 class="text-secondary"><?= count_data_table('user') ?></h4>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-center text-primary fs-1">
                                            <i class="fas fa-users"></i>
                                        </p>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="user_list.php" class="link-primary">Voir les membres <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 bg-light border-start border-5 border-danger text-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-danger">Publications</h5>
                                        <h4 class="text-secondary"><?= count_data_table('post') ?></h4>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-center text-danger fs-1">
                                            <i class="fas fa-blog"></i>
                                        </p>
                                    </div>
                                    <div class="dropdown-divider "></div>
                                    <a href="post_list.php" class="link-danger">Voir les posts <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 border-start border-5 border-orange text-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-warning">Comptes Actifs</h5>
                                        <h4 class="text-secondary"><?= count_active_user() ?></h4>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-center text-warning fs-1">
                                            <i class="fas fa-user-check"></i>
                                        </p>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="user_list.php" class="link-warning">Voir les membres actifs <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 border-start border-5 border-success text-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-success">Posts recents</h5>
                                        <h4 class="text-secondary"><?= count_data_table('post') ?></h4>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-center text-success fs-1">
                                            <i class="fas fa-blog"></i>
                                        </p>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="post_list.php" class="link-success">Voir les posts recents <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mx-0 py-5">
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 bg-light border-start border-5 botext-secondary text-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-secondary">Super Administrateurs</h5>
                                        <h4 class="text-secondary"><?= count_role_user('super') ?></h4>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-center text-secondary fs-1">
                                            <i class="fas fa-users-cog"></i>
                                        </p>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="user_list.php" class="link-secondary">Voir les membres <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 bg-light border-start border-5 border-orange text-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-warning">Administrateurs</h5>
                                        <h4 class="text-secondary"><?= count_role_user('admin') ?></h4>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-center text-warning fs-1">
                                            <i class="fas fa-user-cog"></i>
                                        </p>
                                    </div>
                                    <div class="dropdown-divider "></div>
                                    <a href="post_list.php" class="link-warning">Voir les posts <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 border-start border-5 border-info text-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="link-info">Moderateurs</h5>
                                        <h4 class="text-secondary"><?= count_role_user('modo') ?></h4>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-center link-info fs-1">
                                            <i class="fas fa-user-shield"></i>
                                        </p>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="user_list.php" class="link-info">Voir les membres actifs <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card border-0 border-start border-5 border-danger text-dark">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-7">
                                        <h5 class="text-danger">Utilisateurs standards</h5>
                                        <h4 class="text-secondary"><?= count_role_user('user') ?></h4>
                                    </div>
                                    <div class="col-5">
                                        <p class="text-center text-danger fs-1">
                                            <i class="fas fa-user-friends"></i>
                                        </p>
                                    </div>
                                    <div class="dropdown-divider"></div>
                                    <a href="post_list.php" class="link-danger">Voir les posts recents <i class="fas fa-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
