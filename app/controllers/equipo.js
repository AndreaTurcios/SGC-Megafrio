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
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar producto';
    // Se establece el campo de archivo como opcional.
    document.getElementById('archivo_producto').required = false;

    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_producto', id);

    fetch(API_PRODUCTOS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_producto').value = response.dataset.id_producto;
                    document.getElementById('nombre_producto').value = response.dataset.nombre_producto;
                    document.getElementById('precio_producto').value = response.dataset.precio_producto;
                    document.getElementById('descripcion_producto').value = response.dataset.descripcion_producto;
                    fillSelect(ENDPOINT_CATEGORIAS, 'categoria_producto', response.dataset.id_categoria);
                    if (response.dataset.estado_producto) {
                        document.getElementById('estado_producto').checked = true;
                    } else {
                        document.getElementById('estado_producto').checked = false;
                    }
                    // Se actualizan los campos para que las etiquetas (labels) no queden sobre los datos.
                    M.updateTextFields();
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

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_equipo', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_EQUIPO, data);
}