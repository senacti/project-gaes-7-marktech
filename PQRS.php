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
$idPQRS = $_POST["idPQRS"];
$codigo_pqrs = $_POST["codigo_pqrs"];
$tipo_solicitud = $_POST["tipo_solicitud"];
$cliente = $_POST["cliente"];


// Preparar la consulta SQL para insertar los datos en la tabla correspondiente
$sql = "INSERT INTO PQRS (idPQRS, codigo_pqrs, tipo_solicitud, cliente)
        VALUES (?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssss", $idPQRS, $codigo_pqrs, $tipo_solicitud, $cliente);

// Ejecutar la consulta y verificar si fue exitosa
if ($stmt->execute()) {
    echo "Los datos se han guardado correctamente.";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
