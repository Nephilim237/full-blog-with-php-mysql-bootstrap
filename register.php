<?php
$title = 'Inscription';
require_once 'partials/_header.php';

if (logged_in()) {
    redirect_to('profile.php?id=' . ds_info('id'));
}


$errors = [];

if (isset($_POST['register'])) {
    $submit = array_pop($_POST);

    if (!not_empty($_POST)) {
        $errors['global'] = "Tous les champs sont obligatoire";
        $_SESSION['warning'] = $errors['global'];
    }
    $name = sanitize($_POST['name']);
    $firstname = sanitize($_POST['firstname']);
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);

    if (!length_validation($name, 3, 60)) {
        $errors['name'] = 'Doit être compris entre 3 et 60 caractères.';

    }
    if (!length_validation($firstname, 3, 60)) {
        $errors['firstname'] = 'Doit être compris entre 3 et 60 caractères.';

    }
    if (!length_validation($email, 3, 60)) {
        $errors['email'] = 'Doit être compris entre 3 et 60 caractères.';

    }
    if (!length_validation($password, 8, 32)) {
        $errors['password'] = 'Doit être compris entre 8 et 32 caractères.';

    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "L'adresse email est invalide";
    }

    $usedEmails = [];
    $dbEmail = $db->query('SELECT email from user')->fetchAll(PDO::FETCH_OBJ);
    foreach ($dbEmail as $item) {
        $usedEmails[] = $item->email;
    }
    if (in_array($email, $usedEmails)) {
        $errors['email'] = "Cet email est déjà utilisé.";
    }


    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_ARGON2I);
        //1) Enregistrer l'utilisateur en base de données
        $db->beginTransaction();
        $q = $db->prepare("INSERT INTO user (name, firstname, email, password, role) VALUES (:name, :firstname, :email, :password, :role)");
        $q->execute([
            'name' => $name,
            'firstname' => $firstname,
            'email' => $email,
            'password' => $password,
            'role' => 'user'
        ]);
        $user_id = $db->lastInsertId();
        $q = $db->query("INSERT INTO user_add (user_id) VALUES ($user_id)");
        $status = $db->commit();

        if ($status) {
            //2) Envoyer un mail de confirmation
            $subject = WEBSITE_NAME . " - Activation de votre compte";
            $token = sha1($name . $email . $password);
            ob_start();
            require 'template/regActivation.tmpl.php';
            $content = ob_get_clean();
            $headers = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
            $successMail = mail($email, $subject, $content, $headers);
            if (!$successMail) {
                $_SESSION['warning'] = "Le mail a été rejeté pour la livraison.";
            }

            $_SESSION['success'] = "Un mail d'activation vous a été envoyé à l'adresse $email, vérifier votre boite pour activer votre compte.";
            redirect_to('user_list.php');
        } else {
            $_SESSION['warning'] = "Une erreur est survenue.";
        }
    } else {
        $_SESSION['warning'] = "remplissez convenablement le formulaire.";
    }
}


?>

<?php require_once 'views/_register.php' ?>

<?php require_once 'partials/_footer.php' ?>
