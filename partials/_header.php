<?php
require_once 'includes/db.php';
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';

function lightHeader(): string
{
    if (stripos($_SERVER['REQUEST_URI'], '/index') === 0
        || stripos($_SERVER['REQUEST_URI'], '/single') === 0
        || $_SERVER['REQUEST_URI'] === '/contact.php'
        || $_SERVER['REQUEST_URI'] === '/') {

        return '';
    }

    return 'light-header';
}

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

    <link rel="icon" href="assets/imgs/cc.ico">


    <title><?= $title ?? WEBSITE_NAME ?> | Coding City</title>

</head>
<body>
    <!-- header section -->
    <header class="header <?= lightHeader() ?>" id="header">
        <div class="container">
            <div class="header-container">
                <!-- Logo -->
                <a href="#" class="logo"><img src="assets/imgs/cc.png" alt="Le logo" class="img"></a>
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

                        <?php if (!logged_in()): ?>
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

                        <?php if (logged_in()): ?>
                        <li class="nav-item submenu"><!-- Submenu link -->
                            <a href="#" class="nav-link d-flex align-items-center <?= set_active() ?>" >
                                <strong><?= ds_info('firstname') . ' ' . ds_info('name') ?></strong>
                                <img src="<?= ds_info('image') ?? 'assets/imgs/default.png' ?>" alt="" width="32" height="32" class="rounded-circle ms-2">
                            </a>

                            <ul class="dropdown-menu"><!-- Dropdown menu -->
                                <li class="nav-item">
                                    <a href="index.php" class="nav-link <?= set_active('index.php') ?>">
                                        <i class="fas fa-home"></i>
                                        Accueil
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="profile.php?id=<?= $_SESSION['id'] ?>" class="nav-link <?= set_active('profile.php') ?>">
                                        <i class="fas fa-user-edit"></i>
                                        Profil
                                    </a>
                                </li>
                                <?php if (admin() || modo() || super()): ?>
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
                                <?php endif ?>
                                <li class="nav-item">
                                    <a href="logout.php" class="nav-link">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Se déconnecter
                                    </a>
                                </li>
                            </ul><!-- End dropdown menu -->
                        </li><!-- End submenu link -->
                        <?php endif; ?>
                    </ul>
                </nav><!-- End Navigation -->
                <a href="#" class="hamburger" id="hamburger"><i class="fas fa-bars"></i></a><!-- responsive menu icon-->
            </div>
        </div>
    </header><!-- End header section -->