<?php
$title = "Supprimer une catégorie.";
require_once 'partials/_header.php';

if (!super()) {
    $_SESSION['warning'] = "Accès refusé.";
    redirect_to('category_list.php');
}

if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
    redirect_to('category_list.php');
}
$id = (int)$_GET['id'];

$errors = [];
$q = $db->prepare("SELECT * FROM category WHERE id = :id");
$q->execute(['id' => $id]);
$currentCategory = $q->fetch(PDO::FETCH_OBJ);
if (!$currentCategory) {
    $_SESSION['warning'] = "Erreur de processus.";
    redirect_to('category_list.php');
}

if (isset($_POST['edit_category'])) {
    $submit = array_pop($_POST);
    $category = $_POST['category'];

    if (!not_empty($category)) {
        $errors['category'] = 'Ce champ est obligatoire.';
    } else if (!length_validation($category, 3, 245)) {
        $errors['category'] = 'Doit être compris entre 3 et 245 caractères.';
    }
    $category = sanitize($category);
    if (empty($errors)) {
        $q = $db->prepare("UPDATE category SET title = :title WHERE id = :id");
        $success = $q->execute([
            'title' => $category,
            'id' => $id
        ]);
        if($success) {
            $_SESSION['success'] = "Catégorie mise à jour.";
            redirect_to('category_list.php');
        } else {
            $_SESSION['warning'] = "Echec lors de la mise à jour de la catégorie.";
        }
    } else {
        $_SESSION['warning'] = "remplissez convenablement le formulaire.";
    }
}
?>


<?php require_once 'views/_category_edit.php' ?>

<?php require_once 'partials/_footer.php'?>
