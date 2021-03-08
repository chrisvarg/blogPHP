<?php include_once 'includes/redirection.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/sidebar.php'; ?>


<div class="main-principal">
    <h1>Crear Entradas</h1>
    <p>
        Añade nuevas entradas al blog para que los usuarios puedan leerlas y disfrutar de nuestro contenido.
    </p>
    <br />
    <form action="guardarEntrada.php" method="POST">
        <label for="titulo">Titulo:</label>
        <input type="text" name="titulo" />
        
        <label for="descripcion">Descripción:</label>
        <textarea name="descripcion"></textarea>
        
        <label for="categoria">Categoria:</label>
        <seLect name="categoria">
            <?php 
                $categorias = conseguirCategorias($db);
                if(empty($categorias) == false):
                while ($categoria = mysqli_fetch_assoc($categorias)):
            ?>
            <option value="<?= $categoria['id']?>" >
                <?= $categoria['nombre']?>
            </option>
            <?php 
                endwhile;
                endif;
            ?>
        </seLect>

        <input type="submit" values="Guardar">
    </form>

</div> <!-- FIN MAIN --->

<?php require_once 'includes/footer.php'; ?>
