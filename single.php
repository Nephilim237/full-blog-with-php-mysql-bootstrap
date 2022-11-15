<?php
if (!isset($_GET['id'])) redirect_to('blog.php');
$id = (int)$_GET['id'];
$post = get_single_join_post($id);
$categories = get_categories_for_articles($post->id);

$title = $post->title;
require_once 'partials/_header.php'

?>

<?php require_once 'views/_single.php' ?>

<?php require_once 'partials/_footer.php' ?>