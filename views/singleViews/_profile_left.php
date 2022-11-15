<div class="col-md-3 cc-profile-left">
    <div class="d-flex flex-column p-3 text-white bg-dark h-100">
        <div class="card bg-transparent border-0 rounded-0">
            <img src="<?= ds_info('image') ?? 'assets/imgs/default.png' ?>" class="card-img-top img-rounded w-50 mx-auto"
                 alt="Image de profil par défaut">
            <div class="card-body px-0 text-center">
                <h5 class="card-title mb-0"><?= $param ?></h5>
                <h6 class="text-info"><?= ds_info('role') === 'super' ? 'Super Admin' : ds_info('role') ?></h6>
                <p class="profile-buttons d-flex justify-content-center">
                    <a href="#" class="btn bg-orange mx-1 btn-sm">S'abonner</a>
                    <a href="#" class="btn btn-light mx-1 btn-sm">Message</a>
                </p>
            </div>
            <div class="dropdown-divider border-orange"></div>

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white <?= set_active('index.php') ?>" aria-current="page">
                        <i class="fas fa-home"></i>
                        Accueil
                    </a>
                </li>
                <li class="nav-item">
                    <a href="profile.php?id=<?= ds_info('id') ?>" class="nav-link text-white <?= set_active('profile.php') ?>" aria-current="page">
                        <i class="fas fa-user-edit"></i>
                        Mon profil
                    </a>
                </li>
                <li>
                    <a href="admin.php" class="nav-link text-white <?= set_active('admin.php') ?>">
                        <i class="fas fa-th-large"></i>
                        Tableau de bord
                    </a>
                </li>
                <li>
                    <a href="post_list.php" class="nav-link text-white  <?= set_active('post_list.php') ?>">
                        <i class="fas fa-heading"></i>
                        Posts
                    </a>
                </li>
                <li>
                    <a href="user_list.php" class="nav-link text-white  <?= set_active('user_list.php') ?>">
                        <i class="fas fa-users"></i>
                        Utilisateurs
                    </a>
                </li>
                <li>
                    <a href="category_list.php" class="nav-link text-white  <?= set_active('category_list.php') ?>">
                        <i class="fas fa-tags"></i>
                        Catégories
                    </a>
                </li>
            </ul>
            <div class="dropdown-divider border-orange"></div>
            <div class="card-body text-capitalize text-center row">
                <div class="col-sm-4">
                    <div class="profile-stat-value">29</div>
                    <div class="profile-stat-title">Posts</div>
                </div>
                <div class="col-sm-4">
                    <div class="profile-stat-value">126</div>
                    <div class="profile-stat-title">Com</div>
                </div>
                <div class="col-sm-4">
                    <div class="profile-stat-value">53</div>
                    <div class="profile-stat-title">Projets</div>
                </div>
            </div>
            <div class="dropdown-divider border-orange"></div>

            <div class="card-body">
                <h6 class="text-center text-info">A propos de <?= $param ?></h6>
                <p class="text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere,
                    quidem, quos! Aspernatur dolor odit placeat quibusdam? Mollitia rerum
                    soluta voluptas.</p>
            </div>
            <div class="dropdown-divider border-orange"></div>

            <div class="card-header text-center text-uppercase">
                <i class="fas fa-globe-africa"></i> Liens Importants
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent border-secondary border-bottom">
                    <a href="#" class="text-light">
                        <i class="fab fa-facebook-square"></i>
                        Facebook
                    </a>
                </li>
                <li class="list-group-item bg-transparent border-secondary border-bottom">
                    <a href="#" class="text-light">
                        <i class="fab fa-twitter"></i>
                        Twitter
                    </a>
                </li>
                <li class="list-group-item bg-transparent border-secondary border-bottom">
                    <a href="#" class="text-light">
                        <i class="fab fa-youtube"></i>
                        YouTube
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>