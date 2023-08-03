<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();

// ACTUALIZAR RESERVACIONES
if (isset($_POST['ActualizarReserva'])) {
  // Prevent Posting Blank Values
  if (empty($_POST["reservacion_name"]) || empty($_POST["reservacion_tel"]) || empty($_POST['reservacion_Fecha']) || empty($_POST['reservacion_Hora']) || empty($_POST['reservacion_Catpersona'])) {
    $err = "No se aceptan valores vacios";
  } else {
    $reservacion_name = $_POST['reservacion_name'];
    $reservacion_tel = $_POST['reservacion_tel'];
    $reservacion_Fecha = $_POST['reservacion_Fecha'];
    $reservacion_Hora = $_POST['reservacion_Hora'];
    $reservacion_Catpersona = $_POST['reservacion_Catpersona'];
    $update = $_GET['update'];

    // Insert Captured information to a database table using prepared statement
    $postQuery = "UPDATE reservacion SET reservacion_name=?, reservacion_tel=?, reservacion_Fecha=?, reservacion_Hora=?, reservacion_Catpersona=? WHERE reservacion_id=?";
    $postStmt = $mysqli->prepare($postQuery);
    // Bind parameters
    $postStmt->bind_param('sssssi', $reservacion_name, $reservacion_tel, $reservacion_Fecha, $reservacion_Hora, $reservacion_Catpersona, $update);
    $postStmt->execute();

    // Declare a variable which will be passed to alert function
    if ($postStmt->affected_rows > 0) {
      $success = "Reservacion Actualizada";
      header("refresh:1; url=administrarreservaciones.php");
    } else {
      $err = "Intente nuevamente";
    }
  }
}

require_once('partials/_head.php');
?>

<body>
  <!-- Sidenav -->
  <?php
  require_once('partials/_sidebar.php');
  ?>
  <!-- Main content -->
  <div class="main-content">
    <!-- Top navbar -->
    <?php
    require_once('partials/_topnav.php');
    // Sanear el parámetro update antes de utilizarlo al query
    $update = isset($_GET['update']) ? intval($_GET['update']) : 0;
    $ret = "SELECT * FROM  reservacion WHERE reservacion_id = ?";
    $stmt = $mysqli->prepare($ret);
    // Vincular el parámetro de actualización al query
    $stmt->bind_param('i', $update);
    $stmt->execute();
    $res = $stmt->get_result();
    while ($Reserva = $res->fetch_object()) {
    ?>
      <!-- Header -->
      <div style="background-image: url(assets/img/theme/restro00.jpg); background-size: cover;" class="header  pb-8 pt-5 pt-md-8">
        <span class="mask bg-gradient-dark opacity-8"></span>
        <div class="container-fluid">
          <div class="header-body">
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
          <div class="col">
            <div class="card shadow">
              <div class="card-header border-0">
                <h3>POR FAVOR COMPLETE TODOS LOS CAMPOS</h3>
              </div>
              <div class="card-body">
                <form method="POST">
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>NOMBRE CLIENTE</label>
                      <input type="text" name="reservacion_name" class="form-control" value="<?php echo htmlspecialchars($Reserva->reservacion_name); ?>">
                    </div>
                    <div class="col-md-6">
                      <label>NUMERO CLIENTE</label>
                      <input type="text" name="reservacion_tel" class="form-control" value="<?php echo htmlspecialchars($Reserva->reservacion_tel); ?>">
                    </div>
                    <div class="col-md-6">
                      <label>FECHA RESERVA</label>
                      <input type="date" name="reservacion_Fecha" class="form-control" value="<?php echo htmlspecialchars($Reserva->reservacion_Fecha); ?>">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="col-md-6">
                      <label>HORA RESERVA</label>
                      <input type="time" name="reservacion_Hora" class="form-control" value="<?php echo htmlspecialchars($Reserva->reservacion_Hora); ?>">
                    </div>
                    <div class="col-md-6">
                      <label>CANTIDAD PERSONA</label>
                      <input type="text" name="reservacion_Catpersona" class="form-control" value="<?php echo htmlspecialchars($Reserva->reservacion_Catpersona); ?>">
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-md-6">
                      <input type="submit" name="ActualizarReserva" value="ACTUALIZAR RESERVA" class="btn btn-success" value="">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- Footer -->
      <?php
      require_once('partials/_footer.php');
    }
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>

</html>