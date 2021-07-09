// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_EQUIPO = '../../app/api/equipo.php?action=';
const ENDPOINT_PROVEEDOR = '../../app/api/equipo.php?action=readProveedor';
const ENDPOINT_TIPOEQUIPO = '../../app/api/equipo.php?action=readTipoEquipo';
const ENDPOINT_CAPACIDAD = '../../app/api/equipo.php?action=readCapacidad';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    fillSelect(ENDPOINT_PROVEEDOR,'nombre_compania', null);
    fillSelect(ENDPOINT_TIPOEQUIPO,'tipo_equipo', null);
    fillSelect(ENDPOINT_CAPACIDAD,'capacidad', null);
    readRows(API_EQUIPO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>    
                <td>${row.nombre_equipo}</td>
                <td>${row.descripcion_equipo}</td>
                <td>${row.precio_equipo}</td>
                <td>${row.modelo}</td>
                <td>${row.voltaje}</td>
                <td>${row.serie}</td>
                <td>${row.id_proveedor}</td>
                <td>${row.id_tipo_equipo}</td>
                <td>${row.id_capacidad}</td>
                <td><img src="../../resources/img/productos/${row.foto_equipo}" class="materialboxed" height="100"></td>
                <td>
                <a href="#" onclick="openUpdateDialog(${row.id_equipo})"class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</a> /
                <a href="#" onclick="openDeleteDialog(${row.id_equipo})"class="btn">Eliminar</a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_EQUIPO, 'search-form');
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se establece el campo de archivo como obligatorio.
    document.getElementById('archivo_producto').required = true;
    saveRow(API_EQUIPO, 'create', 'save-form', null);

});

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    const data = new FormData();
    data.append('id_equipo', id);
    fetch(API_EQUIPO + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {        
                document.getElementById('id_equipo2').value = response.dataset.id_equipo;
                document.getElementById('nombre_equipo2').value = response.dataset.nombre_equipo;
                document.getElementById('descripcion_equipo2').value = response.dataset.descripcion_equipo;
                document.getElementById('precio_equipo2').value = response.dataset.precio_equipo;
                document.getElementById('modelo2').value = response.dataset.modelo;
                document.getElementById('voltaje2').value = response.dataset.voltaje;
                document.getElementById('serie2').value = response.dataset.serie;
                fillSelect(ENDPOINT_PROVEEDOR,'nombre_compania2',value = response.dataset.id_proveedor);
                fillSelect(ENDPOINT_TIPOEQUIPO,'tipo_equipo2',value = response.dataset.id_tipo_equipo);
                fillSelect(ENDPOINT_CAPACIDAD,'capacidad2',value = response.dataset.id_capacidad);
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

document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('id_equipo2').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_EQUIPO, action, 'save-form', 'save-modal');
});

document.getElementById('update-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    updateRow(API_EQUIPO, 'update', 'update-form', 'update-modal');
});


// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_equipo', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_EQUIPO, data);
}