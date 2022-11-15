<?php
require_once 'partials/_header.php';

if (!super()) {
    $_SESSION['info'] = "Accès refusé";
    redirect_to('post_list.php');
}

if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
    redirect_to('post_list.php');
}
$id = (int)$_GET['id'];

$db->beginTransaction();
//Suppression des articles liées aux articles
$q = $db->prepare("DELETE FROM post_category WHERE post_id = :id");
$q->execute(['id' => $id]);
//Suppression des commentaires liées aux articles
$q = $db->prepare("DELETE FROM comment WHERE post_id = :id");
$q->execute(['id' => $id]);
//Suppression de l'article
$q = $db->prepare("DELETE FROM post WHERE id = :id");
$q->execute(['id' => $id]);
$success = $db->commit();

if ($success) {
    $_SESSION['success'] = "Article #$id supprimée avec succès";
    redirect_to('post_list.php');
} else {
    $_SESSION['warning'] = "Erreur lors de la suppression de l'article #$id";
    redirect_to('post_list.php');
}

