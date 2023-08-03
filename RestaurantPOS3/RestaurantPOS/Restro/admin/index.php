<?php
session_start();
include('config/config.php');

//LOGIN ADMINISTRADOR
if (isset($_POST['login'])) {
  $admin_email = $_POST['admin_email'];
  $admin_password = sha1(($_POST['admin_password'])); //SHA1 1 SOLO ENCRIPTADO 
  $stmt = $mysqli->prepare("SELECT admin_email, admin_password, admin_id  FROM   rpos_admin WHERE (admin_email =? AND admin_password =?)"); //sql to log in user
  $stmt->bind_param('ss',  $admin_email, $admin_password); //UNE LOS PARAMETROS 
  $stmt->execute(); //EJECUTA LA UNION
  $stmt->bind_result($admin_email, $admin_password, $admin_id); //RESULTADO DE LA UNION
  $rs = $stmt->fetch();
  $_SESSION['admin_id'] = $admin_id;
  if ($rs) {
    //SI LA VERIFICACION ES EXITOSA
    header("location:dashboard.php");
  } else {
    $err = "Incorrect Authentication Credentials ";
  }
}
require_once('partials/_head.php');
?>


<body  class="bg-dark">
  <div class="main-content">
    <div class="header bg-gradient-primar py-7">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
			  <h1 class="text-white">LOGIN ADMIN</h1>
              <h2 class="text-white">RESTAURANTE MARKETCITO</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
              <form method="post" role="form">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    <input class="form-control" required name="admin_email" placeholder="Nombre De Usuario">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" required name="admin_password" placeholder="Contraseña" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Recordarme</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" name="login" class="btn btn-primary my-4">INICIAR SESIÓN</button>
                </div>
              </form>

            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php
  require_once('partials/_footer.php');
  ?>
  <!-- Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>
</body>
</html>