<?php

$Email=$connection->real_escape_string( $_POST['Email']); 

$usu=$connection->real_escape_string( $_POST['NewUsuario']);

$pass=$connection->real_escape_string( $_POST['Newpassword']);

include 'db_connection.php';

$consulta= "INSERT into login VALUE usuario_email = '$Email' and usuario_name = '$usu' and usuario_password= '$pass')";

$resultado= mysqli_query($connection,$consulta);

if($resultado)

{
header("location:reserva.php");
echo "Datos agregados correctamente";

}

else

{

echo "Error al ingresar los datos";

}

mysqli_close($connection);
?>