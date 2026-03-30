<?php
if(!isset($_SESSION['data']['nombre'])){
    header("Location: index.php?action=login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Home</title>
</head>
<body>
<center>
<h2>Bienvenido</h2>

<p><strong>Nombre:</strong> <?php echo $_SESSION['data']['nombre']; ?></p>
<p><strong>Email:</strong> <?php echo $_SESSION['data']['email']; ?></p>
<p><strong>Contraseña:</strong> <?php echo $_SESSION['data']['password']; ?></p>


<a href="index.php?action=closeSession">
    <button>Cerrar sesión</button>
</a>
</center>


</body>
</html>