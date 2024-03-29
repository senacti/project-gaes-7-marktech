<!DOCTYPE html>
<html>
<head>
    <title>Registro de Productos</title>
    <link rel="stylesheet" href="Registro.css">
    <link rel="shortcut icon" href="panne.png">
    
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #212529;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        form {
            margin: 30px auto;
            max-width: 400px;
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
            font-size: 24px;
            margin-top: 0;
            font-weight: 500;
            margin-bottom: 30px;
        }

        label {
            display: block;
            font-size: 16px;
            color: #333;
            margin-bottom: 10px;
        }

        input[type=text], input[type=email], input[type=password] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 20px;
            font-size: 16px;
            background-color: #f5f5f5;
            color: #333;
            transition: all 0.3s;
        }

        input[type=text]:focus, input[type=email]:focus, input[type=password]:focus {
            outline: none;
            border: 2px solid #874a35;
            background-color: #fff;
        }

        input[type=submit] {
            background-color: #874a35;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 20px auto 0;
            display: block;
            font-size: 16px;
            transition: all 0.3s;
        }

        input[type=submit]:hover {
            background-color: #5f3424;
        }

        .error {
            color: #ff0000;
            font-size: 14px;
            margin-top: 5px;
        }

        .success {
            color: #008000;
            font-size: 14px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
<form action="nuevo_producto.php" method="post">
<h2>Formulario para agregar un producto</h2>
    <form action="nuevo_producto.php" method="post">
        Nombre Producto: <input type="text" name="nombre_producto" required><br>
        Valor Producto: <input type="number" name="valor_producto" required><br>
        Tipo de Producto: <input type="text" name="tipo_producto" required><br>
        Fecha Caducidad: <input type="date" name="fecha_caducidad" required><br>
        ID Producto: <input type="text" name="id_producto" required><br>
        fecha Produccion: <input type="date" name="fecha_produccion" required><br>
        Cantidad: <input type="number" name="cantidad" required><br>
        ID Salidad <input type="number" name="idSalidas" required><br>
        <input type="submit" value="Agregar Producto">
    </form>
</body> 
</html>
