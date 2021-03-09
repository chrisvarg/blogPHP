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
    <h4><?=$entradaActual['fecha']?> | <?=$entradaActual['usuario_id']?></h4>
    <p>
        <?=$entradaActual['descripcion']?>
    </p>

    <?php if(isset($_SESSION['usuario']) && $_SESSION['usuario']['id'] == $entradaActual['usuario_id']): ?>
        <br />
        <a href="editarEntrada.php" class="botton botton-green">Editar entrada</a>
        <a href="borrarEntrada.php" class="botton">Eliminar entrada</a>
    <?php endif; ?>
</div><!-- FIN MAIN --->

<?php require_once 'includes/footer.php';?>