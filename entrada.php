<?php require_once 'includes/conexion.php';?>
<?php require_once 'includes/helpers.php';?>
<?php
    // Array con la info de la base de datos
    $entradaActual = conseguirEntrada($db, $_GET['id']);

    if(isset($entradaActual['id']) == false){
        header('Location: index.php');
    }
?>

<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>

<!-- PRINCIPAL -->
<div class="main-principal">

    <h1><?=$entradaActual['titulo']?></h1>
    
    <a href="categoria.php?id=<?=$entradaActual['categoria_id']?>">
        <h2><?=$entradaActual['categoria']?></h2>
    </a>
    <h4><?=$entradaActual['fecha']?></h4>
    <p>
        <?=$entradaActual['descripcion']?>
    </p>

    <?php if(isset($_s)) ?>
</div><!-- FIN MAIN --->

<?php require_once 'includes/footer.php';?>