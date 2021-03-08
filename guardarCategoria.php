<?php
if(isset($_POST)) {
    //Conexión con la base de datos
    require_once 'includes/conexion.php';

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($db, $_POST['nombre']) : false;
    
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

    //INSERTAR CATEGORIA EN LA TABLA DE CATEGORIAS DE LA BBDD
    if(count($errores) == 0){
        $sql = "INSERT INTO categorias VALUES (NULL, '$nombre');";
        $guardar = mysqli_query($db, $sql);
    }
}

header('Location: index.php');