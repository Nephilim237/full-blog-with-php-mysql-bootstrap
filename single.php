<?php
require_once 'includes/db.php';
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';

if (!isset($_GET['id'])) redirect_to('blog.php');
$id = (int)$_GET['id'];
$post = get_single_join_post($id);
$userSocialLinks = get_social_links('user_id', $post->user_id);

if (!$post)
    redirect_to('blog.php');

$title = $post->title;
require_once 'partials/_header.php'; //Importation du header

$categories = get_categories_for_articles($post->id);
$comments = get_comments_for_article($id);
$posts = get_all_data('post', 'created_at');

$postsId = [];
foreach ($posts as $index => $postID) {
    $postsId[] = $postID->id;
}
$key = array_search($id, $postsId);
$prev = $postsId[$key - 1] ?? 0;
$next = $postsId[$key + 1] ?? 0;
$prevPost = get_single_join_post($prev);
$nextPost = get_single_join_post($next);

$errors = [];
if (isset($_POST['add_comment'])) {
    $submit = array_pop($_POST);
    $_POST = sanitize($_POST);
    extract($_POST);
    if (!not_empty($message)) $errors['message'] = "Champ Obligatoire.";

    $image = ds_info('image') ?: 'assets/img/default.png';

    if (empty($errors)) {
        $q = $db->prepare("INSERT INTO comment (name, firstname, email, comment, image, created_at, post_id) VALUES(?, ? ,?, ?, ?, NOW(), ?) ");
        $state = $q->execute([$name, $firstname, $email, $message, $image, $id]);
        if ($state) {
            $_SESSION['success'] = "Merci pour votre avis.";
            redirect_to("single.php?id=" .$id . '#comment-area');
        }
    }
}

?>

<?php require_once 'views/_single.php' ?>

<?php require_once 'partials/_footer.php' ?>