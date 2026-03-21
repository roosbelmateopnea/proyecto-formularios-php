<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Registro</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>

<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 400px;">
    <h2 class="text-center mb-3">Registro de Usuario</h2>


    <?php
    if(isset($_SESSION['errors'])){
        foreach($_SESSION['errors'] as $error){
            echo "<div class='alert alert-danger'>$error</div>";
        }
        unset($_SESSION['errors']);
    }
    ?>

    <form action="validaciones.php" method="POST">

        <div class="mb-3">
            <label>Nombre:</label>
            <input type="text" name="nombre" class="form-control">

        </div>

        <div class="mb-3">
            <label>Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label>Contraseña:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label>Confirmar:</label>
            <input type="password" name="confirm_password" class="form-control">
        </div>

        <button class="btn btn-primary w-100">Registrar</button>


    </form>

    <form action="eliminar.php" method="POST" class="mt-2">
        <button class="btn btn-danger w-100">Cerrar sesión</button>
    </form>
    
</div>


    



</body>
</html>