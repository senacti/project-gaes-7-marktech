<?php
// Conexión a la base de datos 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conection_pane_cafe";

// Recibir datos del formulario
$nombre_producto = $_POST['nombre_producto'];
$valor_producto = $_POST['valor_producto'];
$tipo_producto = $_POST['tipo_producto'];
$fecha_caducidad = $_POST['fecha_caducidad'];
$id_producto = $_POST['id_producto'];
$cantidad = $_POST['cantidad'];


// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Llamar al procedimiento almacenado
$sql = "CALL agregar_producto('$nombre_producto', $valor_producto, '$tipo_producto', '$fecha_caducidad', '$id_producto', $cantidad)";

if ($conn->query($sql) === TRUE) {
    echo "Producto agregado exitosamente.";
        // Redirigir a la página de inicio después de 2 segundos
        header("refresh:2; url=dashboard_admin.php");
} else {
    echo "Error al agregar el producto: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
