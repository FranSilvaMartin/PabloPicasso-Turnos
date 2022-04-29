<?php

// Conexión a la base de datos
include('database/db.php');
// Obtiener el nombre de usuario iniciado
$username = $_SESSION['username'];

// Comprueba si el usuario ha iniciado sesión de lo contrario lo devuelve a la página de login
if (!isset($_SESSION['username'])) {
    header('Location: /pages/login.php');
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/index.css">
    <link href="https://allfont.es/allfont.css?fonts=ds-digital" rel="stylesheet" type="text/css" />
    <link href='https://fonts.googleapis.com/css?family=Orbitron' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" href="/assets/logo.png">
    <script src="js/app.js" defer></script>
    <script src="/js/modoOscuro.js"></script>
    <title>IES Pablo Picasso - Turno</title>
</head>

<body>

    <!-- Menu de navegación -->

    <nav class="menu">
        <label class="logo"><a href="https://iespablopicasso.sytes.net/"><img id="logoImagen" class="logoImagen" src="assets/logoTexto.png" alt="Logo de IES Pablo Picasso"></a></label>
        <ul class="menu_items">
            <li><a href="" onclick="mostrarTiempoActual()">Actualizar tiempos</a></li>
            <li><a href="database/cerrarSesion.php">Cerrar sesión</a></li>
            <span class="btn_modoOscuro">
				<i id="botonModoOscuro" class="fas fa-toggle-off" onclick="modoOscuro()"></i>
			</span>
        </ul>
        <span class="btn_menu">
			<i class="fa fa-bars"></i>
		</span>
    </nav>
    <section class="lineheader" id="lineheader"></section>

    <!-- Contador (Tiempo) -->

    <section class="cuadroContador">
        <h1 id="tiempo" class="tiempo">Tiempo: 00:00:00</h1>
        <button type="button" id="botonEmpezar" class="botonEmpezar" onclick="empezarTemporizador()">Empezar Jornada</button>
        <button type="button" id="botonTerminar" class="botonTerminar" onclick="terminarTemporizador()">Terminar Jornada</button>
    </section>

    <!-- Tabla con todos los tiempos registrados del usuario -->

    <section id="cuadroListaTiempos" class="cuadroListaTiempos">

        <h2 id="tituloUltimoTiempo" class="tituloUltimoTiempo"></h2>
        <p id="ultimoTiempo" class="ultimoTiempo"></p>
        <h2 id="tituloTiempos" class="tituloTiempos">Lista de tiempos anteriores</h2>

        <table id="tablaTiempos" class="tablaTiempos">
            <tr>
                <th>Tiempo</th>
                <th>Entrada</th>
                <th>Salida</th>
            </tr>

            <?php

            // Obtiene el ID del usuario
            $obtenerIDUsuario = "SELECT ID FROM usuarios WHERE username = '$username'";
            $resultadoID = mysqli_fetch_array(mysqli_query($conexion, $obtenerIDUsuario));

            // Consulta a la base de datos para obtener los tiempos registrados del usuario
            $obtenerTiempos = "SELECT * from tiempos WHERE IDUsuario = '$resultadoID[0]'";
            $tiemposObtenidos = mysqli_query($conexion, $obtenerTiempos);

            // Muestra los datos en la tabla
            while ($mostrarDato = mysqli_fetch_array($tiemposObtenidos)) {
            ?>
                <tr>
                    <td> <?php echo $mostrarDato['Tiempo'] ?> </td>
                    <td> <?php echo $mostrarDato['Entrada'] ?> </td>
                    <td> <?php echo $mostrarDato['Salida'] ?> </td>
                </tr>
            <?php
            }
            ?>
        </table>
        <script src="js/contador.js"></script>
    </section>
</body>

</html>