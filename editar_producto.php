<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        h2 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 10px;
        }

        form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 16px;
            border: none;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        form input[type="text"] {
            width: 100px;
        }
    </style>
</head>
<body>
    <?php
        
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "conection_pane_cafe";
    
        $conn = new mysqli($servername, $username, $password, $dbname);
    
        // Verificar la conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }
    
        // Verificar si se ha enviado el formulario para actualizar el producto
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idProducto'])) {
            $idProducto = $_POST['idProducto'];
            $valorProducto = $_POST['valor_producto'];
            $tipoProducto = $_POST['tipo_producto'];
            $cantidad = $_POST['cantidad'];
    
            // Actualizar el producto en la base de datos
            $sql_update = "UPDATE inventario_productos SET valor_producto='$valorProducto', tipo_producto='$tipoProducto', cantidad='$cantidad' WHERE idProducto=$idProducto";
    
            if ($conn->query($sql_update) === TRUE) {
                echo "Producto actualizado correctamente.";
            } else {
                echo "Error al actualizar el producto: " . $conn->error;
            }
        }
    
        // Obtener los productos de la base de datos
        $sql = "SELECT * FROM inventario_productos";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            // Mostrar los productos en una tabla
            echo "<table border='1'>
                <tr>
                    <th>ID Producto</th>
                    <th>Nombre Producto</th>
                    <th>Valor Producto</th>
                    <th>Tipo Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha Caducidad</th>
                    <th>Fecha Producción</th>
                    <th>idSalidas</th>
                    <th>Acción</th>
                </tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row['idProducto']."</td>
                    <td>".$row['nom_producto']."</td>
                    <form method='post' action=''>
                        <input type='hidden' name='idProducto' value='".$row['idProducto']."'>
                        <td><input type='text' name='valor_producto' value='".$row['valor_producto']."'></td>
                        <td><input type='text' name='tipo_producto' value='".$row['tipo_producto']."'></td>
                        <td><input type='text' name='cantidad' value='".$row['cantidad']."'></td>
                        <td><input type='text' name='fecha_caducidad' value='".$row['fecha_caducidad']."' readonly></td>
                        <td><input type='text' name='fecha_produccion' value='".$row['fecha_produccion']."' readonly></td>
                        <td><input type='text' name='idSalidas' value='".$row['idSalidas']."' readonly></td>
                        <td><input type='submit' value='Guardar cambios'></td>
                    </form>
                  </tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron productos en la base de datos.";
        }
    
        $conn->close();

        ?>
       <div >
       <button type="submit" onclick="window.location.href = 'dashboard_admin.php'">Inico</button>
    </div>
    
</body>
</html>


