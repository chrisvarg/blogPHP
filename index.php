<?php require_once 'includes/header.php';?>
        
        <!-- MAIN -->
<!-- SIDERBAR -->
<?php require_once 'includes/sidebar.php';?>

<!-- PRINCIPAL -->
<div class="main-principal">
    <h1>Ultimas entradas</h1>
    
    <?php
        $entradas = conseguirUltimasEntradas($db);
        if(empty($entradas) == false):
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
        endif;
    ?>
    

    <div class="view-all">
        <a href="">Ver todas las entradas</a>
    </div> <!-- FIN MAIN --->
</div> <!-- END FOOTER -->

<?php require_once 'includes/footer.php';?>