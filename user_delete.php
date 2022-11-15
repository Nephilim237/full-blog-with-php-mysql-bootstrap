<?php

if (!super()) {
    $_SESSION['info'] = "Accès refusé";
    redirect_to('user_list.php');
}

if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
    redirect_to('user_list.php');
}
$id = (int)$_GET['id'];
$db->beginTransaction();
//Suppression des infos additives
$q = $db->prepare("DELETE FROM post WHERE user_id = :id");
$q->execute(['id' => $id]);
//Suppression des infos additives
$q = $db->prepare("DELETE FROM user_add WHERE user_id = :id");
$q->execute(['id' => $id]);
//Suppression de l'utilisateur
$q = $db->prepare("DELETE FROM user WHERE id = :id");
$q->execute(['id' => $id]);
$success = $db->commit();

if ($success) {
    $_SESSION['success'] = "Utilisateur #$id supprimé avec succès";
    redirect_to('user_list.php');
} else {
    $_SESSION['warning'] = "Erreur lors de la suppression";
    redirect_to('user_list.php');
}
