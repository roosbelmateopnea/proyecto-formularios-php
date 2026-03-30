<?php

if(isset($_SESSION['errors'])){
    $errors = $_SESSION['errors'];
    unset($_SESSION['errors']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../css/style.css">

</head>
<body class="d-flex justify-content-center align-items-center vh-100">

<div class="card p-4 shadow" style="width: 400px;">

    <h2 class="text-center mb-3">Registrar Usuario</h2>

    <form action="index.php?action=validation" method="POST">

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control">
            <?php if(isset($errors['nombre'])) echo "<div class='text-danger'>".$errors['nombre']."</div>"; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="text" name="email" class="form-control">
            <?php if(isset($errors['email'])) echo "<div class='text-danger'>".$errors['email']."</div>"; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña:</label>
            <input type="password" name="password" class="form-control">
            <?php if(isset($errors['password'])) echo "<div class='text-danger'>".$errors['password']."</div>"; ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Confirmar Contraseña:</label>
            <input type="password" name="confirmar_password" class="form-control">
            <?php if(isset($errors['confirmar_password'])) echo "<div class='text-danger'>".$errors['confirmar_password']."</div>"; ?>
        </div>

        <button type="submit" class="btn btn-primary w-100">Enviar</button>

    </form>

</div>

</body>
</html>