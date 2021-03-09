<?php require_once 'includes/header.php';?>
        
        <!-- MAIN -->
<!-- SIDERBAR -->
<?php require_once 'includes/sidebar.php';?>

<!-- PRINCIPAL -->
<div class="main-principal">
    <h1>Todas las entradas</h1>
    
    <?php
        $entradas = conseguirEntradas($db);
        if(empty($entradas) == false):
            while ($entrada = mysqli_fetch_assoc($entradas)):
    ?>    
                <article class="entreds">
                    <a href="entrada.php?id=<?=$entrada['id']?>">
                        <h2><?=$entrada['titulo']?></h2>
                        <span class="fecha"><?=$entrada['categoria'] .' | '. $entrada['fecha']?></span>
                        <p>
                            <?= substr($entrada['descripcion'], 0, 180)."..."?>
                        </p>
                    </a>
                </article>
    <?php
            endwhile;
        endif;
    ?>
    
</div><!-- FIN MAIN --->

<?php require_once 'includes/footer.php';?>