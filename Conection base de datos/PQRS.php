<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'conection_pane_cafe';

$conex = new mysqli($servername, $username, $password, $dbname);

if($conex->connect_error){
    die("Error en la conexión: " .$conex->connect_error);
}

?>