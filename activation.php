<?php
require_once 'includes/db.php';
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';

if (empty($_GET['n']) || empty($_GET['e']) || empty($_GET['t'])) {
    redirect_to('register.php');;
} else {
    $name = sanitize($_GET['n']);
    $email = sanitize($_GET['e']);
    $token = sanitize($_GET['t']);
}
//Recupérer les informations de l'utilisateur nouvellement inscrit
$q = $db->prepare("SELECT * FROM user WHERE (name = :name AND email = :email) AND created_at >= DATE_SUB(NOW(), INTERVAL 3 DAY )");
$q->execute([
    'name' => $name,
    'email' => $email
]);
$user = $q->fetch(PDO::FETCH_OBJ);
if (!$user) {
    redirect_to('index.php');
}

$confirm_token = sha1($user->name.$user->email.$user->password);
if ($token === $confirm_token) {
    //On active le compte
    $q = $db->prepare("UPDATE user SET active = '1' WHERE email = :email");
    if ($q->execute(['email' => $email])) {
        $_SESSION['success'] = "Activation réussie. Connectez-vous à votre compte";
        redirect_to('login.php');
    } else {
        $_SESSION['warning'] = "Paramètres invalides.";
        redirect_to('register.php');
    }
} else {
    $_SESSION['warning'] = "Paramètres invalides.";
    redirect_to('register.php');
}