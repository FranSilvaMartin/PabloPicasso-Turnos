<?php

// Conexión a la base de datos	
include('../database/db.php');

// Obtener el nombre de usuario iniciado
$username = $_SESSION['username'];

// Consulta en la base de datos, obtiene la ID del usuario
$id = "SELECT ID FROM usuarios WHERE username = '$username'";
$idObtenida = mysqli_fetch_array(mysqli_query($conexion, $id));

// Comprueba si las variables obtenidos son correctas
if (isset($_POST['segundosTiempo']) && isset($_POST['minutosTiempo']) && isset($_POST['horasTiempo'])) {

    // Variables globales
    $segundos = $_POST['segundosTiempo'];
    $minutos = $_POST['minutosTiempo'];
    $horas = $_POST['horasTiempo'];

    // Fecha de entrada
    $entradaYear = $_POST['entradaYear'];
    $entradaMes = $_POST['entradaMes'];
    $entradaDia = $_POST['entradaDia'];
    $entradaHoras = $_POST['entradaHoras'];
    $entradaMinutos = $_POST['entradaMinutos'];

    // Fecha de salida
    $salidaYear = $_POST['salidaYear'];
    $salidaMes = $_POST['salidaMes'];
    $salidaDia = $_POST['salidaDia'];
    $salidaHoras = $_POST['salidaHoras'];
    $salidaMinutos = $_POST['salidaMinutos'];

    // Inserta el tiempo en la base de datos junto a la fecha de entrada y salida
    $consulta = "INSERT INTO tiempos(IDUsuario, Tiempo, Entrada, Salida) VALUES ($idObtenida[0],('" . $horas . "h:" . $minutos . "m:" . $segundos . "s" . "'),('" . $entradaDia . "/" . $entradaMes . "/" . $entradaYear . " - " . $entradaHoras . ":" . $entradaMinutos . "" . "'),('" . $salidaDia . "/" . $salidaMes . "/" . $salidaYear . " - " . $salidaHoras . ":" . $salidaMinutos . "" . "'))";
    $resultado = mysqli_query($conexion, $consulta);
} else {
    echo 'ERROR';
}

// EOF