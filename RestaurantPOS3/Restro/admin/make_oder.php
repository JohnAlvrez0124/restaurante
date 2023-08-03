<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
include('config/code-generator.php');

check_login();
if (isset($_POST['make'])) {
  //PREVIENE EL POST DE CAMPOS VACIOS
  if (empty($_POST["order_code"]) || empty($_POST["customer_name"]) || empty($_GET['prod_price'])|| empty($_POST["customer_id"])) {
    $err = "CAMPOS EN BLANCOS NO SON ACEPTADOS";
  } else {
    $order_id = $_POST['order_id'];
    $order_code  = $_POST['order_code'];
    $customer_id = $_POST['customer_id'];
    $customer_name = $_POST['customer_name'];
    $prod_id  = $_GET['prod_id'];
    $prod_name = $_GET['prod_name'];
    $prod_price = $_GET['prod_price'];
    $prod_qty = $_POST['prod_qty'];

    //INSERTAR A LA BASE DE DATO LO CAPTURADO
    $postQuery = "INSERT INTO rpos_orders (prod_qty, order_id, order_code, customer_id, customer_name, prod_id, prod_name, prod_price) VALUES(?,?,?,?,?,?,?,?)";
    $postStmt = $mysqli->prepare($postQuery);
    //UNE LOS PARAMETROS
    $rc = $postStmt->bind_param('ssssssss', $prod_qty, $order_id, $order_code, $customer_id, $customer_name, $prod_id, $prod_name, $prod_price);
    $postStmt->execute();
    //DECLARAR VARIABLE DE ALERTA 
    if ($postStmt) {
      $success = "Order Submitted" && header("refresh:1; url=payments.php");
    } else {
      $err = "Please Try Again Or Try Later";
    }
  }
}
require_once('partials/_head.php');
?>


<style>


.card-header {
  height: 50px;
}

	
.form-row {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.form-control[readonly]{
  background-color: #ffffff;
}

.col-md-18{
  column-width: 363.83px;
}
.form-row .col-md-18,
.form-row .col-md-8,
.form-row .col-md-4,
.form-row .col-md-6 {
  margin-bottom: 10px;
}

.form-row .col-md-18
.form-row .col-md-8,
.form-row .col-md-4 {
  flex-basis: calc(33.33% - 10px);
}
</style>

<!-- Your existing HTML code -->
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
              <h1  style="font-size:25px; color:#FFFFFF;">POR FAVOR COMPLETE LOS CAMPOS</h1>
            </div>
			<form action="" method="POST" role="form" id="orderForm">
            <div class="card-body">
              <!-- <form method="POST" enctype="multipart/form-data">-->
              <div class="form-row">
                <div class="col-md-18">
                  <label for="gross_amount" style="text-align:left;">MESA</label>
                    <select class="form-control" id="table_name" name="table_name">
                      <?php foreach ($table_data as $key => $value): ?>
                        <option value="<?php echo $value['id'] ?>"><?php echo $value['table_name'] ?></option>  
                      <?php endforeach ?>
                    </select>
                </div>
			</div>
			<div class="form-row">
                <div class="col-md-8">
                  <label>NOMBRE DEL CLIENTE</label>
				  <!-- Este campo recibe el id del cliente luego del script-->
                  <select class="form-control" required name="customername" id="cust_Name" onchange="ActualizarCampoID(this)">
                    <option value="">SELECCIONE EL NOMBRE DEL CLIENTE</option>
                    <?php
                    // CARGAR TODOS LOS CLIENTES
                    $ret = "SELECT * FROM  rpos_customers ";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    while ($cust = $res->fetch_object()) {
                      // Establece el valor del atributo segun el customer_id
                      echo '<option value="' . $cust->customer_id . '">' . $cust->customer_name . '</option>';
                    }
                    ?>
                  </select>
                </div>
			
                <div class="col-md-4">
                  <label>ID DEL CLIENTE</label>
                  <!-- Incluye la entrada solo si hay un cliente seleccionado -->
                  <input type="text" name="customer_id" readonly id="customerID" value="" class="form-control">
                </div>
				<div class="col-md-4">
                  <!--<label>NOMBRE SELECCIONADO</label>
				  <!-- Incluye la entrada solo para el cliente seleccionado -->
				  <input type="text" name="customer_name" hidden id="customer_name" value="" class="form-control">
				</div>
             </div>
             <script>
              //SCRIPT PARA ACTUALIZAR EL CMPO ID TRAS SELECCIONAR
              function ActualizarCampoID(selectElement) {
                // Obtiene el (customer_id)del cliente seleccionado
                const IdSeleccionado = selectElement.value;
				// Obtiene el nombre del cliente seleccionado
                const NombreSeleccionado = selectElement.options[selectElement.selectedIndex].text;
				
				//ENVIA LOS DATOS A LOS CAMPOS SEGUN SU ID + id="customerID" + id="customer_name"
                // Actualiza el valor del id seleccionado en el campo de nombre name="customer_id"
                document.getElementById('customerID').value = IdSeleccionado;
				// Asigna al campo del nombre, la misma upcion selecionada en POST (luego de haberla seleccionado)
                document.getElementById('customer_name').value = NombreSeleccionado;
              }
              </script>
              <div class="form-row">
				<div class="col-md-4">
					<label>NÚMERO DE ORDEN</label>
					<!-- AUNQUE SEA UN CAMPO ESCONDIDO, SIEMPRE SE DEBE PONER EL form-control-->
					<input type="hidden" name="order_id" value="<?php echo $orderid; ?>" class="form-control">
					<input type="text" name="order_code" value="<?php echo $alpha; ?>-<?php echo $beta; ?>" class="form-control">
				</div>
			  </div>
              <hr>
              <?php
              $prod_id = $_GET['prod_id'];
              $ret = "SELECT * FROM  rpos_products WHERE prod_id = '$prod_id'";
              $stmt = $mysqli->prepare($ret);
              $stmt->execute();
              $res = $stmt->get_result();
              while ($prod = $res->fetch_object()) {
              ?>
                <div class="form-row">
                  <div class="col-md-6">
                    <label>PRECIO DEL PRODUCTO RD($)</label>
                    <input type="text" readonly name="prod_price" value="$ <?php echo $prod->prod_price; ?>" class="form-control">
                  </div>
                  <div class="col-md-6">
                    <label>CANTIDAD DEL PRODUCTO</label>
                    <input required type="text" name="prod_qty" class="form-control" value="">
                  </div>
                </div>
              <?php } ?>
              <br>
              <div class="form-row">
                <div class="col-md-6">
                  <input type="submit" name="make" value="REALIZAR ORDEN" class="btn btn-success" value="">
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
      ?>
    </div>
  </div>
  <!-- Argon Scripts -->
  <?php
  require_once('partials/_scripts.php');
  ?>

</body>
</html>
	