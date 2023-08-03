<?php
 require 'db_connection.php';
  
 $nombre  = $_POST['usuario'];
 $Nepassword  = $_POST['Newpassword'];
 $email = $_POST['Email'];

$insertar = "INSERT INTO cliente VALUES ('$nombre','$apellido','$email') ";

$query = mysqli_query($connection, $insertar);

if($query){

   echo "<script> alert('correcto');
    location.href = '../index.html';
   </script>";

}else{
    echo "<script> alert('incorrecto');
    location.href = '../index.html';
    </script>";
}






?>