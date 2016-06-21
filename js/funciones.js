/**
 * Created by Memo on 18/jun/2016.
 */
function iniciarSesion() {
    var jugador = $("#jugador").val();

    $.post(
        "login.php",
        {
            jugador: jugador
        },
        function (out) {
            if (out == "true") {
                $("#jugador").hide();
                $("#lblJugador").hide();
            }
            else
                alert(out);
        });
}
function ejecutarAccion() {
    var accion = $("#accion").val();
    var jugador = $("#jugador").val();
    var historia = $("#historia");

    if(jugador!="") {
        historia.append("<br>" + accion + "<br>");
        $.post(
            "acciones.php",
            {
                accion: accion,
                jugador: jugador
            },
            function (out) {
                historia.append(out);
            });

        $("#accion").val("");
    }
    else{
        alert("Escriba un nombre de jugador");
    }
}