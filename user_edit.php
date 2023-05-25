<?php
$title = "Gerer les roles";
require_once "partials/_header.php";

if (!logged_in()) redirect_to('login.php');

if (!super()) {
    $_SESSION['warning'] = 'Accès refusé.';
    redirect_to('user_list.php');
}

if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
    redirect_to('user_list.php');
}

$id = (int)$_GET['id'];
$user = get_single_data('user', $id);

$errors = [];
$roles = ['modo', 'admin', 'super', 'user'];
if (isset($_POST['change_role'])) {
    $submit = array_pop($_POST);

    if (!not_empty($_POST)) {
        $errors['global'] = "Tous les champs sont obligatoire";
        $_SESSION['warning'] = $errors['global'];
    }

    $role = sanitize($_POST['role']);

    if (!in_array($role, $roles)) {
        $errors['role'] = 'Role invalide.';
    }

    if (empty($errors)) {
        $q = $db->prepare("UPDATE user SET role = :role WHERE id = :id");
        $status = $q->execute([
            'role' => $role,
            'id' => $id
        ]);

        if ($status) {
            $_SESSION['success'] = "Rôle modifié avec succès.";
            redirect_to('user_list.php');
        } else {
            $_SESSION['warning'] = "Echec lors de l'enregistrement.";
        }
    } else {
        $_SESSION['warning'] = "remplissez convenablement le formulaire.";
    }

}





require_once "views/_user_edit.php";







require_once "partials/_footer.php";


