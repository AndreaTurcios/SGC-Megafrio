// Constantes para establecer las rutas y parámetros de comunicación con la API.
const API_EQUIPO = '../../app/api/equipo.php?action=';
const API_TIPO_EQUIPO = '../../app/api/tipo_equipo.php?action=';
const ENDPOINT_PROVEEDOR = '../../app/api/equipo.php?action=readProveedor';
const ENDPOINT_TIPOEQUIPO = '../../app/api/equipo.php?action=readTipoEquipo';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    fillSelectt(ENDPOINT_TIPOEQUIPO,'tipo_equipo', null);
    readRows(API_TIPO_EQUIPO);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>    
                <td>${row.tipo_equipo}</td>
                <td>
                    <a href="#" onclick="openUpdateDialog(${row.id_tipo_equipo})"class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</a> /
                    <a href="#" onclick="openDeleteDialog(${row.id_tipo_equipo})"class="btn">Eliminar</a> 
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;

     // Se inicializa la tabla con DataTable.
 let dataTable = new DataTable('#data-table', {
    labels: {
        placeholder: 'Buscar tipo equipos...',
        perPage: '{select} Tipo equipos por página',
        noRows: 'No se encontraron tipo equipos',
        info:'Mostrando {start} a {end} de {rows} equipos'
    }
});
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
    event.preventDefault();
    saveRow(API_TIPO_EQUIPO, "create", 'save-form', null);
});

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('update-form').reset();
    // Se establece el campo de archivo como opcional.
    const data = new FormData();
    data.append('id_tipo_equipo', id);
    fetch(API_TIPO_EQUIPO + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {    
                document.getElementById('id_tipo_equipo2').value = response.dataset.id_tipo_equipo;
                document.getElementById('tipo_equipo2').value = response.dataset.tipo_equipo;
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
    updateRow(API_TIPO_EQUIPO, 'update', 'update-form', 'update-modal');
});

// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_tipo_equipo2', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_TIPO_EQUIPO, data);
}