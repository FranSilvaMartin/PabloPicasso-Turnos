// Variables globales
let hora = 0;
let minutos = 0;
let segundos = 0;
let pararTemporizador = true;

// Titulos y textos
let tiempo = document.getElementById('tiempo');
let tituloUltimoTiempo = document.getElementById('tituloUltimoTiempo');
let ultimoTiempo = document.getElementById('ultimoTiempo');

// Botones
let botonEmpezar = document.getElementById('botonEmpezar');
let botonPausar = document.getElementById('botonPausar');
let botonTerminar = document.getElementById('botonTerminar');

// Variables para guardar la fecha de entrada y la fecha de salida
var entrada;
var salida;

/**
 * Comienza el temporizador, obtiene la fecha actual y la guarda en la variable entrada
 * Cambia el texto del boton a "Pausar Jornada"
 */
function empezarTemporizador() {

    entrada = new Date();

    if (pararTemporizador == true) {
        botonEmpezar.innerHTML = 'Pausar Jornada';
        pararTemporizador = false;
        // Actualiza la tabla tiempos
        $('#tablaTiempos').load(location.href + " #tablaTiempos");
        temporizador();
    } else if (pararTemporizador == false) {
        pararTemporizador = true;
        // Actualiza la tabla tiempos
        $('#tablaTiempos').load(location.href + " #tablaTiempos");
        temporizador();
    }
}

/**
 * Termina el temporizador, obtiene la fecha actual y la guarda en la variable salida
 * Enviar la información a tiempoObtenido.php usando AJAX
 */
function terminarTemporizador() {

    if (pararTemporizador == false) {
        salida = new Date();

        // Envio de datos por AJAX
        // Ajax permite que un usuario de la aplicación web interactúe con una página web sin la 
        // interrupción que implica volver a cargar la página web. La interacción del sitio web 
        // ocurre rápidamente sólo con partes de la página de recarga y renovación.
        $.ajax({
            type: 'POST',
            url: '../utils/tiempoObtenido.php',
            data: {
                'segundosTiempo': segundos,
                'minutosTiempo': minutos,
                'horasTiempo': hora,
                'entradaYear': entrada.getFullYear(),
                'entradaMes': entrada.getMonth() + 1,
                'entradaDia': entrada.getDate(),
                'entradaHoras': entrada.getHours(),
                'entradaMinutos': entrada.getMinutes(),
                'salidaYear': salida.getFullYear(),
                'salidaMes': salida.getMonth() + 1,
                'salidaDia': salida.getDate(),
                'salidaHoras': salida.getHours(),
                'salidaMinutos': salida.getMinutes()
            },
            success: function (data) {
                console.log(data);
            }, error: function (jqXHR, textStatus, errorThrown) {
                console.log('error: ' + errorThrown);
            }
        })

        mostrarTiempoActual();
    }
}

/**
 * Temporizador, se ejecuta cada segundo y cuenta cada segundos y minutos e horas que se han transcurrido
 * y lo actualiza en tiempo real en el HTML
 */
function temporizador() {

    if (pararTemporizador == false) {
        segundos = parseInt(segundos);
        minutos = parseInt(minutos);
        hora = parseInt(hora);
        segundos = segundos + 1;

        if (segundos == 60) {
            minutos = minutos + 1;
            segundos = 0;
        }
        if (minutos == 60) {
            hora = hora + 1;
            minutos = 0;
            segundos = 0;
        }

        if (segundos < 10 || segundos == 0) {
            segundos = '0' + segundos;
        }
        if (minutos < 10 || minutos == 0) {
            minutos = '0' + minutos;
        }
        if (hora < 10 || hora == 0) {
            hora = '0' + hora;
        }

        // Actualiza el tiempo en el HTML a tiempo real
        tiempo.innerHTML = 'Tiempo: ' + hora + ':' + minutos + ':' + segundos;
        setTimeout("temporizador()", 1000);
    }
}

/**
 * Mustra el ultimo tiempo del temporizador realizado, actualiza la tabla de tiempos y asigna el titulo del último tiempo
 * Cambia el boton a "Empezar Jornada" 
 */
function mostrarTiempoActual() {

    $('#tablaTiempos').load(location.href + " #tablaTiempos");

    if (pararTemporizador == false) {
        botonEmpezar.innerHTML = 'Empezar Jornada';
        pararTemporizador = true;

        tituloUltimoTiempo.innerHTML = 'Tiempo actual realizado';
        ultimoTiempo.innerHTML = hora + 'h:' + minutos + 'm:' + segundos + 's';

        hora = 0;
        segundos = 0;
        minutos = 0;
        tiempo.innerHTML = 'Tiempo: 00:00:00';
    }
}