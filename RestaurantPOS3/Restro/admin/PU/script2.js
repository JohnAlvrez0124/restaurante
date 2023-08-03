// script2.js
document.addEventListener('DOMContentLoaded', function() {
  const menu = document.getElementById('menu');
  const pedido = document.getElementById('pedido');
  const totalPagar = document.getElementById('total');
  const buscarBtn = document.getElementById('buscar');
  const pagarBtn = document.getElementById('pagar');
  const mensaje = document.getElementById('mensaje');
  const tablaCliente = document.getElementById('tablaCliente');
  const buscarClienteBtn = document.getElementById('buscarInfoCliente');
  const nombreEmpleado = document.getElementById('nombreEmpleado');
  const fechaHora = document.getElementById('fechaHora');
  const nombreCliente = document.getElementById('nombreCliente');

  let total = 0;
  let clienteId = 1; // ID del cliente actual
  let empleadoNombre = ''; // Nombre del empleado actual

  menu.addEventListener('click', agregarAlPedido);
  buscarBtn.addEventListener('click', buscarComida);
  pagarBtn.addEventListener('click', realizarPago);
  buscarClienteBtn.addEventListener('click', buscarInfoCliente);
  document.getElementById('fondoPredeterminado').addEventListener('click', cambiarFondoPredeterminado);
  document.getElementById('fondo1').addEventListener('click', cambiarFondo1);
  document.getElementById('fondo2').addEventListener('click', cambiarFondo2);

  mostrarFechaHora();

  function agregarAlPedido(e) {
    if (e.target.tagName === 'LI') {
      const nombre = e.target.dataset.nombre;
      const precio = parseFloat(e.target.dataset.precio);
      const descripcion = e.target.dataset.descripcion;

      const listItem = document.createElement('li');
      listItem.textContent = `${nombre} - $${precio}`;
      pedido.appendChild(listItem);

      const comentario = document.createElement('p');
      comentario.textContent = `Descripción: ${descripcion}`;
      pedido.appendChild(comentario);

      total += precio;
      totalPagar.textContent = `Total: $${total.toFixed(2)}`;
    }
  }

  function buscarComida() {
    const id = document.getElementById('id').value;
    const comida = menu.querySelector(`li[data-id="${id}"]`);

    if (comida) {
      const nombre = comida.dataset.nombre;
      const precio = parseFloat(comida.dataset.precio);
      const descripcion = comida.dataset.descripcion;

      const listItem = document.createElement('li');
      listItem.textContent = `${nombre} - $${precio}`;
      pedido.appendChild(listItem);

      const comentario = document.createElement('p');
      comentario.textContent = `Descripción: ${descripcion}`;
      pedido.appendChild(comentario);

      total += precio;
      totalPagar.textContent = `Total: $${total.toFixed(2)}`;

      document.getElementById('id').value = '';
    } else {
      alert('No se encontró ninguna comida con ese ID.');
    }
  }

  function realizarPago() {
    const nombre = nombreCliente.value;
    if (nombre === '') {
      alert('Ingrese el nombre del cliente');
      return;
    }

    mensaje.textContent = `¡Pago realizado! Total: $${total.toFixed(2)}.`;
    mensaje.style.color = '#4caf50';

    total = 0;
    pedido.innerHTML = '';
    totalPagar.textContent = 'Total: $0';

    // Actualizar tabla de información del cliente
    const cliente = tablaCliente.querySelector(`tr[data-id="${clienteId}"]`);
    if (cliente) {
      const visitas = parseInt(cliente.children[2].textContent) + 1;
      cliente.children[2].textContent = visitas;
    } else {
      const newRow = document.createElement('tr');
      newRow.setAttribute('data-id', clienteId);
      newRow.innerHTML = `
        <td>${clienteId}</td>
        <td>${nombre}</td>
        <td>1</td>
      `;
      tablaCliente.appendChild(newRow);
    }
    clienteId++;

    setTimeout(() => {
      mensaje.textContent = '';
    }, 3000);
  }

  function buscarInfoCliente() {
    const id = document.getElementById('buscarCliente').value;
    const cliente = tablaCliente.querySelector(`tr[data-id="${id}"]`);

    if (cliente) {
      const nombre = cliente.children[1].textContent;
      nombreCliente.value = nombre;
    } else {
      alert('No se encontró ningún cliente con ese ID.');
    }
  }

  function cambiarFondoPredeterminado() {
    document.body.style.backgroundImage = 'url("predeterminado.jpg")';
  }

  function cambiarFondo1() {
    document.body.style.backgroundImage = 'url("")';
  }

  function cambiarFondo2() {
    document.body.style.backgroundImage = 'url("fondo2.jpg")';
  }

  function mostrarFechaHora() {
    const fecha = new Date();
    const options = { year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
    fechaHora.textContent = fecha.toLocaleDateString('es-ES', options);
  }

  // Simulación de inicio de sesión del empleado
  const empleadoId = Math.floor(Math.random() * 1000); // ID de empleado aleatorio
  empleadoNombre = `Empleado ${empleadoId}`;
  nombreEmpleado.textContent = `Empleado: ${empleadoNombre}`;
});







