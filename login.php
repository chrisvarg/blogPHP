<?php
// INICIAR LA SESSIÓN Y LA CONEXIÓN A LA BASE DE DATOS
require_once 'includes/conexion.php';

// RECOGER LOS DATOS DEL FORMULARIO
if(isseT($_POST)){

    // Borrar error antiguo
    if(isset($_SESSION['error_login'])){
        session_unset($_SESSION['error_login']);
    }

    // RECOJO DATOS DEL FORMULARIO
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // CONSULTA PARA COMPROBAR LAS CREDENCIALES DEL USUARIO
    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if($login && mysqli_num_rows($login) == 1){
        
        $usuario = mysqli_fetch_assoc($login);
        
        // COMPROBAR LA CONTRASEÑA / cifrar
        $verify = password_verify($password, $usuario['password']);
        if($verify) {
            // UTILIZAR UN SESSION PARA GUARDAR LOS DATOS DEL USUARIO LOGEADO
            $_SESSION['usuario'] = $usuario;

        }else {
            // SI ALGO FALLA ENVIAR UNA SESION CON EL FALLO
            $_SESSION['error_login'] = "Login incorrecto!!";
        }
    }else {
        // MENSAJE DE ERROR
        $_SESSION['error_login'] = "Login incorrecto!!";
    }
}

// REDIRIGIR AL INDEX.PHP
header("Location: index.php");
