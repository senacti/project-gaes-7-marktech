<?php
// Obtener los datos del formulario
$id_usuario = $_POST['id'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

// Validar la contraseña
if ($password !== $confirm_password) {
    die('Las contraseñas no coinciden');
}

  // conexion base de datos
  $conn = mysqli_connect("localhost", "root", "","conection_pane_cafe" );
                
  // verificar conexion 
  if (!$conn){
    die("error al conectar a la base de datos:" . mysqli_connect_error());
  }

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuario (id_usuario, nombre_u, apellido_u, email_u, contraseña, confirm_password, idPago) VALUES ('$id_usuario','$nombre', '$apellido', '$email', '$password','$confirm_password',)";

if ($conn->query($sql) === TRUE) {
    echo 'Registro exitoso';
} else {
    echo 'Error al registrar: ' . $conn->error;
}

$conn->close();
?>
