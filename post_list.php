<?php
require_once 'includes/db.php';
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';

$title = 'Liste des articles';

require_once 'partials/_header.php';

if (!logged_in()) redirect_to('login.php');

if (!super() && !admin() && !modo()) {
    $_SESSION['warning'] = 'Accès refusé.';
    redirect_to('profile.php?id=' . ds_info('id'));
}

$posts = posts_with_search_query(10)[0] ?? null;
$totalPages = posts_with_search_query(10)[1] ?? null;
?>

<?php require_once 'views/_post_list.php'?>

<?php require_once 'partials/_footer.php'; ?>
