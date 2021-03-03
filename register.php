<?php
if(isset($_POST)){
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
    $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
    $apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;

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
        $apeliidosValidado = True;
    }else {
        $apeliidosValidado = false;
        $errores['apellidos'] = 'Los apellidos no es valido';
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
        $passwordlidado = false;
        $errores['password'] = 'La contraseña esta vacia';
    }

    $guardarUsuario = false;
    if(count($errores) == 0){
        $guardarUsuario = true;
        //INSERTAR USUARIOS EN LA TABLA DE USUSARIOS DE LA BBDD
    }
    
}
