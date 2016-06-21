<?php
/**
 * Created by PhpStorm.
 * User: Memo
 * Date: 18/jun/2016
 * Time: 08:26 PM
 */
include "habitaciones.php";
$inicio=resetHabitacion();
?>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/styles.css">
    <script src="js/jquery-2.1.4.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/funciones.js"></script>
</head>
<body>
<label for="jugador" id="lblJugador">Jugador: </label>
<input type="text" id="jugador" onkeypress="if (event.keyCode == 13) {iniciarSesion()}">
<br>
<label for="accion">Accion: </label>
<input type="text" id="accion" onkeypress="if (event.keyCode == 13) {ejecutarAccion()}">
<br><br>
<p id="historia">
    <?php echo $inicio?>
</p>
</body>
</html>
