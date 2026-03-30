<?php
session_start();

require '../controllers/loginController.php';

$loginController = new LoginController();

$action = $_GET['action'] ?? 'login';

if($action == 'login'){
    $loginController->index();

} elseif($action == 'validation'){
    $loginController->validation($_POST);

} elseif($action == 'home'){
    include 'home.php';

} elseif($action == 'closeSession'){
    session_destroy();
    header('Location: index.php?action=login');
    exit;
}
