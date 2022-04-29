<?php

// Conexión a la base de datos
include('db.php');

// Cierra la sesión del usuario iniciado y lo redirige a la página de login
session_destroy();
header('Location: /pages/login.php');

// EOF