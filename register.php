<?php

if(isset($_POST)){

    //Conexión con la base de datos
    require_once 'includes/conexion.php';
    
    // Iniciar sesión
    if (isset($_SESSION) == false) {
        session_start();
    }

    /*
    ESTO
    isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    ES IGUAL A
    if(isset($_POST['apellidos'])){
        $apellidos = $_POST['apellidos'];
    }else {
        $apellidos = null;
    }*/
    
    // recoger los valores del formulario
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;
    $password = isset($_POST['password']) ? mysqli_real_escape_string($db, $_POST['password']) : false;

    // Array de errores
    $errores = array();

    //Validar los datos antes de guardarlos en la base de datos

    //validar campo nombre
    if((empty($nombre) == false) && (is_numeric($nombre) == false) && (preg_match("/[0-9]/", $nombre) == false)){
        $nombreValidado = True;
    }else {
        $nombreValidado = false;
        $errores['nombre'] = 'El nombre no es valido';
    }

    //validar campo apellidos
    if((empty($apellidos) == false) && (is_numeric($apellidos) == false) && (preg_match("/[0-9]/", $apellidos) == false)){
        $apellidosValidado = True;
    }else {
        $apellidosValidado = false;
        $errores['apellidos'] = 'Los apellidos no son validos';
    }

    //validar campo email
    if((empty($email) == false) && filter_var($email, FILTER_VALIDATE_EMAIL)){
        $emailValidado = True;
    }else {
        $emailValidado = false;
        $errores['email'] = 'El email no es valido';
    }

    //validar campo password
    if((empty($password) == false)){
        $passwordValidado = True;
    }else {
        $passwordValidado = false;
        $errores['password'] = 'La contraseña esta vacia';
    }

    $guardarUsuario = false;
    if(count($errores) == 0){
        $guardarUsuario = true;

        // Cifrar la contraseña
        $password_segura = password_hash($password, PASSWORD_BCRYPT, ['cost'=>4]);
        // var_dump($password_segura);
        // var_dump(password_verify('hola3', $password_segura)); // comprueba que la password coincida con el hash
        // die();

        //INSERTAR USUARIOS EN LA TABLA DE USUSARIOS DE LA BBDD

        $sql = "INSERT INTO usuarios VALUES(NULL, '$nombre', '$apellidos', '$email', '$password_segura', CURDATE());";

        $guardar = mysqli_query($db, $sql);

        // var_dump(mysqli_error($db));
        // die();

        if($guardar){
            $_SESSION['completado'] = 'El registro se ha completado con éxito';
        }else {
            $_SESSION['errores'] ['general'] = "Fallo al guardar el usuario!!" ;
        }

    }else {
        $_SESSION['errores'] = $errores;
    }
}

header('Location: index.php');
