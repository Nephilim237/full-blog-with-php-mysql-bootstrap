<?php
$title = "Mettre à jour ...";
require_once 'partials/_header.php';

if (!super() && !admin() && !modo()) {
    $_SESSION['warning'] = "Accès refusé.";
    redirect_to('post_list.php');
}

if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
    redirect_to('post_list.php');
}

$id = (int)$_GET['id'];
$post = get_single_data('post', $id);
$categoriesForThisPost = get_categories_for_articles($id);
$categories = get_all_data('category', 'id', 100);
$assocCategoriesIdName = [];
foreach ($categories as $category) {
    $assocCategoriesIdName[$category->id] = html_entity_decode($category->title);
}

$errors = [];
if (isset($_POST['update'])) {
    $submitButton = array_pop($_POST);
    $_POST = sanitize($_POST);
    $_FILES = sanitize($_FILES);
    $title = $_POST['title'];
    $category = $_POST['category'] ?? [];
    $content = $_POST['content'];

    if (!not_empty($title)) {
        $errors['title'] = 'Champ obligatoire';
    } else if (!length_validation($title, 3, 250)) {
        $errors['title'] = 'Compris entre 3 et 250 caractères';
    }
    if (empty($category)) {
        $errors['category'] = 'Champ obligatoire';

    }
    foreach ($category as $uniqueCategory) {
        if (!in_array($uniqueCategory, $assocCategoriesIdName)) {
            $errors['category'] = 'Au moins l\'une des catégorie est erronée';
        }
    }
    if (!not_empty($content)) {
        $errors['content'] = 'Champ obligatoire';
    }
    if (not_empty($_FILES['image']['name'])) {
        if ($_FILES['image']['error'] === 0) {
            extract($_FILES);
            $tmpImg = $image['tmp_name'] ?? null;
            $nameImg = $image['name'] ?? null;
            $typeImg = $image['type'] ?? null;
            if (!in_array($typeImg, ['image/jpeg', 'image/png', 'image/jpg'])) {
                $errors['image'] = 'Image invalide';
            }
        } else {
            $errors['image'] = 'image invalide';
        }
    }
    $profileImageFolder = BASE_FILE_ROOT .'/post';
    $pathImg = !isset($nameImg) ? $post->image : $profileImageFolder . '/' . $nameImg;

    if (empty($errors)) {
        $db->beginTransaction();
        $q = $db->prepare("UPDATE post SET title = :title, content = :content, image = :image, user_id = :user_id WHERE id = :id");
        $q->execute([
            'title'          =>      $title,
            'content'        =>      $content,
            'image'          =>      $pathImg,
            'user_id'        =>      $_SESSION['id'],
            'id'             =>      $post->id
        ]);
        $qq = $db->prepare("DELETE FROM post_category WHERE post_id = :post_id");
        $qq->execute(['post_id' => $post->id]);
        foreach ($category as $index => $item) {
            if (in_array($item, $assocCategoriesIdName)) {
//            array_keys($categories, $item, true);
                $key = array_search($item, $assocCategoriesIdName);
            }
            $q = $db->prepare("INSERT INTO post_category (post_id, category_id) VALUES (:post_id, :category_id)");
            $q->execute([
                'post_id'           =>      $post->id,
                'category_id'       =>      $key
            ]);
        }
        $success = $db->commit();

        if ($success) {
            if (not_empty($_FILES['image']['name'])){
                if(!move_uploaded_file($tmpImg, $pathImg)) $_SESSION['success'] = 'Echec lors du chargement de l\'image';
            }

            $_SESSION['info'] = 'Article mise à jour avec succès';
            redirect_to('post_list.php');
        } else {
            $_SESSION['warning'] = 'Echec lors de la mise à jour';
        }
    }
}

require_once 'views/_post_edit.php';


require_once 'partials/_footer.php';
