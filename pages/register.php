<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/credentials.css">
    <link rel="icon" href="../assets/logo.png">
    <script src="/js/app.js"></script>
    <script src="/js/modoOscuro.js"></script>
    <title>IES Pablo Picasso - Registro</title>
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

    <!-- Formulario de registro -->

    <section id="cuadro" class="cuadro">
        <form class="cuadroFormulario" action="../database/creacionCuenta.php" method="post">
            <h1 id="titulo" class="titulo">Creacion de cuenta</h1>
            <p>Usuario <input class="inputFormulario" type="text" placeholder="" name="username"></p>
            <p>Contraseña <input class="inputFormulario" type="password" placeholder="" name="password"></p>

            <input class="boton" type="button" value="Volver al login" onclick="location.href = 'login.php';" />
            <input class="boton" type="submit" value="Registrar cuenta" name="register">
            <?php include('errores.php') ?>
        </form>
    </section>

</body>

</html>