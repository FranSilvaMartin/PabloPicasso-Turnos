<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/credentials.css">
    <link rel="icon" href="../assets/logo.png">
    <script src="/js/app.js"></script>
    <script src="/js/modoOscuro.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>IES Pablo Picasso - Login</title>
</head>

<body>

    <nav class="menu">
        <ul class="menu_items">
            <span class="btn_modoOscuro">
				<i id="botonModoOscuro" class="fas fa-toggle-off" onclick="modoOscuro()"></i>
			</span>
        </ul>
        <span class="btn_menu">
			<i class="fa fa-bars"></i>
		</span>
    </nav>

    <!-- Logo de IES Pablo Picasso -->

    <section id="cuadroImagen" class="cuadroImagen">
        <img src="../assets/logoTexto.png" id="imagenLogoTexto" class="imagenLogoTexto" alt="Logo de IES Pablo Picasso">
    </section>
    
    <!-- Formulario de login -->

    <section id="cuadro" class="cuadro">
        <form class="cuadroFormulario" action="../database/iniciarSesion.php" method="post">
            <h1 id="titulo" class="titulo">Iniciar sesión</h1>
            <p>Usuario <input class="inputFormulario" type="text" placeholder="" name="username"></p>
            <p>Contraseña <input class="inputFormulario" type="password" placeholder="" name="password"></p>
            
            <input class="boton" type="button" value="Registrar cuenta" onclick="location.href = 'register.php';" />
            <input class="boton" type="submit" value="Iniciar sesión" name="login"/>
            
            <?php include('errores.php')?>
        </form>
    </section>

</body>

</html>