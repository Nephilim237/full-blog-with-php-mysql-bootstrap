<?php
require_once 'includes/db.php';
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';

function set_active(string $path = null): string
{
    if (substr($_SERVER['SCRIPT_NAME'], 1) === $path) return 'active';

    return '';
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Coding city">

    <!-- Font awesome link (Lien externe pour les icones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>

    <!-- Bootstrap CSS Core -->
    <link rel="stylesheet" href="assets/stylesheets/bootstrap.min.css">

    <!-- Lien de notre fichier CSS -->
    <link rel="stylesheet" href="assets/stylesheets/screen.css">

    <link rel="icon" href="../assets/img/cc.ico">


    <title><?= $title ?? WEBSITE_NAME ?> | Coding City</title>

</head>
<body>
<!-- header section -->
<header class="header" id="header">
<div class="container">
<div class="header-container">
    <!-- Logo -->
    <a href="#" class="logo"><img src="../assets/img/cc.png" alt="Le logo" class="img"></a>
    <!--End logo -->
<nav class="navigation"><!-- Navigation begin -->
    <ul class="nav-links">
        <li class="nav-item">
            <a href="index.php" class="nav-link <?= set_active('index.php') ?>">Accueil
                <i class="fas fa-home"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="blog.php" class="nav-link <?= set_active('blog.php') ?>">
                Blog <i class="fas fa-comments"></i>
            </a>
        </li>
        <li class="nav-item">
            <a href="contact.php" class="nav-link <?= set_active('contact.php') ?>">
                Contact <i class="fas fa-envelope"></i>
            </a>
        </li>
        <?php if (!isset($_SESSION['role'])): ?>
            <li class="nav-item">
                <a href="register.php" class="nav-link <?= set_active('register.php') ?>">
                    S'incrire <i class="fas fa-door-open"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="login.php" class="nav-link <?= set_active('login.php') ?>">
                    Se connecter <i class="fas fa-sign-in-alt"></i>
                </a>
            </li>
        <?php endif; ?>
        <?php if (isset($_SESSION['role'])): ?>
            <li class="nav-item submenu"><!-- Submenu link -->
                <a href="#" class="nav-link d-flex align-items-center <?= set_active() ?>">
                    <img src="<?= $_SESSION['image'] ?? 'assets/img/default.png' ?>" alt="" width="32" height="32"
                         class="rounded-circle me-2">
                    <strong><?= $_SESSION['firstname'] . ' ' . $_SESSION['name'] ?></strong>
                </a>
                <ul class="dropdown-menu"><!-- Dropdown menu -->
                    <li class="nav-item">
                        <a href="profile.php?id=<?= $_SESSION['id'] ?>" class="nav-link <?= set_active('profile.php') ?>">
                            <i class="fas fa-user-edit"></i>
                            Profil
                        </a>
                    </li>
                    <?php if (admin() || modo() || super()):?>
                        <li class="nav-item">
                            <a href="admin.php" class="nav-link <?= set_active('admin') ?>">
                                <i class="fas fa-tachometer-alt"></i>
                                Tableau de bord
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="user_add.php" class="nav-link <?= set_active('user_add.php') ?>">
                                <i class="fas fa-user-plus"></i>
                                Nouvel utilisateur
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="post.php" class="nav-link <?= set_active('post.php') ?>">
                                <i class="fas fa-plus"></i>
                                Nouveau post
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="category.php" class="nav-link <?= set_active('category.php') ?>">
                                <i class="fas fa-tags"></i>
                                Nouvelle categorie
                            </a>
                        </li>
                    <?php endif;?>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link">
                            <i class="fas fa-sign-out-alt"></i>
                            Se déconnecter
                        </a>
                    </li>
                </ul><!-- End dropdown menu -->
            </li><!-- End submenu link -->
        <?php endif;?>
    </ul>
</nav><!-- End Navigation -->
<a href="#" class="hamburger" id="hamburger"><i class="fas fa-bars"></i></a><!-- responsive menu icon-->
</div>
</div>
</header><!-- End header section -->
