<?php
$title = 'Liste des utilisateurs';
require_once 'partials/_header.php';

if (!logged_in()) redirect_to('login.php');

if (!super() && !admin() && !modo()) {
    $_SESSION['warning'] = 'Accès refusé.';
    redirect_to('profile.php?id=' . ds_info('id'));
}

$perPage = 10; //Nombre d'éléments à afficher par page

$query = "SELECT * FROM user ";
$queryCount = "SELECT COUNT(id) as count FROM user";
$params = [];

//Gestion des paramètre de la recherche
if (!empty($_GET['q'])) {
    $query .= " WHERE name LIKE :q OR firstname LIKE :q OR email LIKE :q OR role LIKE :q";
    $queryCount .= " WHERE name LIKE :q OR firstname LIKE :q OR email LIKE :q OR role LIKE :q";
    $params['q'] = "%{$_GET['q']}%";
}

//Gestion des paramètre de la pagination
$page = (int)($_GET['p'] ?? 1);
$offset = ($page - 1) * $perPage;

$query .= " LIMIT $perPage OFFSET $offset";

$q = $db->prepare($query);
$q->execute($params);
$users = $q->fetchAll(PDO::FETCH_OBJ);

$q = $db->prepare($queryCount);
$q->execute($params);
$totalUsers = (int)$q->fetch()['count']; //Nombre Total des éléments provenant de la bdd
$totalPages = ceil($totalUsers / $perPage); //Nombre total de page sur lesquelles tout les éléments seront afficher

?>

<?php require_once 'views/_user_list.php'?>

<?php require_once 'partials/_footer.php'; ?>