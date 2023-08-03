<?php

session_start();
include 'db_connection.php';
if(isset($_POST['Ingresar'])){
error_reporting(0);
//yo no se mañana 

$ruser =$connection->real_escape_string( $_POST['usuario']);
$password =$connection->real_escape_string($_POST['password']);
//colsulta DB
$consulta = "SELECT * FROM cliente WHERE Cliente_name = '$ruser' and Cliente_password='$password'";
if($resultado = $connection->query($consulta)){

    while($row = $resultado->fetch_array()){
        $userok = $row['Cliente_name'];
        $passwordok= $row['Cliente_password'];
    }
    $resultado->close();
}
$connection->close();
if(isset($ruser)&& isset($password)){
    if($ruser == $userok && $password == $passwordok ){
        $_SESSION['LOGIN'] = TRUE;
        $_SESSION['USER'] = $Usuario;
        header("location:reserva.php");

    }
    else{
       $mensaje.="<div class='alert alert-warning alert-dismissible fade show' role='alert'>
       <strong>Holy guacamole!</strong> You should check in on some of those fields below.
       <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span>
       </button>
     </div>";
    }
}
}
//parte registro

?>

<?php
session_start();
include('db_connection.php');
//login 
if (isset($_POST['Registrarse'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["Cliente_name"]) || empty($_POST["Cliente_email"]) || empty($_POST['Cliente_password'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $Cliente_name = $_POST['Cliente_name'];
		$Cliente_password = $_POST['Cliente_password'];
        $Cliente_email = $_POST['Cliente_email'];
		$Cliente_id = $_POST['customer_id'];
		
        //Insert Captured information to a database table
        $postQuery = "INSERT INTO cliente (Cliente_id, Cliente_name, Cliente_password, Cliente_email) VALUES(?,?,?,?)";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('ssss',$Cliente_id,$Cliente_name, $Cliente_email, $Cliente_password);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Customer Account Created" && header("refresh:1; url=logi.php");
        } else {
            $err = "Please Try Again Or Try Later";
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
                        <input type="text" name="usuario">
                        <label>Usuario</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="text" name="password">
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
                        <input type="text" required name="Cliente_email">
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
                    <input href="Logi.php" type="submit" name="Registrarse" value="Registrarse" class='btn'>
					
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