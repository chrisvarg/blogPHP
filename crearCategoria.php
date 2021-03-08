<?php include_once 'includes/redirection.php'; ?>
<?php include_once 'includes/header.php'; ?>
<?php include_once 'includes/sidebar.php'; ?>


<div class="main-principal">
    <h1>Crear Categorias</h1>
    <p>
        Añade nuevas categorias al blog para que los usuarios puedan usarlas al crear sus entradas.
    </p>
    <br />
    <form action="guardarCategoria.php" method="POST">
        <label for="nombre">Nombre de la categoria:</label>
        <input type="text" name="nombre" />

        <input type="submit" values="Guardar">
    </form>

</div> <!-- FIN MAIN --->

<?php require_once 'includes/footer.php'; ?>