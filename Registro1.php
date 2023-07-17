<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $contraseña = $_POST['password'];

   
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "conection_pane_cafe";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Error al conectar a la base de datos: " . $conn->connect_error);
    }

    $sql = "INSERT INTO usuario (nombre_u, apellido_u, contraseña, email_u) VALUES ('$nombre', '$apellido', '$contraseña', '$email')";
    if ($conn->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar usuario: " . $conn->error;
    }

    $conn->close();
}
?>
