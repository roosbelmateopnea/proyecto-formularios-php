<?php

require '../models/conexion.php';



class LoginController {

    public function index(){
        include 'login.php';
    }

    public function validation($data){

        global $conn; 

        $errors = [];

        $nombre = trim($data['nombre'] ?? '');
        $email = trim($data['email'] ?? '');
        $password = $data['password'] ?? '';
        $confirmar_password = $data['confirmar_password'] ?? '';


        if($nombre == ''){
            $errors['nombre'] = 'El nombre es requerido';
        } elseif(strlen($nombre) < 3){
            $errors['nombre'] = 'El nombre debe tener al menos 3 caracteres';
        }

        if($email == ''){
            $errors['email'] = 'El email es requerido';
        } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errors['email'] = 'El email no es válido';
        }

        if($password == ''){
            $errors['password'] = 'La contraseña es requerida';
        }

        if($confirmar_password == ''){
            $errors['confirmar_password'] = 'Debe confirmar la contraseña';
        } elseif($password != $confirmar_password){
            $errors['confirmar_password'] = 'Las contraseñas no coinciden';
        }


        if(count($errors) > 0){
            $_SESSION['errors'] = $errors;
            header('Location: index.php?action=login');
            exit;
        }

        $sql_check = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = $conn->query($sql_check);

        if($resultado->num_rows > 0){
            $_SESSION['errors']['email'] = "❌ Usuario ya registrado";
            header("Location: index.php?action=login");
            exit;
        }


        $sql = "INSERT INTO usuarios (nombre, email, password) 
                VALUES ('$nombre', '$email', '$password')";

        if($conn->query($sql) === TRUE){

            $_SESSION['data']['nombre'] = $nombre;
            $_SESSION['data']['email'] = $email;
            $_SESSION['data']['password'] = $password;

            header("Location: index.php?action=home");
            exit;

        } else {
            $_SESSION['errors']['general'] = "Error al guardar en BD";
            header("Location: index.php?action=login");
            exit;
        }
    }
}