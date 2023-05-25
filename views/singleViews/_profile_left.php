<div class="col-md-2 px-0">
    <div class="d-flex flex-column p-3 text-white bg-dark h-100">
        <div class="card bg-transparent border-0 rounded-0">

            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link text-white <?= set_active('index.php') ?>" aria-current="page">
                        <i class="fas fa-home"></i>
                        Accueil
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

                        <i class="fas fa-blog"></i>
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

            <div class="card-header text-center text-uppercase">
                <i class="fas fa-globe-africa"></i> Liens Importants
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item bg-transparent border-secondary border-bottom">
                    <a href="#" class="text-primary">
                        <i class="fab fa-facebook-square"></i>
                        Facebook
                    </a>
                </li>
                <li class="list-group-item bg-transparent border-secondary border-bottom">
                    <a href="#" class="text-primary">
                        <i class="fab fa-twitter"></i>
                        Twitter
                    </a>
                </li>
                <li class="list-group-item bg-transparent border-secondary border-bottom">
                    <a href="#" class="text-danger">
                        <i class="fab fa-youtube"></i>
                        YouTube
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>