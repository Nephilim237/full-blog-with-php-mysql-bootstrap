<?php
$title = 'Blog';
require_once 'includes/db.php';
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';
require_once 'partials/_header.php';

$posts = posts_with_search_query(2)[0] ?? [];
$totalPages = posts_with_search_query(2)[1] ?? '1';
$allCategories = get_all_data('category');
$owner = get_owner();
$owner_social_links = get_social_links('user_id', $owner->id);
?>

<?php require_once 'views/_blog.php' ?>
    
<?php require_once 'partials/_footer.php'?>