
<?php
$servername = "localhost";  // Cambiar si el servidor MySQL no se encuentra en el localhost
$username = "root";
$password = "";
$database = "Panne_E_Cafee2";

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar si hay errores en la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los valores del formulario
    $email = $_POST["correo"];
    $password = $_POST["contraseña"];

    // Aquí puedes realizar la consulta a la base de datos para verificar el inicio de sesión
    // ...
}

// ...

// Consulta preparada
$sql = "SELECT * FROM usuario WHERE correo = ? AND contraseña = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

// Verificar el resultado de la consulta
if ($result->num_rows == 1) {
    // Inicio de sesión exitoso
    // Redirigir a la página correspondiente según el tipo de usuario
    $row = $result->fetch_assoc();
    $tipoUsuario = $row["tipo_usuario"];

    if ($tipoUsuario === "Cliente") {
        header("Location: index.html");
    } elseif ($tipoUsuario === "Vendedor") {
        header("Location:ventas.html");
    } elseif ($tipoUsuario === "Administrador") {
        header("Location: dashboard_admin.html");
    } else {
        echo "Tipo de usuario desconocido.";
    }
} else {
    // Credenciales incorrectas
    echo "Correo y/o contraseña incorrectos.";
}

$stmt->close();
$conn->close();
?>