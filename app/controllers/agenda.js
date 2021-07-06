// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_AGENDA = '../../app/api/agenda.php?action=';
const ENDPOINT_CLIENTES = '../../app/api/agenda.php?action=readClientes';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_AGENDA);

    // Se declara e inicializa un objeto para obtener la fecha y hora actual.
    let today = new Date();
    // Se declara e inicializa una variable para guardar el día en formato de 2 dígitos.
    let day = ('0' + today.getDate()).slice(-2);
    // Se declara e inicializa una variable para guardar el mes en formato de 2 dígitos.
    var month = ('0' + (today.getMonth() + 1)).slice(-2);
    // Se declara e inicializa una variable para guardar el año con la mayoría de edad.
    let year = today.getFullYear();
    // Se declara e inicializa una variable para establecer el formato de la fecha.
    let date = `${year}-${month}-${day}`;

    document.getElementById('fecha_actual').setAttribute('min', date);
    document.getElementById('fecha_pro').setAttribute('min', date);
    document.getElementById('fecha_nal').setAttribute('min', date);
    fillSelect(ENDPOINT_CLIENTES, 'cli-select', null);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre_cli}</td>
                <td>${row.nombre_usuario}</td>
                <td>${row.fecha_programacion}</td>
                <td>${row.hora_programacion}</td>
                <td>${row.fecha_provisicional}</td>
                <td>${row.hora_provisicional}</td>
                <td>${row.tarea}</td>
                <td>${row.estado_tarea}</td>
                <td>${row.observaciones}</td>
                <td><i class="material-icons">${icon}</i></td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_agenda})" class="btn waves-effect blue tooltipped" data-tooltip="Actualizar"><i class="material-icons">mode_edit</i></a>
                    <a href="#" onclick="openDeleteDialog(${row.id_agenda})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar"><i class="material-icons">delete</i></a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    
    saveRow(API_AGENDA, 'create', 'save-form', null);
    document.getElementById('save-form').reset();
});
