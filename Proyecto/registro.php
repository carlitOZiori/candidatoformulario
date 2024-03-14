<?php

if(! isset( $_POST['REQUEST_METHOD'] != 'POST') ){
    header("Location: index.html" );
}
die();

$nombre = $_POST['nombre'];
$apellido_pa = $_POST['apellido_paterno'];
$apellido_ma = $_POST['apellido_materno'];
$email = $_POST['email'];

$body = <<<HTML
   <h1>Candidato tus datos son:</h1>
   <p>De: $nombre $apellido_pa $apellido_ma / $email</p>
HTML;

var_dump($nombre);

$rta mail('carlosalbert.pitufo0270@gmail.com',$apellido_ma, $apellido_ma, $nombre, $email);
var_dump($rta);
?>

