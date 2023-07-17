<?php
// Incluir el archivo de conexión
include 'PQRS.php';

// Obtener los datos del formulario
$idPQRS = $_POST['idPQRS'];
$codigo_pqrs = $_POST['codigo_pqrs'];
$tipo_solicitud = $_POST['tipo_solicitud'];
$nombre_cliente = $_POST['nombre_cliente']; 
$apellido_cliente = $_POST['apellido_cliente']; 
$tipo_documento = $_POST['tipo_documento'];
$numero_documento = $_POST['numero_documento'];
$correo_electronico = $_POST['correo_electronico'];
$tipo_pqrs = $_POST['tipo_pqrs']; 
$mensaje = $_POST['mensaje'];

// Insertar los datos en la tabla PQRS
$sql = "INSERT INTO PQRS (idPQRS, codigo_pqrs, tipo_solicitud, nombre_cliente, apellido_cliente, tipo_documento, numero_documento, correo_electronico, mensaje) VALUES ('$idPQRS', '$codigo_pqrs', '$tipo_solicitud', '$nombre_cliente', '$apellido_cliente', '$tipo_documento', '$numero_documento', '$correo_electronico', '$mensaje')";


if ($conex->query($sql) === TRUE) {
    echo "PQRS guardada correctamente";
} else {
    echo "Error al guardar la PQRS: " . $conex->error;
}
var_dump($_POST);
// Cerrar la conexión
$conex->close();
