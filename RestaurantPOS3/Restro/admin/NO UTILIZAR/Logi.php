<?php
//session_start();
include('config/config.php');
//login 
if (isset($_POST['Ingresar'])) {
    $customer_email = $_POST['customer_email'];
    $customer_password = sha1(md5($_POST['customer_password'])); //double encrypt to increase security
    $stmt = $mysqli->prepare("SELECT customer_email, customer_password, customer_id  FROM  rpos_customers WHERE (customer_email =? AND customer_password =?)"); //sql to log in user
    $stmt->bind_param('ss',  $customer_email, $customer_password); //bind fetched parameters
    $stmt->execute(); //execute bind 
    $stmt->bind_result($customer_email, $customer_password, $customer_id); //bind result
    $rs = $stmt->fetch();
    $_SESSION['customer_id'] = $customer_id;
    if ($rs) {
        //Si el inicio es exitoso 
         header("location:reserva.php");
    } else {
        $err = "Credenciales Incorrectos, intente nuevamente. ";
    }
}
//require_once('partials/_head.php');
?>

<?php
//session_start();
include('config/config.php');
//login 
if (isset($_POST['Registrarse'])) {
    //Prevent Posting Blank Values
    if (empty($_POST["customer_phoneno"]) || empty($_POST["customer_name"]) || empty($_POST['customer_email']) || empty($_POST['customer_password'])) {
        $err = "Blank Values Not Accepted";
    } else {
        $customer_name = $_POST['customer_name'];
        $customer_phoneno = $_POST['customer_phoneno'];
        $customer_email = $_POST['customer_email'];
        $customer_password = sha1(md5($_POST['customer_password'])); //Hash This 
        $customer_id = $_POST['customer_id'];

        //Insert Captured information to a database table
        $postQuery = "INSERT INTO rpos_customers (customer_id, customer_name, customer_phoneno, customer_email, customer_password) VALUES(?,?,?,?,?)";
        $postStmt = $mysqli->prepare($postQuery);
        //bind paramaters
        $rc = $postStmt->bind_param('sssss', $customer_id, $customer_name, $customer_phoneno, $customer_email, $customer_password);
        $postStmt->execute();
        //declare a varible which will be passed to alert function
        if ($postStmt) {
            $success = "Customer Account Created" && header("refresh:1; url=indexcliente.php");
        } else {
            $err = "Please Try Again Or Try Later";
        }
    }
}
require_once('config/code-generator.php');
?>
<?php 
//echo $success;
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
                        <input type="email" required name="customer_email">
                        <label>Correo Electrónico</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="text" required name="customer_password">
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
                        <input type="text" required name="customer_name">
						<input class="form-control" value="<?php echo $cus_id;?>" required name="customer_id"  type="hidden">
                        <label >Nombre</label>
                    </div>
					<div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="text" required name="customer_phoneno">
                        <label >No. de Telefono</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-user'></i></span>
                        <input type="email" required name="customer_email">
                        <label >Email</label>
                    </div>
                    <div class="input-box">
                        <span class="icon"><i class='bx bxs-lock-alt' ></i></span>
                        <input type="Newpassword" required name="customer_password">
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
	    <!-- Footer -->
    <?php
    //require_once('partials/_footer.php');
    ?>
    <!-- Argon Scripts -->
    <?php
    //require_once('partials/_scripts.php');
    ?>
</body>
</html>