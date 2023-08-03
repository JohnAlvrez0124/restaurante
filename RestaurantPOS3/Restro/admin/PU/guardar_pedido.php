<?php
include 'db_connection.php';

if (isset($_POST['pedido'])) {
    $pedidoData = $_POST['pedido'];
    $nombre = $pedidoData['nombre'];
    $total = $pedidoData['total'];
    $pedidoItems = $pedidoData['pedidoItems'];

    // Insertar el pedido en la tabla de pedidos
    $sql = "INSERT INTO tabla_pedidos (nombre_cliente, total) VALUES (?, ?)";
    $params = array($nombre, $total);
    $stmt = sqlsrv_query($conn, $sql, $params);
    
    if ($stmt === false) {
        die(print_r(sqlsrv_errors(), true));
    }

    $pedidoId = sqlsrv_get_field($stmt, 0);

    // Insertar los detalles de los artículos del pedido en la tabla de detalles de pedidos
    foreach ($pedidoItems as $item) {
        $nombreItem = $item['nombre'];
        $precioItem = $item['precio'];
        $sql = "INSERT INTO tabla_detalles_pedidos (id_pedido, nombre_item, precio_item) VALUES (?, ?, ?)";
        $params = array($pedidoId, $nombreItem, $precioItem);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }
    }

    echo "Pedido guardado exitosamente en la base de datos.";
}
?>
