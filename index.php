<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="description" content="Mi primer blog con php"/>
        <meta name="robots" content="follow,index.php"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog de Videojuegos</title>
        <link rel="stylesheet" href="./assets/css/main.css" type="text/css">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
    </head>
    <body>
        <!-- HEADER -->
        <header class="site-header">
            <!-- LOGO -->
            <div class="header-logo">
                <a href="index.php">
                    Blog de Videojuegos
                </a>
            </div>
            <!-- MENU -->
            <nav class="header-nav">
                <ul class="nav-menu">
                    <li class="nav-menu__items">
                        <a href="index.php">Inicio</a>
                    </li>
                    <li class="nav-menu__items">
                        <a href="index.php">Categoria 1</a>
                    </li>
                    <li class="nav-menu__items">
                        <a href="index.php">Categoria 2</a>
                    </li>
                    <li class="nav-menu__items">
                        <a href="index.php">Categoria 3</a>
                    </li>
                    <li class="nav-menu__items">
                        <a href="index.php">Categoria 4</a>
                    </li>
                    <li class="nav-menu__items">
                        <a href="index.php">Sobre mi</a>
                    </li>
                    <li class="nav-menu__items">
                        <a href="index.php">Contacto</a>
                    </li>
                </ul>
            </nav>
            <div class="clearfix"></div>
        </header>
        <!-- MAIN -->
        <main class="site-main">
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

                        <input type="submit" value="Registrar"/>
                    </form>
                </div>
            </aside>
            <div class="main-principal">
                <h1>Ultimas entradas</h1>
                <article class="entreds">
                    <a href="">
                        <h2>Titulo de mi entrada</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius illo laboriosam ipsam nobis voluptatem velemolestiae officiis doloremque molestias distinctio! Aut, animi.
                            </p>
                    </a>
                </article>
                <article class="entreds">
                    <a href="">
                        <h2>Titulo de mi entrada</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius illo laboriosam ipsam nobis voluptatem velemolestiae officiis doloremque molestias distinctio! Aut, animi.
                            </p>
                    </a>
                </article>
                <article class="entreds">
                    <a href="">
                        <h2>Titulo de mi entrada</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius illo laboriosam ipsam nobis voluptatem velemolestiae officiis doloremque molestias distinctio! Aut, animi.
                            </p>
                    </a>
                </article>
                <article class="entreds">
                    <a href="">
                        <h2>Titulo de mi entrada</h2>
                            <p>
                                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Eius illo laboriosam ipsam nobis voluptatem velemolestiae officiis doloremque molestias distinctio! Aut, animi.
                            </p>
                    </a>
                </article>
                <div class="view-all">
                    <a href="">Ver todas las entradas</a>
                </div> <!-- FIN MAIN --->
            </div>
            <div class="clearfix"></div>
        </main>

        <!-- SIDERBAR -->
        <!-- FOOTER -->
        <footer class="site-footer">
            <p>Desarrollado por Christian Vargas &copy; 2018</p>
        </footer>
    </body>
</html>