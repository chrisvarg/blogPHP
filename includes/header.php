<?php require_once 'includes/conexion.php'?>
<?php require_once 'includes/helpers.php'; ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Mi primer blog con php"/>
        <meta name="robots" content="follow,index.php"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog de Videojuegos</title>
        <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- HEADER -->
        <header class="site-header">
            <!-- LOGO -->
            <div class="header-logo">
                <a href="index.php">
                    Blog de Videojuegos
                </a>
            </div>

            <!-- MENU -->
            <nav class="header-nav">
                <ul class="nav-menu">
                    <li class="nav-menu__items">
                        <a href="index.php">Inicio</a>
                    </li>
                    
                    <?php 
                        $categorias = conseguirCategorias($db);
                        if(empty($categorias) == false):
                            while ($categoria = mysqli_fetch_assoc($categorias)) :
                    ?>
                            <li class="nav-menu__items">
                                <a href="categoria.php?id=<?=$categoria['id'] ?>"><?=$categoria['nombre']?></a>
                            </li>
                    <?php 
                            endwhile; 
                        endif;
                    ?>
                    
                    <li class="nav-menu__items">
                        <a href="index.php">Sobre mi</a>
                    </li>
                    <li class="nav-menu__items">
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        <main class="site-main">