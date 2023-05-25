<?php
require_once 'includes/session_functions.php';
$title = ds_info('name') .' '. ds_info('firstname');
require_once 'partials/_header.php';

if (!isset($_GET['id']) || (int)$_GET['id'] <= 0 || (int)$_GET['id'] !== $_SESSION['id']) {
    redirect_to('login.php');
}
if (!logged_in()) redirect_to('login.php');

$q = $db->prepare("SELECT u.id, name, firstname, email, password, created_at, role, active, born_at, gender, adress, phone, image, bio, user_id  FROM user u LEFT JOIN user_add ua ON ua.user_id = u.id WHERE u.id = :id");
$q->execute(['id' => $_SESSION['id']]);
$userInfo = $q->fetch(PDO::FETCH_OBJ);

$errors = [];
$profileForm = false;
$passwordForm = false;


//MISE A JOUR DU PROFIL
if (isset($_POST['update_user'])) {
    $submitButton = array_pop($_POST);
    $_POST = sanitize($_POST);
    extract($_POST);
    $bornTimestamp = strtotime($born_at);
    if ($bornTimestamp != '') {
//        $errors['born_at'] = 'Date invalide';
        $formatDate =  date('Y-m-d',  $bornTimestamp);
    }else {
        $formatDate = null;
    }
    if (!empty($_FILES['image']['name'])) {
        if ($_FILES['image']['error'] === 0) {
            extract($_FILES);
            $tmpImg = $image['tmp_name'] ?? null;
            $nameImg = $image['name'] ?? null;
            $typeImg = $image['type'] ?? null;
            if (!in_array($typeImg, ['image/jpeg', 'image/png', 'image/jpg'])) {
                $errors['image'] = 'Image invalide';
            }
        } else {
            $errors['image'] = 'image invalide';
        }
    }
    if (!file_exists(BASE_FILE_ROOT .'/profile')) {
        mkdir( BASE_FILE_ROOT .'/profile', 0777, true);
    }
    $profileImageFolder = BASE_FILE_ROOT .'/profile';
    $pathImg = !isset($nameImg) ? $userInfo->image : $profileImageFolder . '/' . $nameImg;


    if (empty($errors)) {
        $q = $db->prepare("UPDATE user u RIGHT JOIN user_add ua ON u.id = ua.user_id SET ua.born_at = :born_at, ua.gender = :gender, ua.adress = :adress, ua.phone = :phone, ua.image = :image, ua.bio = :bio, u.email = :email WHERE u.id = :id");
        $success = $q->execute([
            'born_at'       =>      $formatDate,
            'gender'        =>      $gender,
            'adress'        =>      $adress,
            'phone'         =>      $phone,
            'image'         =>      $pathImg,
            'bio'           =>      $bio,
            'email'         =>      $email,
            'id'            =>      $_SESSION['id']
        ]);

        if ($success) {
            if(move_uploaded_file($tmpImg, $pathImg)) $_SESSION['success'] = 'Image mise à jour';
            $q = $db->prepare("SELECT u.id, name, firstname, email, created_at, role, active, born_at, gender, adress, phone, image, bio, user_id  FROM user u LEFT JOIN user_add ua ON ua.user_id = u.id WHERE u.id = :id");
            $q->execute(['id' => $_SESSION['id']]);
            $userInfo = $q->fetch(PDO::FETCH_OBJ);
            foreach ($userInfo as $index => $info) {
                $_SESSION[$index] = '';
                $_SESSION[$index] = $info;
            }
            $_SESSION['info'] = 'Profil mis à jour avec succès.';
            redirect_to('profile.php?id=' . ds_info('id'));
        } else {
            $_SESSION['warning'] = 'Echec lors de la mise à jour';
        }
    }
    $profileForm = true;
}


//MISE A JOUR DU MOT DE PASSE
if (isset($_POST['change_password'])) {
    $submitButton = array_pop($_POST);
    $_POST = sanitize($_POST);
    extract($_POST);
    if (empty($actual_password)) $errors['actual_password'] = 'Champ Obligatoire';
    if (empty($new_password)) {
        $errors['new_password'] = 'Champ Obligatoire';
    } else if (!length_validation($new_password, 8, 20)) {
        $errors['new_password'] = 'Compris entre 8 et 20 caractères';
    }
    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'Champ Obligatoire';
    } else if (!length_validation($confirm_password, 8, 20)) {
        $errors['confirm_password'] = 'Compris entre 8 et 20 caractères';
    }
    if (!password_verify($actual_password, $userInfo->password)) $errors['actual_password'] = 'Mot de passe incorrect';

    if (empty($errors)) {
        $password = password_hash($new_password, PASSWORD_ARGON2I);
        $q = $db->prepare("UPDATE user SET password = :password WHERE id = :id");
        $success = $q->execute([
            'password' => $password,
            'id' => $_SESSION['id']
        ]);
        if ($success) {
            $_SESSION['info'] = 'Mot de passe mis à jour avec succès';
            redirect_to('profile.php?id=' . ds_info('id'));
        }else {
            $_SESSION['warning'] = 'Echec lors de la mise à jour du mot de passe';
        }
    }

    $passwordForm = true;
}
?>


<?php require_once 'views/_profile.php'; ?>


<?php require_once 'partials/_footer.php';
