<?php
session_start();
include('config/config.php');
include('config/checklogin.php');
check_login();
require_once('partials/_head.php');
?>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <style>
        body {
          font-family: Arial, sans-serif;
          margin: 0;
          padding: 0;
		  background-color: #3B3936;
        }
		
		.main-content {
          background-color: #3B3936;
        }
        
        .container {
          max-width: 800px;
          margin: 0 auto;
          padding: 20px;
          text-align: center;
          color: #000;
        }
        
        .dark-mode .container {
          color: #fff;
        }
        
        h1 {
          margin-top: 0;
        }
        
        .table-row {
		  background-color: #3B3936;
          display: flex;
          justify-content: center;
          margin-bottom: 20px;
		  margin-top: 20px;
        }
        
        .table-container {
		  background-color: #64625D;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin: 0 10px;
          overflow: hidden;
          box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .table-image {
          display: block;
          margin-left: auto;
		  margin-right: auto;
		  width: 60%;
		  margin-top : 20px ; 
		}
        
        table {
		  background-color: #64625D;
          border-collapse: collapse;
          width: 100%;
        }
        
        th, td {
          text-align: center;
          padding: 3px;
        }
        
        th {
          background-color: #64625D;
          font-weight: Normal;
        }
        
        .table-status {
          text-align: center;
          font-weight: bold;
          padding: 8px;
        }
        
        .table-available {
          color: #28a745;
        }
        
        .table-occupied {
          color: #dc3545;
        }
        
        .table-actions {
          text-align: center;
          margin-top: 10px;
        }
        
        .button {
          background-color: #4caf50;
          border: none;
          color: #fff;
          padding: 8px 12px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 14px;
          cursor: pointer;
          transition: background-color 0.3s;
		  margin-bottom: 20px;
        }
        
        .button:hover {
          background-color: #45a049;
        }
    </style>
</head>
<body>
    <!-- Sidenav -->
    <?php
    require_once('partials/_sidebar.php');
    ?>
    <!-- Main content -->
    <div class="main-content">
        <!-- Page content -->
			<div class="table-row">
              <div class="table-container">
                <img src="mesa_circular-removebg-preview.png" alt="Imagen de la mesa 4" class="table-image">
                <table>
                  <thead>
                    <tr>
                      <th>ID de Mesa</th>
                      <th>Estado</th>
                      <th>Tiempo de ocupación</th>
                      <th>Personas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>4</td>
                      <td id="status-4" class="table-status table-available">Disponible</td>
                      <td id="time-4">-</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-actions">
                  <button class="button" onclick="toggleTableStatus(4)">Disponible</button>
                  <button class="button" onclick="resetTable(4)">Resetear</button>
                </div>
              </div>
        
              <div class="table-container">
                <img src="mesa_circular-removebg-preview.png" alt="Imagen de la mesa 5" class="table-image">
                <table>
                  <thead>
                    <tr>
                      <th>ID de Mesa</th>
                      <th>Estado</th>
                      <th>Tiempo de ocupación</th>
                      <th>Personas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>5</td>
                      <td id="status-5" class="table-status table-available">Disponible</td>
                      <td id="time-5">-</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-actions">
                  <button class="button" onclick="toggleTableStatus(5)">Disponible</button>
                  <button class="button" onclick="resetTable(5)">Resetear</button>
                </div>
              </div>
        
              <div class="table-container">
                <img src="mesa_circular-removebg-preview.png" alt="Imagen de la mesa 6" class="table-image">
                <table>
                  <thead>
                    <tr>
                      <th>ID de Mesa</th>
                      <th>Estado</th>
                      <th>Tiempo de ocupación</th>
                      <th>Personas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>6</td>
                      <td id="status-6" class="table-status table-available">Disponible</td>
                      <td id="time-6">-</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-actions">
                  <button class="button" onclick="toggleTableStatus(6)">Disponible</button>
                  <button class="button" onclick="resetTable(6)">Resetear</button>
                </div>
              </div>
            </div>
        
            <div class="table-row">
              <div class="table-container">
                <img src="mesa_circular-removebg-preview.png" alt="Imagen de la mesa 4" class="table-image">
                <table>
                  <thead>
                    <tr>
                      <th>ID de Mesa</th>
                      <th>Estado</th>
                      <th>Tiempo de ocupación</th>
                      <th>Personas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>4</td>
                      <td id="status-4" class="table-status table-available">Disponible</td>
                      <td id="time-4">-</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-actions">
                  <button class="button" onclick="toggleTableStatus(4)">Disponible</button>
                  <button class="button" onclick="resetTable(4)">Resetear</button>
                </div>
              </div>
        
              <div class="table-container">
                <img src="mesa_circular-removebg-preview.png" alt="Imagen de la mesa 5" class="table-image">
                <table>
                  <thead>
                    <tr>
                      <th>ID de Mesa</th>
                      <th>Estado</th>
                      <th>Tiempo de ocupación</th>
                      <th>Personas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>5</td>
                      <td id="status-5" class="table-status table-available">Disponible</td>
                      <td id="time-5">-</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-actions">
                  <button class="button" onclick="toggleTableStatus(5)">Disponible</button>
                  <button class="button" onclick="resetTable(5)">Resetear</button>
                </div>
              </div>
        
              <div class="table-container">
                <img src="mesa_circular-removebg-preview.png" alt="Imagen de la mesa 6" class="table-image">
                <table>
                  <thead>
                    <tr>
                      <th>ID de Mesa</th>
                      <th>Estado</th>
                      <th>Tiempo de ocupación</th>
                      <th>Personas</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>6</td>
                      <td id="status-6" class="table-status table-available">Disponible</td>
                      <td id="time-6">-</td>
                      <td>0</td>
                    </tr>
                  </tbody>
                </table>
                <div class="table-actions">
                  <button class="button" onclick="toggleTableStatus(6)">Disponible</button>
                  <button class="button" onclick="resetTable(6)">Resetear</button>
                </div>
              </div>
            </div>
    </div>
    <!-- Argon Scripts -->
    <?php
    require_once('partials/_scripts.php');
    ?>
	  <script>
            const container = document.querySelector('.container');
            const toggleSwitch = document.querySelector('.toggle-switch');
        
            toggleSwitch.addEventListener('click', function() {
              container.classList.toggle('dark-mode');
            });
        
            function toggleTableStatus(tableId) {
              var statusCell = document.getElementById(`status-${tableId}`);
              var timeCell = document.getElementById(`time-${tableId}`);
              var numPeopleCell = statusCell.nextElementSibling;
        
              if (statusCell.classList.contains("table-occupied")) {
                alert("Esta mesa ya está ocupada.");
                return;
              }
        
              statusCell.textContent = "Ocupada";
              statusCell.classList.remove("table-available");
              statusCell.classList.add("table-occupied");
              numPeopleCell.textContent = "1"; // Cambia este valor según la cantidad de personas
        
              // Iniciar el contador de tiempo
              var seconds = 0;
              var timerId = setInterval(function () {
                seconds++;
                var minutes = Math.floor(seconds / 60);
                var remainingSeconds = seconds % 60;
                timeCell.textContent = minutes + ":" + (remainingSeconds < 10 ? "0" : "") + remainingSeconds;
              }, 1000);
        
              statusCell.setAttribute("data-timer", timerId);
            }
        
            function resetTable(tableId) {
              var statusCell = document.getElementById(`status-${tableId}`);
              var timeCell = document.getElementById(`time-${tableId}`);
              var numPeopleCell = statusCell.nextElementSibling;
        
              statusCell.textContent = "Disponible";
              statusCell.classList.remove("table-occupied");
              statusCell.classList.add("table-available");
              timeCell.textContent = "-";
              numPeopleCell.textContent = "0"; // Cambia este valor a cero
        
              // Detener el contador de tiempo si está activo
              var timerId = statusCell.getAttribute("data-timer");
              if (timerId) {
                clearInterval(timerId);
                statusCell.removeAttribute("data-timer");
              }
            }
       </script>
</body>
<!-- For more projects: Visit codeastro.com  -->
</html>



