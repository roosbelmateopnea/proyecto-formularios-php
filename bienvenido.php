<?php
session_start();

if(!isset($_SESSION['data'])){
    echo "No hay información";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Bienvenido</title>
</head>

<body>
<center>
<h2>Bienvenido</h2>

<p><strong>Nombre:</strong> <?php echo $_SESSION['data']['nombre']; ?></p>
<p><strong>Email:</strong> <?php echo $_SESSION['data']['email']; ?></p>
<p><strong>Contraseña:</strong> <?php echo $_SESSION['data']['password']; ?></p>
</center>
</body>
</html>