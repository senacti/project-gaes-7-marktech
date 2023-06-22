
<?php
function panne_e_cafe (){
$server= "localHost";
$user = "root";
$pass = "";
$db = "conection pane cafe";



$Conexion= new mysqli($server, $user, $db );

if ($Conexion-> connect_errno){
    die ("Conexion fallida" . $Conexion->connect_errno);

} else{
    echo "conectado";
}
try {
    return new PDO('mysql:host=' . $server. ';dbname=' . $user . ';charset=utf8', 
    $db, $pass);
} catch (PDOException $exception) {
    // If there is an error with the connection, stop the script and display the error.
    die('error al conectar la base de datos :'. $exception->getMessage() );
    //exit('Fallo al conectar la base de datos!');
}
}

function template_header($title) {
    echo <<<EOT
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8">
            <title>$title</title>
            <link href="estilos.css" rel="stylesheet" type="text/css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        </head>
        <body>
        <nav class="navtop">
            <div>
                <h1>CONTACTOS</h1>
                <a href="index.php"><i class="fas fa-home"></i>Inicio</a>
                <a href="modificar.php"><i class="fas fa-pen fa-xs"></i>Modificar</a>
                <a href="adicionar.php"><i class="fa-solid fa-block-quote"></i></i>Adicionar</a>
                <a href="eliminar.php"><i class="fas fa-trash fa-xs"></i>Eliminar</a>
                <a href="consultar.php"><i class="fa-solid fa-browsers"></i>Consultar</a>
            </div>
        </nav>
    EOT;
    }
    /*La función "template_footer()" es una función de PHP que imprime el 
    código HTML necesario para cerrar la etiqueta "body" y "html" de una 
    página web.
    
    El código HTML se imprime utilizando la sintaxis de "Heredoc", que 
    permite definir una cadena de varias líneas sin tener que escapar 
    los caracteres de comillas o apostrofes.
    
    Este código cierra la etiqueta "body" y "html"  de la página web y 
    finaliza su estructura. Es una buena práctica 
    tener una función como esta para imprimir el código HTML necesario 
    al final de todas las páginas web que se generan dinámicamente en PHP. 
    De esta manera, el código HTML se mantiene organizado y fácil de leer, 
    y se evitan errores comunes de programación, como la omisión de etiquetas
    de cierre en HTML.
    
    */
    function template_footer() {
    echo <<<EOT
        </body>
    </html>
    EOT;
    }

?>
