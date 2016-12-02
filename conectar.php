<?php
function conectar(){
$mysqli = new mysqli("localhost", "root", "", "db_proyectos");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Error de conexión: %s\n", mysqli_connect_error());
    exit();
}
return $mysqli;
}