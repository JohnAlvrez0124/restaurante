// Obtener la referencia a la tabla
const productTable = document.getElementById("productTable");

// Función para cargar los productos disponibles usando PHP
function loadProducts() {
  fetch("get_products.php")
    .then(response => response.json())
    .then(products => {
      // Limpiar la tabla antes de cargar los nuevos datos
      productTable.getElementsByTagName("tbody")[0].innerHTML = "";

      // Recorrer los productos y agregarlos a la tabla
      products.forEach(product => {
        const row = document.createElement("tr");
        row.innerHTML = `
          <td>${product.id}</td>
          <td>${product.nombre}</td>
          <td>${product.precio}</td>
          <td>${product.stock}</td>
        `;
        productTable.getElementsByTagName("tbody")[0].appendChild(row);
      });
    })
    .catch(error => {
      console.error("Error al cargar los productos:", error);
    });
}

// Cargar los productos al cargar la página
window.addEventListener("load", loadProducts);
