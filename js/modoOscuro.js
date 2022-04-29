function modoOscuro() {
    
    var tiempo = document.getElementById("tiempo");
    var tiempoUltimo = document.getElementById("tituloUltimoTiempo");
    var ultimoTiempo = document.getElementById("ultimoTiempo");
    var linea = document.getElementById("lineheader");
    var botonEmpezar = document.getElementById("botonEmpezar");
    var botonTerminar = document.getElementById("botonTerminar");
    var element = document.getElementById("botonModoOscuro");
    var titulo = document.getElementById("tituloTiempos");

    if (element.className == "fas fa-toggle-off") {
        element.className = "fas fa-toggle-on";
        document.body.style.backgroundColor = "#353839";
        titulo.style.color = "white";
        tiempo.style.color = "white";
        tiempoUltimo.style.color = "white";
        ultimoTiempo.style.color = "white";
        tiempo.style.textShadow = "none";
        botonEmpezar.style.boxShadow = "none";
        botonTerminar.style.boxShadow = "none";
    } else {
        element.className = "fas fa-toggle-off";
        document.body.style.backgroundColor = "white";
        linea.style.background = "#364fbe";
        titulo.style.color = "black";
        tiempo.style.color = "black";
        tiempoUltimo.style.color = "black";
        ultimoTiempo.style.color = "black";
        tiempo.style.textShadow = "4px 4px 4px #aaa";
        botonEmpezar.style.boxShadow = "5px 10px 18px #888888";
        botonTerminar.style.boxShadow = "5px 10px 18px #888888";
    }
}