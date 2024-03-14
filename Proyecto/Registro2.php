<?php

require_once 'Conexion.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $telefono = $_POST['telefono'];
    $escolaridad = $_POST['escolaridad'];


    if (isset($_GET['email'])) {
       
        $email = $_GET['email'];

    
        $sql = "UPDATE Candidato SET Telefono=?, Escolaridad=? WHERE Email=?";
        $stmt = $mysqli->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("sss", $telefono, $escolaridad, $email);
            if ($stmt->execute()) {
              
                header('Location: interfaz_especialidad.php');
                exit();
            } else {
                echo "Error al ejecutar la consulta: " . $stmt->error;
            }
        } else {
            echo "Error al preparar la consulta: " . $mysqli->error;
        }
    } else {
       
        echo "No se proporcionó un correo electrónico válido.";
    }
}
?>
