// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_AGENDA = '../../app/api/agenda.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_AGENDA);

    // Se declara e inicializa un objeto para obtener la fecha y hora actual.
    let today = new Date();

    document.getElementById('fecha_actual').setAttribute('max', today);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre_producto}</td>
                <td>${row.nombre_producto}</td>
                <td>${row.precio_producto}</td>
                <td>${row.nombre_categoria}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_producto})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_producto})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
}