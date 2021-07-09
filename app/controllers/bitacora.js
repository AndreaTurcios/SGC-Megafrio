const API_BITACORA = '../../app/api/bitacora.php?action=';
const LLENAR_ESTADO = '../../app/api/bitacora.php?action=readEstadoEquipo';
const LLENAR_SERVICIO = '../../app/api/bitacora.php?action=readTipoServicio';
const LLENAR_PAGO = '../../app/api/bitacora.php?action=readTipoPago';
const LLENAR_CLIENTE = '../../app/api/bitacora.php?action=readClientes';
const LLENAR_EMPLEADO = '../../app/api/bitacora.php?action=readEmpleados';
const LLENAR_EQUIPO = '../../app/api/bitacora.php?action=readEquipo';

document.addEventListener('DOMContentLoaded', function () {
    fillSelect(LLENAR_ESTADO,'estado_equipo',null);
    fillSelect(LLENAR_ESTADO,'estado_equipo2',null);
    fillSelect(LLENAR_SERVICIO,'tipo_servicio',null);
    fillSelect(LLENAR_SERVICIO,'tipo_servicio2',null);
    fillSelect(LLENAR_PAGO,'tipo_pago',null);
    fillSelect(LLENAR_PAGO,'tipo_pago2',null);
    fillSelect(LLENAR_CLIENTE,'cliente',null);
    fillSelect(LLENAR_CLIENTE,'cliente2',null);
    fillSelect(LLENAR_EMPLEADO,'empleado',null);
    fillSelect(LLENAR_EMPLEADO,'empleado2',null);
    fillSelect(LLENAR_EQUIPO,'equipo',null);
    fillSelect(LLENAR_EQUIPO,'equipo2',null);
    readRows(API_BITACORA);
}); 


function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                <td>${row.nombre_cli}</td>
                <td>${row.nombre_emp}</td>
                <td>${row.fecha}</td>
                <td>${row.hora}</td>
                <td>${row.tiposervicio}</td>
                <td>${row.nombre_equipo}</td>
                <td>${row.estado_equipo}</td>
                <td>${row.tipo_pago}</td>
                <td>${row.ubicacion}</td>
                <td><a href="../../resources/docs/bitacora/${row.archivo}">${row.archivo}</a></td>
                
                <td>
                
                <a href="#" onclick="openUpdateDialog(${row.id_bitacora})" class="btn"  data-bs-toggle="modal" data-bs-target="#ActualizarBitacora">Editar</a>/
                <a href="#" onclick="openDeleteDialog(${row.id_bitacora})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar">Eliminar</a>
                </td>
            </tr>
        `;
    });
 // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
 document.getElementById('tbody-rows').innerHTML = content;
}


document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    //
    saveRow(API_BITACORA, 'create', 'save-form', 'save-modal');
    document.getElementById('save-form').reset();
});

function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_bitacora', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_BITACORA, data);
}

document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_BITACORA, 'search-form');
});

function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('update-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.

    document.getElementById('archivo').required = false;

    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_bitacora', id);

    fetch(API_BITACORA + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_bitacora').value = response.dataset.id_bitacora;
                    document.getElementById('fecha2').value = response.dataset.fecha;
                    document.getElementById('hora2').value = response.dataset.hora;
                    document.getElementById('ubicacion2').value = response.dataset.ubicacion;
                    
                    fillSelect(LLENAR_ESTADO,'estado_equipo2', response.dataset.id_estado_equipo);
                    fillSelect(LLENAR_SERVICIO,'tipo_servicio2', response.dataset.id_tipo_servicio);               
                    fillSelect(LLENAR_PAGO,'tipo_pago2', response.dataset.id_tipo_pago);
                    fillSelect(LLENAR_CLIENTE,'cliente2', response.dataset.id_cliente);
                    fillSelect(LLENAR_EMPLEADO,'empleado2', response.dataset.id_empleado);
                    fillSelect(LLENAR_EQUIPO,'equipo2', response.dataset.id_equipo);
                    
                } else {
                    sweetAlert(2, response.exception, null);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}


document.getElementById('update-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    updateRow(API_BITACORA, 'update','update-form','update-modal');
});