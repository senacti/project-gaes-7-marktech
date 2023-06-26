<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Panne_E_Cafee2";

// Crear una conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $database);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los valores del formulario
$nombre = $_POST["firstName"];
$apellido = $_POST["lastName"];
$documento = $_POST["address"];
$email = $_POST["email"];
$tipoPQRS = $_POST["country"];
$mensaje = $_POST["mensaje"];

// Preparar la consulta SQL para insertar los datos en la tabla correspondiente
$sql = "INSERT INTO nombre_de_la_tabla (nombre, apellido, documento, email, tipo_pqrs, mensaje)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $apellido, $documento, $email, $tipoPQRS, $mensaje);

// Ejecutar la consulta y verificar si fue exitosa
if ($stmt->execute()) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
