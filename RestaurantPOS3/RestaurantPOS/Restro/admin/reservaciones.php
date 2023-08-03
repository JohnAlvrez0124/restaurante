<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
//Cancel Order
if (isset($_GET['cancel'])) {
    $id = $_GET['cancel'];
    $adn = "DELETE FROM  rpos_orders  WHERE  order_id = ?";
    $stmt = $mysqli->prepare($adn);
    $stmt->bind_param('s', $id);
    $stmt->execute();
    $stmt->close();
    if ($stmt) {
        $success = "Deleted" && header("refresh:1; url=payments.php");
    } else {
        $err = "Try Again Later";
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
        <!-- Page content -->
        <iframe id="iframe" src="https://www.planyo.com/booking.php?calendar=63487&mode=resource_list&planyo_lang=ES&feedback_url=https%3A%2F%2Fwww.planyo.com%2Fbooking.php%3Fcalendar%3D63487" width="100%" height="1000"></iframe>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
</body>
<!-- For more projects: Visit codeastro.com  -->
</html>