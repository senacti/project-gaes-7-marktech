<?php
// Verificar si se recibieron los datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos enviados en formato JSON
    $data = json_decode(file_get_contents("php://input"), true);

    // Extraer los valores de los datos
    $total = $data['total'];
    $idProducto = $data['id_producto'];
    $cantidad = $data['cantidad'];

    // Realizar la conexión a la base de datos
    $conn = new mysqli("nombre_servidor", "nombre_usuario", "contraseña", "nombre_base_de_datos");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Crear la consulta SQL de inserción
    $sql = "INSERT INTO Ventas (total, id_product) VALUES ('$total', '$idProducto')";

    // Ejecutar la consulta SQL
    if ($conn->query($sql) === TRUE) {
        // La inserción se realizó correctamente
        echo "Venta registrada correctamente";
    } else {
        // Hubo un error en la inserción
        echo "Error al registrar la venta: " . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    // Si no se recibió una solicitud POST, retornar un mensaje de error
    echo "Error: Se esperaba una solicitud POST";
}
?>
