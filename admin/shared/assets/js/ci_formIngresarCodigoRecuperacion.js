var sec = 10;
window.onload = countDown;

function countDown() {
    if (sec < 10) {
        $("#btnVolverAEnviar").text("Reenviar(0"+sec+")");
    } else {
        $("#btnVolverAEnviar").text("Reenviar("+sec+")");
    }
    if (sec <= 0) {
        $("#btnVolverAEnviar").removeAttr("disabled");
        $("#btnVolverAEnviar").removeClass();
        $("#btnVolverAEnviar").addClass("btnEnable");
        $("#btnVolverAEnviar").text("Reenviar");
        return;
    }
    sec -= 1;
    window.setTimeout(countDown, 1000);
    }