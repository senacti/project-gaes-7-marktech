<!DOCTYPE html>
<html>
<head>
    <title>Eliminar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        form {
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h2>Eliminar Producto</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="producto_id">ID del Producto:</label>
        <input type="text" id="producto_id" name="producto_id" required>
        <input type="submit" value="Eliminar">
        <button type="submit" onclick="window.location.href = 'dashboard_admin.php'">Inico</button>
    </form>
</body>
</html>



<?php
// Conexión a la base de datos 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conection_pane_cafe";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Procesar el formulario

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Obtener el ID del producto enviado desde el formulario

    $producto_id = $_POST["producto_id"];

    // Preparar la consulta SQL para eliminar el producto

    $sql = "DELETE FROM inventario_productos WHERE idProducto = ?";

    // Preparar la sentencia y vincular parámetros

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $producto_id);

    // Ejecutar la sentencia
    
    if ($stmt->execute()) {
        echo "El producto con ID $producto_id ha sido eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Cerrar la sentencia y la conexión
    $stmt->close();
    $conn->close();
}
?>

