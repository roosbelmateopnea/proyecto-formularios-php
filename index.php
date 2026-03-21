<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body class="bg-dark d-flex justify-content-center align-items-center vh-100">

<?php

$mensajeError = "";
$mensajeExito = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST['nombre']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm = trim($_POST['confirm_password']);


    if(empty($nombre) || empty($email) || empty($password) || empty($confirm)){
        $mensajeError = "❌ Todos los campos son obligatorios";
    }
    elseif(!preg_match("/^[a-zA-Z ]+$/", $nombre)){
        $mensajeError = "❌ El nombre solo debe contener letras";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $mensajeError = "❌ Email no válido";
    }
    elseif(!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*[\W]).{8,}$/", $password)){
        $mensajeError = "❌ La contraseña debe tener 8 caracteres, mayúscula, minúscula y símbolo";
    }
    elseif($password != $confirm){
        $mensajeError = "❌ Las contraseñas no coinciden";
    }
    elseif(strlen($nombre) < 5){
    $mensajeError = "❌ El nombre debe tener al menos 5 caracteres";
    }
    else{
        $mensajeExito = "✅ Usuario registrado correctamente";

        echo "<pre>";
        print_r($_POST);
        echo "</pre>";
    }
}


?>

<div class="card p-4 shadow" style="width: 400px;">
    <h2 class="text-center mb-3">Registro de Usuario</h2>
    <div id="alertaJS"></div>
    <?php if($mensajeError != ""){ ?>
        <div class="alert alert-danger">
            <?php echo $mensajeError; ?>
        </div>
    <?php } ?>

    <?php if($mensajeExito != ""){ ?>
        <div class="alert alert-success">
            <?php echo $mensajeExito; ?>
        </div>
    <?php } ?>

    <form action="" method="POST" onsubmit="return validarNombre()">

        <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" name="nombre" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Email:</label>
            <input type="email" name="email" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña:</label>
            <input type="password" name="password" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Confirmar Contraseña:</label>
            <input type="password" name="confirm_password" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary w-100">Registrar</button>

    </form>
</div>

<script>
function validarNombre() {
    let nombre = document.getElementsByName("nombre")[0].value.trim();
    let alerta = document.getElementById("alertaJS");

 
    alerta.innerHTML = "";

    if (nombre.length < 5) {
        alerta.innerHTML = `
            <div class="alert alert-danger">
                ❌ El nombre debe tener al menos 5 caracteres
            </div>
        `;
        return false;
    }

    if (!/^[a-zA-Z ]+$/.test(nombre)) {
        alerta.innerHTML = `
            <div class="alert alert-danger">
                ❌ El nombre solo debe contener letras
            </div>
        `;
        return false;
    }

    return true;
}

</script>

</body>
</html>