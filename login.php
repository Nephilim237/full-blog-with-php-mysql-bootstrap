<?php
$title = 'Se connecter';
require_once 'partials/_header.php';

if (logged_in()) redirect_to('profile.php?id=' . $_SESSION['id']);

$errors = [];
if (isset($_POST['login'])) {
    $submit = array_pop($_POST);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);

    if (!not_empty($_POST)) {
        $errors['global'] = "Remplissez convenablement le formulaire";
        $_SESSION['warning'] = $errors['global'];
    }

    if (!not_empty($username)) {
        $errors['username'] = 'Champ Obligatoire';
    }

    if (!not_empty($password)) {
        $errors['password'] = 'Champ Obligatoire';
    }

    if (empty($errors)) {
        $q = $db->prepare("SELECT u.id, name, firstname, email, password, created_at, role, active, user_id, born_at, gender, adress, phone, image, bio, user_id FROM user u LEFT JOIN user_add ua on u.id = ua.user_id WHERE email = :username AND active = '1'");
        $q->execute(['username' => $username]);

        $user = $q->fetch(PDO::FETCH_OBJ);
        if (!$user || !password_verify($password, $user->password)) {
            $_SESSION['warning'] = "Identifiant ou mot de passe invalide.";
        } else {
            foreach ($user as $index => $item) {
                $_SESSION[$index] = $item;
                if ($index === 'password') unset($_SESSION[$index]);
            }
            $_SESSION['success'] = "Bienvenue {$_SESSION['name']} {$_SESSION['firstname']}.";
            redirect_to('profile.php?id=' . $user->id);
        }
    }
}


?>

<?php require_once 'views/_login.php' ?>

<?php require_once 'partials/_footer.php' ?>