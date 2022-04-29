<?php
// Conexión a la base de datos
include('db.php');

if (isset($_POST['register'])) {

	// Variables globales
	$error;
	$username = trim($_POST['username']);
	$password = trim($_POST['password']);
	$fechareg = date("d/m/y");

	// Comprueba si los campos están vacíos o no
	if (strlen($_POST['username']) >= 1 && strlen($_POST['password']) >= 1) {

		// Comprueba si el usario tiene 4 o más caracteres
		if (strlen($_POST['username']) < 4) {
			// Error, el usuario tiene menos de 4 caracteres
			$error = "nameLenght";
			header("Location: ../pages/register.php?error=$error");
			// Comprueba de la contraseña contiene más de 6 carácteres	
		} else if (strlen($_POST['password']) >= 6 && strlen($_POST['username']) >= 4) {

			$contieneMayusculas = false;
			$contieneMinisculas = false;
			$contieneDigito = false;

			for ($i = 0; $i <= strlen($password); $i++) {

				if (ctype_upper($password[$i])) {
					$contieneMayusculas = true;
				}

				if (ctype_lower($password[$i])) {
					$contieneMinisculas = true;
				}

				if (ctype_digit($password[$i])) {
					$contieneDigito = true;
				}
			}

			if (!$contieneMinisculas) {
				$error = "noContieneMinisculas";
				header("Location: ../pages/register.php?error=$error");
			}

			if (!$contieneMayusculas) {
				$error = "noContieneMayusculas";
				header("Location: ../pages/register.php?error=$error");
			}

			if (!$contieneDigito) {
				$error = "noContieneDigito";
				header("Location: ../pages/register.php?error=$error");
			}

			if ($contieneMayusculas && $contieneMinisculas && $contieneDigito) {
				// Consulta con la base de datos, comprobar si el usuario existe o no
				$comprobarUsuarioExiste = "SELECT * FROM usuarios WHERE username = '$username'";
				// Inserta los datos de la cuenta registrada en la base de datos
				// Incriptación de la contraseña
				$hashed_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);
				$insertarCuenta = "INSERT INTO usuarios(username, password, fecha_reg) VALUES ('$username','$hashed_password','$fechareg')";

				// Comprueba si el usuario existe o no
				if (mysqli_num_rows(mysqli_query($conexion, $comprobarUsuarioExiste)) != 0) {
					// Error: el usuario ya existe
					$error = "usuarioExiste";
					header("Location: ../pages/register.php?error=$error");
				} else {
					// Inserta los datos de la cuenta registrada
					// Muestra un mensaje de que el registro ha sido completado
					$resultadoCuenta = mysqli_query($conexion, $insertarCuenta);
					$error = "registroCorrecto";
					header("Location: ../pages/register.php?error=$error");
				}
			}
		} else {
			// Error: si la contraseña no cumple los requisitos
			$error = "passwordLenght";
			header("Location: ../pages/register.php?error=$error");
		}
	} else {
		// Error: Campos vacios
		$error = "camposVacio";
		header("Location: ../pages/register.php?error=$error");
	}
}

// EOF