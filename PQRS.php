<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conection_pane_cafe";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $tipo_solicitud = $_POST['tipo_solicitud'];
    $nombre_cliente = $_POST['nombre_cliente'];
    $apellido_cliente = $_POST['apellido_cliente'];
    $tipo_documento = $_POST['tipo_documento'];
    $numero_documento = $_POST['numero_documento'];
    $correo_electronico = $_POST['correo_electronico'];
    $mensaje = $_POST['mensaje'];

    $sql = "INSERT INTO PQRS (tipo_solicitud, nombre_cliente, apellido_cliente, tipo_documento, numero_documento, correo_electronico, mensaje) VALUES ('$tipo_solicitud', '$nombre_cliente', '$apellido_cliente', '$tipo_documento', '$numero_documento', '$correo_electronico', '$mensaje')";

    if ($conn->query($sql) === TRUE) {
        echo "La PQRS se ha guardado correctamente.";
    } else {
        echo "Error al guardar la PQRS: " . $conn->error;
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>PQRS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/">
    <link rel="shortcut icon" href="panne.png">


    <link href="bootstrap.min.css" rel="stylesheet">

    <style>
    .overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
    }

    .message-box {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
    }

    .message-box h3 {
        font-size: 24px;
        margin-bottom: 15px;
    }

    .message-box button {
        padding: 10px 20px;
        background-color: #8B4513;
        color: #fff;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .message-box button:hover {
        background-color: #654321;
    }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 fs-6" href="index.html">
            <img src="panne.png" alt="" width="40%" width="40%">
        </a>
        </a>

        <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-nav">
            <div class="nav-item text-nowrap">
                <a class="nav-link px-3" href="sign-in.html">Cerrar sesion</a>
            </div>
        </div>
    </header>

    <div class="btn-toolbar mb-2 mb-md-0">
    </div>
    </div>
    </div>
    </div>
    <div style="padding-left: 200px" class="container my-5">

        <style>
        .message-box button {
            padding: 10px 20px;
            background-color: #8B4513;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .message-box button:hover {
            background-color: #8B4513;
        }
        </style>

    </div>
    <br>
    <br>

    </script>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous">
    </script>
    <script src="dashboard.js"></script>
    <style>
    .centrar {
        padding-left: 750px;
    }
    </style>
    </head>

    <body>
        <div class="overlay" id="overlay" style="display: none;">
            <div class="message-box">
                <h3>Su mensaje se ha enviado correctamente, gracias por ayudarnos a mejorar</h3>
                <button onclick="window.location.href='index.html'">Regresar al inicio</button>
            </div>
        </div>
        <script>
        document.querySelector('form').addEventListener('submit', function(event) {
            event.preventDefault();

            // Mostrar el cuadro de mensaje
            document.getElementById('overlay').style.display = 'flex';
        });
        </script>
    </body>

</html>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario PQRS</title>
</head>
<div class="centrar">

    <body>
        <h1>Formulario PQRS</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

            <label for="nombre_cliente">Nombre:</label><br>
            <input type="text" name="nombre_cliente" required><br>

            <label for="apellido_cliente">Apellido:</label><br>
            <input type="text" name="apellido_cliente" required><br>

            <label for="tipo_documento">Tipo de Documento:</label><br>
            <select name="tipo_documento" required>
                <option value="Cédula de ciudadania">Cédula de ciudadania</option>
                <option value="Tarjeta de identida">Tarjeta de identidad</option>
                <option value="Cédula de extranjeria">Cédula de extranjeria</option>
            </select><br>

            <label for="numero_documento">Número de Documento:</label><br>
            <input type="text" name="numero_documento" required><br>

            <label for="correo_electronico">Correo Electrónico:</label><br>
            <input type="email" name="correo_electronico"><br>
            <label for="tipo_solicitud">Tipo de Solicitud:</label><br>
            <select name="tipo_solicitud" required>
                <option value="Peticiones">Petición</option>
                <option value="Quejas">Quejas</option>
                <option value="Reclamos">Reclamos</option>
                <option value="Sugerencias">Sugerencias</option>
            </select><br>

            <label for="mensaje">Mensaje:</label><br>
            <textarea name="mensaje" rows="4" cols="50" required></textarea><br>

            <input type="submit" value="Enviar">
        </form>
    </body>
</div>

</html>

<?php
$conn->close();
?>
