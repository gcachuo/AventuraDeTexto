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
    var historia = $("#historia");

    alert(accion);
    historia.append(accion + "<br>");
    $.post(
        "historia.php",
        {
            accion: accion
        },
        function (out) {
            historia.append(out);
        });

    $("#accion").val("");
}