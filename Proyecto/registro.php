<?php

if(! isset( $_POST['nombre'] ) ){
    header("Location: index.html" );
}

$nombre = $_POST['nombre'];
var_dump($nombre);
?>
