<?php

const WEBSITE_NAME = 'Coding City Lite';
const WEBSITE_URL = 'http://localhost:8000';
const BASE_FILE_ROOT = 'uploads';
const DEFAULT_PROFILE_PIC = 'default.png';


$host = 'mysql:dbname=php';
$user = 'root';
$password = '';

try {
    $db = new PDO($host, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die($e->getMessage());
}


function count_data_table(string $table)
{
    global $db;
    return $db->query("SELECT COUNT(id) FROM $table")->fetch()["COUNT(id)"];
}

function count_active_user() {
    global $db;
    return $db->query("SELECT COUNT(id) FROM user WHERE active = '1'")->fetch()["COUNT(id)"];
}

function count_role_user(string $role) {
    global $db;
    $q =  $db->prepare("SELECT COUNT(id) FROM user WHERE active = '1' AND role = :role");
    $q->execute(['role'  => $role]);
    return $q->fetch()["COUNT(id)"];
}

function get_social_links($condition, $conditionValue): bool|array
{
    global $db;
    $q = $db->prepare("SELECT * FROM social_links WHERE $condition = :condition");
    $q->execute(['condition' => $conditionValue]);

    return $q->fetchAll(PDO::FETCH_OBJ);
}

function get_owner()
{
    global $db;
    return $db->query("SELECT u.id, u.name, u.firstname, u.role, u.email, ua.image, ua.bio FROM user u JOIN user_add ua WHERE u.owner = '1'")
        ->fetch(PDO::FETCH_OBJ);
}

function get_latest_posts($limit = 2): bool|array
{
    global $db;
    $q = $db->prepare("SELECT * FROM post ORDER BY created_at DESC LIMIT $limit");
    $q->execute();

    return $q->fetchAll(PDO::FETCH_OBJ);
}

function get_all_data(string $table, $order = 'id', $limit = 10): bool|array
{
    global $db;
    $q = $db->prepare("SELECT * FROM $table ORDER BY $order DESC LIMIT $limit");
    $q->execute();
    return $q->fetchAll(PDO::FETCH_OBJ);
}

/**
 * Récupère toutes les informations d'un seul élément dans une table en base de données.
 * Retour : Renvoie un objet contenant les informations demandées ou false
 * @param string $table
 * @param $id
 * @return mixed
 */
function get_single_data(string $table, $id): mixed
{
    global $db;
    $q = $db->prepare("SELECT * FROM $table WHERE id = :id");
    $q->execute(['id' => $id]);
    return $q->fetch(PDO::FETCH_OBJ);
}

function get_single_join_post($id)
{
    global $db;
    $q = $db->prepare("SELECT p.id, title, content, p.image post_image, p.created_at, u.id as user_id, u.name, u.firstname, u.role, ua.bio, ua.image user_image FROM post p LEFT JOIN user u ON p.user_id = u.id LEFT JOIN user_add ua on u.id = ua.user_id WHERE p.id = :id");
    $q->execute(['id' => $id]);
    return $q->fetch(PDO::FETCH_OBJ);
}

/**
 * Récupère les catégories associées à un article
 * Renvoie false si aucune correspondance n'est trouvée
 * @param int $id L'article pour lequel on souhaite recupérer les catégories
 * @return bool|array Renvoie un tableau d'objet contenant toutes les catégories d'un post
 */
function get_categories_for_articles(int $id): bool|array
{
    global $db;
    $q = $db->prepare("SELECT title FROM post_category pc JOIN category c ON pc.category_id = c.id WHERE pc.post_id = :id");
    $q->execute(['id' => $id]);

    return $q->fetchAll(PDO::FETCH_OBJ);
}

function get_comments_for_article(int $id): bool|array
{
    global $db;
    $q = $db->prepare("SELECT c.id, name, firstname, comment, c.image, c.created_at FROM comment c left JOIN post p on c.post_id = p.id WHERE  c.post_id = :id ORDER BY  c.created_at DESC");
    $q->execute(['id' => $id]);

    return $q->fetchAll(PDO::FETCH_OBJ);
}


/**
 * Permet de recupérer les articles dans la table artcile tout en récupérant les informations sur l'auteur de l'article
 * Prend également en compte le facteur recherche.
 * La recherche ne prend en compte que le nom, le prénom de l'auteur et aussi le titre de l'article.
 * @param int $perPage Nombre d'élements qu'on aimerait afficher sur une page
 *
 * @return array|null Renvoie un tableau contenant en première valeur le nombre d'artcile et en deuxième valeur
 *                    le nombre total des pages sur lesquelles nos articles s'étendront
 */
function posts_with_search_query(int $perPage = 2): ?array
{
    global $db;
    $query = "SELECT p.id, p.title, p.created_at, content, image, name, firstname
    FROM post p
        JOIN user u 
            on p.user_id = u.id
";
    $queryCount = "SELECT COUNT(p.id) as count 
    FROM post p 
        JOIN user u 
            ON p.user_id = u.id";
    $params = [];

    //Gestion des paramètres de la recherche
    if (!empty($_GET['q'])) {
        $query .= " WHERE p.title LIKE :q OR name LIKE :q OR firstname LIKE :q";
        $queryCount .= " WHERE p.title LIKE :q OR name LIKE :q OR firstname LIKE :q";
        $params['q'] = "%{$_GET['q']}%";
    }

    //Gestion des paramètres de la pagination
    $page = (int)($_GET['p'] ?? 1);
    $offset = ($page - 1) * $perPage;

    $query .= " ORDER BY created_at DESC LIMIT $perPage OFFSET $offset";

    $q = $db->prepare($query);
    $q->execute($params);
    $posts = $q->fetchAll(PDO::FETCH_OBJ);

    $q = $db->prepare($queryCount);
    $q->execute($params);
    $totalElements = (int)$q->fetch()['count']; //Nombre Total des éléments provenant de la bdd
    $totalPages = ceil($totalElements / $perPage); //Nombre total de page sur lesquelles tous les éléments seront afficher

    if (count($posts) > 0) return [$posts, $totalPages];

    return null;
}


