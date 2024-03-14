<?php
    $mysqli = new mysqli('localhost', 'root', '', 'Proyecto');

    if ($mysqli->connect_error) {
        die('Error en la conexión: ' . $mysqli->connect_error);
    }
?>
