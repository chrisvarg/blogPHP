
<aside class="main-sidebar">

    <!-- motrar el usuario logeado -->
    <?php if(isset($_SESSION['usuario'])): ?>
        <div id="usuario-logueado" class="sidebar-login block-aside">
            <h3>Bienvenido, <?= $_SESSION['usuario']['nombre']. ' '.$_SESSION['usuario']['apellidos']; ?></h3>
            <!-- botones -->
            <a href="crearEntradas.php" class="botton botton-green">Crear entradas</a>
            <a href="crearCategoria.php" class="botton">Crear categoria</a>
            <a href="cerrar.php" class="botton botton-orange">Mis datos</a>
            <a href="cerrar.php" class="botton botton-red">Cerrrar Sesión</a>
        </div>
    <?php endif; ?>

    
    <?php //IF NOS CONDICIONA SI LA USUARIO NO EXISTE MOSTRAR
    if(isset($_SESSION['usuario']) == false): ?>
    <div id="login" class="sidebar-login block-aside">
        <h3>Identificate</h3>

        <!-- MOSTRAR ERRORES DE LOGIN -->
        <?php if(isset($_SESSION['error_login'])): ?>
            <div class="alerta alerta-error">
                <?= $_SESSION['error_login']; ?>
            </div>
        <?php endif; ?>

        <form action="login.php" method="POST">
            <label for="email">Email</label>
            <input type="email" name="email"/>
                        
            <label for="password">Contraseña</label>
            <input type="password" name="password"/>

            <input type="submit" value="Entrar"/>
        </form>
    </div>

    <div id="register" class="sidebar-register block-aside">
        <h3>Registrate</h3>

        <!-- Mostrar errores  -->
        <?php if(isset($_SESSION['completado'])) : ?>
            <div class="alerta alerta-exito">
                <?=$_SESSION['completado']; ?>;
            </div>
        <?php elseif(isset($_SESSION['errores']['general'])): ?>
            <div class="alerta alerta-error">
                <?=$_SESSION['errores']['general']; ?>;
            </div>
        <?php endif; ?>

        <form action="register.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'nombre') : ''; ?>
            
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'apellidos') : ''; ?>


            <label for="email">Email</label>
            <input type="email" name="email"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'email') : ''; ?>

                        
            <label for="password">Contraseña</label>
            <input type="password" name="password"/>
            <?php echo isset($_SESSION['errores']) ? mostrarError($_SESSION['errores'], 'password') : ''; ?>


            <input type="submit" name="submit" value="Registrar"/>
        </form>
        <?php borrarErrores(); ?>
    </div>
    <?php endif; ?>
</aside>