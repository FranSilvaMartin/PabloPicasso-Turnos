<?php

    // Lista de los errores que pueden mostrarse en la página

    if (isset($_GET['error'])) {
        $error = $_GET['error'];

        if ($error == "camposVacio") {
            echo "<p id='error' class='error'>Los campos no pueden estar vacios</p>";
        }
        
        if ($error == "noContieneMinisculas") {
            echo "<p id='error' class='error'>La contraseña debe contener una minúscula</p>";
        }

        if ($error == "noContieneMayusculas") {
            echo "<p id='error' class='error'>La contraseña debe contener una mayúscula</p>";
        }

        if ($error == "noContieneDigito") {
            echo "<p id='error' class='error'>La contraseña debe contener un dígito</p>";
        }

        if ($error == "nameLenght") {
            echo "<p id='error' class='error'>El nombre debe tener al menos 4 caracteres</p>";
        }

        if ($error == "passwordLenght") {
            echo "<p id='error' class='error'>La contraseña debe tener al menos 6 caracteres</p>";
        }

        if ($error == "usuarioNoExiste") {
            echo "<p id='error' class='error'>El usuario no existe</p>";
        }
        if ($error == "usuarioExiste") {
            echo "<p id='error' class='error'>El usuario ya existe</p>";
        }

        if ($error == "registroCorrecto") {
            echo "<p id='error' class='error'>Registro correcto</p>";
        }

        if ($error == "registroIncorrecto") {
            echo "<p id='error' class='error'>Registro incorrecto</p>";
        }

        if ($error == "loginIncorrecto") {
            echo "<p id='error' class='error'>El usuario o contraseña son incorrectos</p>";
        }
    }

// EOF