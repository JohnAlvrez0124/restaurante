<!DOCTYPE html>
<html>
<head>
    <title>Reservas</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-image: url('comida.jpg');
      background-size: cover;
      background-position: center;
    }
    
    .container {
      max-width: 300px;
      margin: 0 auto;
      padding: 90px;
      background-color: rgba(255, 255, 255, 0.333);
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.333);
      text-align: center;
    }
    
    .container h2 {
      margin-bottom: 20px;
      color: #fff;
    }
    
    .container label {
      display: block;
      margin-bottom: 20px;
      text-align: left;
      font-weight: bold;
      color: #fff;
    }
    
    .container input[type="firstName"],
    .container input[type="email"],
    .container input[type="lastName"],
    .container input[type="date"],
    .container input[type="time"],
    .container input[type="phone"],
    .container input[type="number"] {
      width: 100%;
      padding: 10px 10px;
      margin-bottom: 20px;
      border: none;
      border-bottom: 2px solid #ffffff;
      border-radius: 3px;
      font-size: 16px;
      background-color: #f9f9f9;
      color: black;
      transition: border-color 0.3s;
    }
    
    .container input[type="firstName"]:focus,
    .container input[type="email"]:focus,
    .container input[type="lastName"]:focus,
    .container input[type="date"]:focus,
    .container input[type="time"]:focus,
    .container input[type="phone"]:focus
    .container input[type="number"]:focus {
      outline: none;
      border-color: #ffffff;
    }
    
    .container button {
      width: 100%;
      padding: 12px 20px;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s;
    }
    
    .container button:hover {
      background-color: #45a049;
    }
    
    .container p {
      margin-top: 20px;
      color: #ffffff;
    }
    
    .error-message {
      color: red;
      font-size: 14px;
      margin-top: 5px;
    }
    </style>
</head>
    <div class="container">
        <h2>Realizar Reserva</h2>
        <form action="" method="POST" role="form" id="reservationForm">
            <label for="firstName">Nombre y Apellido:</label>
            <input type="firstName" required name="reservacion_name" id="Nombres">

            <label for="email">Email:</label>
            <input type="email" required name="reservacion_email" id="email">

            <label for="phone">Teléfono:</label>
            <input type="phone" required name="reservacion_tel" id="telefono">

            <label for="date">Fecha:</label>
            <input type="date" required name="reservacion_Fecha" id="fecha">

            <label for="time">Hora:</label>
            <input type="time" required name="reservacion_Hora" id="hora">

            <label for="guests">Cantidad de personas:</label>
            <input type="number" required name="reservacion_Catpersona" id="cantidad" min="1">

            <button type="submit" name="CrearReserva" class="btn" id="submitBtn">Realizar Reserva</button>
        </form>
        <p id="message"></p>
        <div id="errorMessage" class="error-message"></div>
    </div>

    <script>
        document.getElementById("reservationForm").addEventListener("submit", function(event) {
            event.preventDefault();
            var Nombres = document.getElementById("Nombres").value;
            var email = document.getElementById("email").value;
            var telefono = document.getElementById("telefono").value;
            var fecha = document.getElementById("fecha").value;
            var hora = document.getElementById("hora").value;
            var cantidad = document.getElementById("cantidad").value;
			var reservationDateTime = new Date(fecha + "T" + hora);
            var currentDateTime = new Date();

            // VALIDA LOS CAMPOS DEL FORM RECIBIDO
            var errors = [];
            if (Nombres.trim() === "") {
                errors.push("Nombre y Apellido es requerido.");
            }
            if (email.trim() === "") {
                errors.push("Email es requerido.");
            } else if (!isValidEmail(email)) {
                errors.push("Email no es válido.");
            }
            if (telefono.trim() === "") {
                errors.push("Teléfono es requerido.");
            }
			
			if (reservationDateTime <= currentDateTime) {
			errors.push("No se puede realizar la reserva para una fecha y hora pasada.");
			}
      
			var timeDiff = reservationDateTime.getTime() - currentDateTime.getTime();
			var hoursDiff = timeDiff / (1000 * 60 * 60);
      
			if (hoursDiff < 2 && reservationDateTime.getDate() === currentDateTime.getDate()) {
			errors.push("Debe haber al menos 2 horas de anticipación para hacer una reserva en el mismo día.");
			}
            

            if (errors.length === 0) {
                // SI LA VALIDACION ES EXITOSA, EVIA A LOS SERVIDORES
                document.getElementById("errorMessage").textContent = "";
                sendDataToServer();
            } else {
                // TIRA ERROR
                var errorMessage = errors.join("<br>");
                document.getElementById("errorMessage").innerHTML = errorMessage;
            }
        });

        function sendDataToServer() {
            var Nombres = document.getElementById("Nombres").value;
            var email = document.getElementById("email").value;
            var telefono = document.getElementById("telefono").value;
            var fecha = document.getElementById("fecha").value;
            var hora = document.getElementById("hora").value;
            var cantidad = document.getElementById("cantidad").value;

            var formData = new FormData();
            formData.append("reservacion_name", Nombres);
            formData.append("reservacion_email", email);
            formData.append("reservacion_tel", telefono);
            formData.append("reservacion_Fecha", fecha);
            formData.append("reservacion_Hora", hora);
            formData.append("reservacion_Catpersona", cantidad);
			
			//FETCH API PARA INSERTAR LOS DATOS EN EL FORM DE PHP
            fetch("reservainsertar.php", {
                method: "POST",
                body: formData
            })
            .then(function(response) {
                if (response.ok) {
                    // SI SE TIENE EXITO, MUESTRA LO SIGUIENTE
                    document.getElementById("message").innerHTML = "Reserva realizada por " + Nombres + "<br>" +
					"Email: " + email + "<br>" +
					"Teléfono: " + telefono + "<br>" +
					"Fecha: " + fecha + "<br>" +
					"Hora: " + hora + "<br>" +
					"Cantidad de personas: " + cantidad;
					
					//retorna  la pagina principal
                    //setTimeout(function() {
                    //    window.location.href = "index.php";
                    //}, 5000);
                } else {
                    // SI FALLA, MUETSRA LO SIGUIENTE
                    document.getElementById("message").textContent = "Su reserva no pudo ser completada, favor trate nuevamente.";
                }
            })
            .catch(function(error) {
                // SI OCURRE ERROR
                document.getElementById("message").textContent = "Su reserva no pudo ser completada, favor trate nuevamente.";
            });
        }

        function isValidEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
    </script>
</body>
</html>
