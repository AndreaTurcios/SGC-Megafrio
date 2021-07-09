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
                <td>${row.archivo}</td>
                
                <td>
                
                <a href="#" onclick="openUpdateDialog(${row.id_bitacora})" class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal">Actualizar /</a>
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
});
