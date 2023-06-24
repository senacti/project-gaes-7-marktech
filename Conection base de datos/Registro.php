<?php
// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validar la contraseña
if ($password !== $confirm_password) {
    die('Las contraseñas no coinciden');
}

// Conectar a la base de datos (modifica estos valores según tu configuración)
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'panne_e_cafee';

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Error al conectar con la base de datos: ' . $conn->connect_error);
}

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellido, email, password) VALUES ('$nombre', '$apellido', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo 'Registro exitoso';
} else {
    echo 'Error al registrar: ' . $conn->error;
}

$conn->close();
?>
