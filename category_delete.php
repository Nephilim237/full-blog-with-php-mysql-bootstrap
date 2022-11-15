<?php
require_once 'includes/db.php';
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';

if (!super()) {
    $_SESSION['warning'] = "Accès refusé";
    redirect_to('category_list.php');
}

if (!isset($_GET['id']) || (int)$_GET['id'] <= 0) {
    redirect_to('category_list.php');
}
$id = (int)$_GET['id'];

$db->beginTransaction();
//Suppression des catégories liées aux articles
$q = $db->prepare("DELETE FROM post_category WHERE category_id = :id");
$q->execute(['id' => $id]);
//Suppression de la catégorie
$q = $db->prepare("DELETE FROM category WHERE id = :id");
$q->execute(['id' => $id]);
$success = $db->commit();

if ($success) {
    $_SESSION['success'] = "Catégorie #$id supprimée avec succès";
} else {
    $_SESSION['warning'] = "Erreur lors de la suppression de la catégorie";
}
redirect_to('category_list.php');
