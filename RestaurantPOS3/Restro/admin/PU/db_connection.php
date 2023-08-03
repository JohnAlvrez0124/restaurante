<!-- db_connection.php -->
<?php
$dbuser = "root";// Cambia esto por tu nombre de usuario de la base de datos
$dbpass = "";// Cambia esto por tu contraseña de la base de datos
$host = "localhost";// Cambia esto por el nombre del servidor de tu base de datos
$db = "proyecto2";// Cambia esto por el nombre de tu base de datos

// Conexión a la base de datos
$mysqli = new mysqli($host, $dbuser, $dbpass, $db);


// Verificar la conexión
if (!$mysqli) {
    die('Error de conexión: ' . mysqli_connect_error());
}
else{
    echo"conexion existosa";
}
?>
