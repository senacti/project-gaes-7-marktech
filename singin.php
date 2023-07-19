<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "conection_pane_cafe";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}


$email = $_POST['floatingInput'];
$password = $_POST['floatingPassword'];
$usuario = $_POST['Usuario'];


$sql = "SELECT * FROM usuario WHERE email_u = '$email' AND contraseña = '$password'";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    if ($usuario === "Cliente") {
        header("Location: cliente.html");
    } elseif ($usuario === "Vendedor") {
        header("Location: dashboard_venta.html");
    } elseif ($usuario === "Administrador") {
        header("Location: dashboard_admin.html");
    } else {
        echo "Por favor, seleccione una opción de usuario.";
    }
} else {
    echo "Credenciales inválidas. Por favor, inténtelo nuevamente.";
}

$conn->close();
?>
