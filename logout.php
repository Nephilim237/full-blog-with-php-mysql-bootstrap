<?php
require_once 'includes/session_functions.php';
require_once 'includes/functions.php';

if (!logged_in()) redirect_to('login.php');
unset($_SESSION);
session_unset();
session_destroy();

redirect_to('login.php');
