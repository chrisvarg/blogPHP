<aside class="main-sidebar">
    <div id="login" class="sidebar-login block-aside">
        <h3>Identificate</h3>
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
        <form action="register.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre"/>

            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos"/>

            <label for="email">Email</label>
            <input type="email" name="email"/>
                        
            <label for="password">Contraseña</label>
            <input type="password" name="password"/>

            <input type="submit" name="submit" value="Registrar"/>
        </form>
    </div>
</aside>