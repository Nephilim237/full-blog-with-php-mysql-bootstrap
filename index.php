<?php
$title = 'Accueil';
require_once 'partials/_header.php';

$latestPosts = get_latest_posts();

?>

<?php require_once 'views/_index.php' ?>

<?php require_once 'partials/_footer.php' ?>

