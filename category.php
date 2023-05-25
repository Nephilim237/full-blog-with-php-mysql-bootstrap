<?php

$title = 'Ajouter une catégorie.';
require_once 'partials/_header.php';

if (!super() && !admin()) {
    $_SESSION['warning'] = 'Accès refusé.';
    redirect_to('category_list.php');
}

$errors = [];

if (isset($_POST['add_category'])) {
    $submit = array_pop($_POST);
    $category = $_POST['category'];

    if (!not_empty($category)) {
        $errors['category'] = 'Ce champ est obligatoire.';
    } else if (!length_validation($category, 2, 245)) {
        $errors['category'] = 'Doit être compris entre 3 et 245 caractères.';
    }

    $categories = explode(',', $category);

    if (!not_empty($categories)) {
        $errors['category'] = 'Au moins l\'une de vos catégorie est vide';
    }

    foreach ($categories as $k => $category) {
        $categories[$k] = trim($category);
        if (trim($categories[$k]) === '') unset($categories[$k]);
    }
    $categories = sanitize($categories);
    if (empty($errors)) {
        $db->beginTransaction();
        foreach ($categories as $category) {
            $q = $db->prepare("INSERT INTO category (title, user_id) VALUES(:title, :user_id)");
            $q->execute([
                'title' => $category,
                'user_id' => $_SESSION['id']
            ]);
        }
        $total = $db->lastInsertId();
        if ($db->commit()) {
            $_SESSION['success'] = "Catégorie(s) insérée(s) avec succès.";
            header('location: category_list.php');
            die();
//            redirect_to('category_list.php');
        } else {
            $_SESSION['warning'] = "Echec lors de l'ajout d'une ou de plusieurs Catégories.";
        }
    } else {
        $_SESSION['warning'] = "remplissez convenablement le formulaire.";
    }
}


?>

<?php require_once 'views/_category.php' ?>

<?php require_once 'partials/_footer.php' ?>
