    <?php if (isset($success)) { ?>
        <!--INJECTA CODIGO DE ALERTA-->
        <script>
            setTimeout(function() {
                    swal("Success", "<?php echo $success; ?>", "success");
                },
                100);
        </script>

    <?php } ?>
    <?php if (isset($err)) { ?>
        <!--INJECTA CODIGO DE ALERTA-->
        <script>
            setTimeout(function() {
                    swal("Failed", "<?php echo $err; ?>", "error");
                },
                100);
        </script>

    <?php } ?>
    <?php if (isset($info)) { ?>
        <!--INJECTA CODIGO DE ALERTA-->
		</script>
            setTimeout(function() {
                    swal("Success", "<?php echo $info; ?>", "info");
                },
                100);
        </script>

    <?php } ?>
<?php
session_start();
include('db_connection.php');
//login 
if (isset($_POST['Ingresar'])) {
    $Cliente_email = $_POST['Cliente_email'];
	$Cliente_password = $_POST['Cliente_password'];
    $stmt = $mysqli->prepare("SELECT Cliente_email, Cliente_password, Cliente_id  FROM  cliente WHERE (Cliente_email =? AND Cliente_password =?)"); //SQL PARA LOGIN
    $stmt->bind_param('ss',  $Cliente_email, $Cliente_password); //UNIR LOS PARAMETROS PARA POST
    $stmt->execute(); //EJECUTA LA UNION
    $stmt->bind_result($Cliente_email, $Cliente_password, $Cliente_id); //RESULTADOS DE LA UNION
    $rs = $stmt->fetch();
    $_SESSION['Cliente_id'] = $Cliente_id; //ASIGNA EL ID DEL CLIENTE A LA SESION
    if ($rs) {
        //Si el inicio es exitoso 
         $success = "Cuenta Cliente Creada" && header("refresh:1; url=reserva.php");
    } else {
        $err = "Credenciales Incorrectos, intente nuevamente. ";
    }
}
?>

<?php
session_start();
include('db_connection.php');
//Registro
if (isset($_POST['Registrarse'])) {
    //Evita campos en blanco
    if (empty($_POST["Cliente_name"]) || empty($_POST["Cliente_email"]) || empty($_POST['Cliente_password'])) {
        $err = "Valores en blanco no se aceptan.";
    } else {
        $Cliente_name = $_POST['Cliente_name'];
		$Cliente_password = $_POST['Cliente_password'];
        $Cliente_email = $_POST['Cliente_email'];
		$Cliente_id = $_POST['Cliente_id'];
		
        //Inserta datos a la tabla
        $postQuery = "INSERT INTO cliente (Cliente_id, Cliente_name, Cliente_email, Cliente_password ) VALUES(?,?,?,?)";
        $postStmt = $mysqli->prepare($postQuery);
        //Une los parametros
        $rc = $postStmt->bind_param('ssss',$Cliente_id,$Cliente_name, $Cliente_email, $Cliente_password);
        $postStmt->execute();
        //Declra la variable que sera pasada a la funcion de alerta
        if ($postStmt) {
            $success = "Cuenta Creada Exitosamente" && header("refresh:1; url=logi.php");
        } else {
            $err = "Error, inente nuevamente.";
        }
    }
}
?>
<?php 
echo $mensaje;
?>
<html lang="en">
<head>
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <!-- LOGIN -->
    <div class="background"></div>
    <div class="container">
        <div class="item">
            <h2 class="logo"><i class='bx bxs-building'></i>Consuelo Restaurante</h2>
            <div class="text-item">
                <h2>¡Bienvenido! <br><span>
                    Estamos escantados de tenerte de nuevo.
                </span></h2>
                <p>Gracias a ti, estamos creciendo más allá de nuestras expectativas. 
                    Compartamos el éxito cada día.</p>
                <div class="social-icon">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-tiktok'></i></a>
                </div>
            </div>
        </div>
        <div class="login-section">
            <div class="form-box login">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <h2>Iniciar Sesión</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user-account'></i></span>
                        <input type="email" required name="Cliente_email">
                        <label>Correo Electrónico</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="text" required name="Cliente_password">
                        <label>Contraseña</label>
                    </div>
                    <div class="remember-password">
                        <label for=""><input type="checkbox">Recuerda</label>
                        <a href="#">Olvidaste tu contraseña</a>
                    </div>
                    
                    <input type="submit" name="Ingresar" value="Ingresar" class='btn'>
                    
                    <div class="create-account">
                        <p>¿Aún no tienes cuenta?<a href="#" class="register-link"> 
                            Registrarse</a></p>
                    </div>
                    
                   
                </form>
               
            </div>
            <div class="form-box register">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" role="form">

                    <h2>Ingreso</h2>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="email" required name="Cliente_email">
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user-account'></i></span>
                        <input type="text" required name="Cliente_name">
	
                        <label>Usuario</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="Newpassword" required name="Cliente_password">
                        <label>Contraseña</label>
                    </div>
                    <div class="remember-password">
                        <label for=""><input type="checkbox">Estoy de acuerdo con
                             los términos y condiciones</label>
                    </div>
                    <input href="" type="submit" name="Registrarse" value="Registrarse" class='btn'>
					
                    <div class="create-account">
                        <p>Tienes una cuenta? <a href="#" class="login-link">
                            Iniciar Sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="index.js"></script>
</body>
</html>