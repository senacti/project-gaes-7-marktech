<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $ID_Producto = $_POST['idProducto'];
    $Nombre_Producto = $_POST['Nombre'];
    $Valor_Producto = $_POST['Valor'];
    $Tipo_Producto = $_POST['Tipo'];
    $Fecha_Caducidad = $_POST['fecha'];
    $Cantidad = $_POST['Cantidad'];

    // Conexión a la base de datos
    $conn = mysqli_connect("localhost", "root", "", "nombre base de datos");

    // Verificar la conexión
    if (!$conn) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Insertar el nuevo producto en la base de datos
    $query = "INSERT INTO producto (codigo_producto, nombre, precio_unidad, categoria, talla, color, estado_producto)
              VALUES ('$ID_Producto', '$Nombre_Producto', '$Valor_Producto', '$Tipo_Producto', '$Fecha_Caducidad', '$Cantidad')";

    if (mysqli_query($conn, $query)) {
        echo "El producto se ha agregado correctamente.";
    } else {
        echo "Error al agregar el producto: " . mysqli_error($conn);
    }

    // Cerrar la conexión
    mysqli_close($conn);
}
?>

