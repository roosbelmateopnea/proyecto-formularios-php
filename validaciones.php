<?php
session_start();

$_SESSION['errors'] = [];
$_SESSION['data'] = [];

$nombre = trim($_POST['nombre'] ?? '');
$email = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');
$confirm = trim($_POST['confirm_password'] ?? '');


if(empty($nombre) || empty($email) || empty($password) || empty($confirm)){
    $_SESSION['errors'][] = "❌ Todos los campos son obligatorios";
}
elseif(strlen($nombre) < 5){
    $_SESSION['errors'][] = "❌ El nombre debe tener al menos 5 caracteres";
}
elseif(!preg_match("/^[a-zA-Z ]+$/", $nombre)){
    $_SESSION['errors'][] = "❌ El nombre solo debe contener letras";
}
elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    $_SESSION['errors'][] = "❌ Email no válido";
}
elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$/", $password)){
    $_SESSION['errors'][] = "❌ Contraseña insegura";
}
elseif($password != $confirm){
    $_SESSION['errors'][] = "❌ Las contraseñas no coinciden";
}

if(count($_SESSION['errors']) > 0){
    header("Location: index.php");
    exit;
}


$_SESSION['data']['nombre'] = $nombre;
$_SESSION['data']['email'] = $email;
$_SESSION['data']['password'] = $password;


header("Location: bienvenido.php");
exit;