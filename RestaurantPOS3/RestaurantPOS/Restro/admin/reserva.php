
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
<body>
  
  <div class="container">
    <h2>Realizar Reserva</h2>
    <form id="reservationForm">
      <label for="firstName">Nombre:</label>
      <input type="firstName" name="firstName" id="firstName" required>
      
      <label for="lastName">Apellido:</label>
      <input type="lastName" name="lastName" id="lastName" required>
      
      <label for="email">Email:</label>
      <input type="email" name="email" id="email" required>
      
      <label for="phone">Teléfono:</label>
      <input type="phone" name="phone" id="phone" required>
      
      <label for="date">Fecha:</label>
      <input type="date" name="date" id="date" required>
      
      <label for="time">Hora:</label>
      <input type="time" name="time" id="time" required>
      
      <label for="guests">Cantidad de personas:</label>
      <input type="number" name="guests" id="guests" min="1" required>
      
      <button type="submit">Realizar Reserva</button>
    </form>
    <p id="message"></p>
    <div id="errorMessage" class="error-message"></div>
  </div>

  <script>
    document.getElementById("reservationForm").addEventListener("submit", function(event) {
      event.preventDefault();
      var firstName = document.getElementById("firstName").value;
      var lastName = document.getElementById("lastName").value;
      var email = document.getElementById("email").value;
      var phone = document.getElementById("phone").value;
      var date = document.getElementById("date").value;
      var time = document.getElementById("time").value;
      var guests = document.getElementById("guests").value;

      var reservationDateTime = new Date(date + "T" + time);
      var currentDateTime = new Date();
      
      if (reservationDateTime <= currentDateTime) {
        document.getElementById("errorMessage").textContent = "No se puede realizar la reserva para una fecha y hora pasada.";
        return;
      }
      
      var timeDiff = reservationDateTime.getTime() - currentDateTime.getTime();
      var hoursDiff = timeDiff / (1000 * 60 * 60);
      
      if (hoursDiff < 2 && reservationDateTime.getDate() === currentDateTime.getDate()) {
        document.getElementById("errorMessage").textContent = "Debe haber al menos 2 horas de anticipación para hacer una reserva en el mismo día.";
        return;
      }
      
      var message = "Reserva realizada por " + firstName + " " + lastName + "<br>" +
                    "Email: " + email + "<br>" +
                    "Teléfono: " + phone + "<br>" +
                    "Fecha: " + date + "<br>" +
                    "Hora: " + time + "<br>" +
                    "Cantidad de personas: " + guests;
                    
      document.getElementById("message").innerHTML = message;
      document.getElementById("errorMessage").textContent = "";
    });
  </script>
  
</body>
</html>

