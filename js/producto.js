// Script para rellenar el formulario con datos del producto a editar
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.has('edit')) {
    const id = urlParams.get('edit');
    fetch(`producto.php?get=${id}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('id').value = data.id;
            document.getElementById('nombre').value = data.nombre;
            document.getElementById('descripcion').value = data.descripcion;
            document.getElementById('precio').value = data.precio;
            document.getElementById('stock').value = data.stock;
            document.getElementById('destacado').checked = data.destacado;
        });
}