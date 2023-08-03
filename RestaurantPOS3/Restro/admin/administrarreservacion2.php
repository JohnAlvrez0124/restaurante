<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
?>
<?php
//MODIFICAR RESERVACIONES 
if (isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $adn = "DELETE FROM  reservacion  WHERE  reservacion_id = ?";
  $stmt = $mysqli->prepare($adn);
  $stmt->bind_param('s', $id);
  $stmt->execute();
  $stmt->close();
  if ($stmt) {
    $success = "Eliminado" && header("refresh:1; url=administrarreservaciones.php");
  } else {
    $err = "Intente nuevamente";
  }
}
require_once('partials/_head.php');
?>
<style>
th {
  text-align: center;
}
td {
  text-align: center;
}
</style>

<body>
    <!-- NAVEGACION LATERAL -->
    <?php
    require_once('partials/_sidebar 2.php');
    ?>
    <!--CONTENIDO PRINCIPAL -->
    <div class="main-content">
        <!-- NAVEGACION -->
        <?php
        require_once('partials/_topnav 2.php');
        ?>
        <!-- HEADER -->
        <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
        <span class="mask bg-gradient-dark opacity-8"></span>
            <div class="container-fluid">
                <div class="header-body">
                </div>
            </div>
        </div>
        <!-- CONTENIDO DE LA PAGINA -->
        <div class="container-fluid mt--8">
            <!-- TABLAS -->
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            ADMINISTRAR RESERVACIONES
                        </div>
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th class="text-success" scope="col">ID RESERVACION</th>
                                        <th scope="col">NOMBRE</th>
                                        <th scope="col">TELEFONO</th>
										<th scope="col">EMAIL</th>
                                        <th scope="col">FECHA RESERVACION</th>
                                        <th class="text-success" scope="col">HORA</th>
                                        <th scope="col">CANTIDAD DE PERSONAS</th>
										<th scope="col">ACCIONES</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
									//ORDENA SEGUN LA SECUENCIA DE REGISTRO EN LA TABLA
                                    $ret = "SELECT * FROM  reservacion";
									
									//PREPARA LA SENTENCIA SQL PARA SU EJECUCION
                                    $stmt = $mysqli->prepare($ret);
                                    $stmt->execute();
                                    $res = $stmt->get_result();
                                    while ($reserva = $res->fetch_object()) {
                                    ?>
                                        <tr>
                                            <th text= center class="text-success" scope="row"><?php echo $reserva->reservacion_id; ?></th>
                                            <td ><?php echo $reserva->reservacion_name; ?></td>
                                            <td><?php echo $reserva->reservacion_tel; ?></td>
                                            <td><?php echo $reserva->reservacion_email; ?></td>
                                            <td><?php echo $reserva->reservacion_Fecha; ?></td>
											<td><?php echo $reserva->reservacion_Hora; ?></td>
											<td><?php echo $reserva->reservacion_Catpersona; ?></td>
											<td>
												<a href="administrarreservaciones.php?delete=<?php echo $reserva->reservacion_id; ?>">
													<button class="btn btn-sm btn-danger">
													<i class="fas fa-trash"></i>
														BORRAR
													</button>
												</a>

												<a href="actualizarreservaciones.php?update=<?php echo $reserva->reservacion_id; ?>">
													<button class="btn btn-sm btn-primary">
													<i class="fas fa-user-edit"></i>
													ACTUALIZAR
													</button>
												</a>
											</td>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <?php
            require_once('partials/_footer.php');
            ?>
        </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>

</html>