<?php
require_once 'includes/db.php';
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';

$title = 'Tableau de bord';

if (!modo() && !admin() && !super()) {
    $_SESSION['warning'] = 'Accès refusé.';
    redirect_to("profile.php?id=" . ds_info('id'));
}

require_once 'partials/_header.php';



require_once 'views/_admin.php';



require_once 'partials/_footer.php';
