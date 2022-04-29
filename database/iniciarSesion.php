<?php
// Conexión a la base de datos
include('db.php');

if (isset($_POST['login'])) {

    // Variables globales
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error;

    // Comprueba si los campos están vacíos o no
    if (strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1) {

        // Consulta en la base de datos, comprueba si el usuario existe o no
        $comprobarUsuarioExiste = "SELECT * FROM usuarios WHERE username = '$username'";
        $resultadoComprobacionUsuario = mysqli_query($conexion, $comprobarUsuarioExiste);

        // Comprueba si el usuario existe o no
        if (mysqli_num_rows($resultadoComprobacionUsuario) != 0) {
            $obtenerDato = mysqli_fetch_array($resultadoComprobacionUsuario);
            $password_hash = $obtenerDato['password'];

            // Comprueba si el usuario y contraseña introducidos es correcto
            if (password_verify($password, $password_hash)) {
                // Inicia la sesión y te redirige a la página principal
                $_SESSION['username'] = $username;
                header("Location: ../index.php");
            } else {
                // Error: las credenciales son incorrectas
                $error = "loginIncorrecto";
                header("Location: ../pages/login.php?error=$error");
            }
        } else {
            // Error: usuario no existe
            $error = "usuarioNoExiste";
            header("Location: ../pages/login.php?error=$error");
        }
    } else {
        // Error: Campos vacios
        $error = "camposVacio";
        header("Location: ../pages/login.php?error=$error");
    }
}

// EOF