<?php
include('config/config.php');

    // VALIDA LA ENTRADA DEL USUARIO
    $reservacion_name = $_POST['reservacion_name'];
    $reservacion_email = $_POST['reservacion_email'];
    $reservacion_tel = $_POST['reservacion_tel'];
    $reservacion_Fecha = $_POST['reservacion_Fecha'];
    $reservacion_Hora = $_POST['reservacion_Hora'];
    $reservacion_Catpersona = $_POST['reservacion_Catpersona'];

    // PREPARA EL QUERY SQL
    $postQuery = "INSERT INTO reservacion (reservacion_name, reservacion_email, reservacion_tel, reservacion_Fecha, reservacion_Hora, reservacion_Catpersona) VALUES (?, ?, ?, ?, ?, ?)";
    $postStmt = $mysqli->prepare($postQuery);

    // UNE LOS PARAMETROS Y EJECUTA EL QUERY
    $postStmt->bind_param("sssssi", $reservacion_name, $reservacion_email, $reservacion_tel, $reservacion_Fecha, $reservacion_Hora, $reservacion_Catpersona);

    if ($postStmt->execute()) {
        $message = "Reservacion Creada";
        header("refresh:1; url=indexcliente.php"); // REDURECCIONA A LA PAGINA, EN CASO DE TENER EXITO
        exit;
    } else {
        $err = "Su reserva no pudo ser completada, favor trate nuevamente.";
    }

    $postStmt->close();

?>

