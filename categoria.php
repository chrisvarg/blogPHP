<?php require_once 'includes/conexion.php';?>
<?php require_once 'includes/helpers.php';?>
<?php
    $categoriaActual = conseguirCategoria($db, $_GET['id']);
    if(isset($categoriaActual['id']) == false){
        header('Location: index.php');
    }
?>

<?php require_once 'includes/header.php';?>
<?php require_once 'includes/sidebar.php';?>

<!-- PRINCIPAL -->
<div class="main-principal">

    <h1>Entradas de <?=$categoriaActual['nombre']?></h1>
    
    <?php
        $entradas = conseguirEntradas($db, null, $_GET['id']);

        if(empty($entradas) == false && mysqli_num_rows($entradas) >= 1):
            while ($entrada = mysqli_fetch_assoc($entradas)):
    ?>    
                <article class="entreds">
                    <a href="">
                        <h2><?=$entrada['titulo']?></h2>
                        <span class="fecha"><?=$entrada['categoria'] .' | '. $entrada['fecha']?></span>
                        <p>
                            <?= substr($entrada['descripcion'], 0, 180)."..."?>
                        </p>
                    </a>
                </article>
    <?php
            endwhile;
        else:
    ?>
        <div class="alerta">No hay entradas en esta categoria</div>
    <?php endif ?>    
</div><!-- FIN MAIN --->

<?php require_once 'includes/footer.php';?>