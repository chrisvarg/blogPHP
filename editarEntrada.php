<?php include_once 'includes/redirection.php'; ?>
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


<!-- MAIN -->
<div class="main-principal">
    <h1>Editar Entrada</h1>
    <p>
        Edita tu entrada <?=$entradaActual['titulo'] ?>
    </p>
    <br />
    <form action="guardarEntrada.php?editar=<?=$entradaActual['id'] ?>" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" value="<?=$entradaActual['titulo'] ?>"/>
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'titulo') : ''; ?>

        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"><?=$entradaActual['descripcion'] ?></textarea>
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'descripcion') : ''; ?>
        
        <label for="categoria">Categoria:</label>
        <seLect name="categoria">
            <?php 
                $categorias = conseguirCategorias($db);
                if(empty($categorias) == false):
                while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?= $categoria['id']?>" <?=($categoria['id'] == $entradaActual['categoria_id'])  ? 'selected="selected"' : ' '?>>
                <?=$categoria['nombre']?>
            </option>
            <?php 
                endwhile;
                endif;
            ?>
        </seLect>
        <?php echo isset($_SESSION['erroresEntrada']) ? mostrarError($_SESSION['erroresEntrada'], 'categoria') : ''; ?>

        <input type="submit" value="Guardar">
    </form>
    <?php borrarErrores(); ?>

</div> <!-- FIN MAIN --->



<?php require_once 'includes/footer.php';?>