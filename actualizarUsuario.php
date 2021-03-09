<?php

if(isset($_POST)){

    //Conexión con la base de datos
    require_once 'includes/conexion.php';
    

    /*
    ESTO
    isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
    ES IGUAL A
    if(isset($_POST['apellidos'])){
        $apellidos = $_POST['apellidos'];
    }else {
        $apellidos = null;
    }*/
    
    // recoger los valores del formulario de actualización
    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($db, $_POST['apellidos']) : false;
    $email = isset($_POST['email']) ? mysqli_real_escape_string($db, trim($_POST['email'])) : false;

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

    $guardarUsuario = false;

    if(count($errores) == 0){
        $usuario = $_SESSION['usuario'];
        $guardarUsuario = true;
        

        // COMPROBAR SI EL EMAIL YA EXISTE
        $sql = "SELECT id, email FROM usuarios WHERE email  = '$email'";
        $issetEmail = mysqli_query($db, $sql);
        $issetUsuario = mysqli_fetch_assoc($issetEmail);

        if($issetUsuario['id'] == $usuario['id'] || empty($issetUsuario)){
            //ACTUALIZAR EL USUARIO EN LA TABLA DE USUSARIOS DE LA BBDD
            $sql = "UPDATE usuarios SET ".
                "nombre = '$nombre', ".
                "apellidos = '$apellidos', ".
                "email = '$email' ".
                "WHERE id = ". $usuario['id'];

            $guardar = mysqli_query($db, $sql);

            if($guardar){
                $_SESSION['usuario']['nombre'] = $nombre;
                $_SESSION['usuario']['apellidos'] = $apellidos;
                $_SESSION['usuario']['email'] = $email;
                
                $_SESSION['completado'] = 'Tus datos se han actualizado con éxito';
            }else {
                
                $_SESSION['errores']['general'] = 'Fallo al guardar el actualizar de tus datos!!' ;
            }
        }else {
            $_SESSION['errores']['general'] = "El usuario ya existe!!";
        }

    }else {
        $_SESSION['errores'] = $errores;
    }
}
header('Location: misDatos.php');
