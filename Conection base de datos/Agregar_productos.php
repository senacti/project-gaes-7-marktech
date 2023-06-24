<?php
include 'funciones.php';
include 'for_admin.html';
$pdo = panne_e_cafe();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['id']) && !empty($_POST['id']) && $_POST['id'] != 'auto' ? $_POST['id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $nom_producto = isset($_POST['name']) ? $_POST['name'] : '';
    $valor_producto = isset($_POST['valor']) ? $_POST['valor'] : '';
    $tipo_producto = isset($_POST['tipo']) ? $_POST['tipo'] : '';
    $fecha_caducidad = isset($_POST['fecha']) ? $_POST['fecha'] : '';
    $idProducto = isset($_POST['id']) ? $_POST['id'] : '';
    $cantidad = isset($_POST['cantidad']) ? $_POST['cantidad'] : '';
    $created = isset($_POST['created']) ? $_POST['created'] : date('Y-m-d H:i:s');
    // Insert new record into the contacts table

    $stmt = $pdo->prepare('INSERT INTO contacts VALUES (?, ?, ?, ?, ?, ?)');
    
    $stmt->execute([$nom_producto, $valor_producto, $tipo_producto, $fecha_caducidad, $idProducto, $created]);
    // Output message
    $msg = 'Created Successfully!';
}
?>