// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PROVEEDOR = '../../app/api/proveedor.php?action=';
const ENDPOINT_PAIS = '../../app/api/pais.php?action=readAll';

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    fillSelect(ENDPOINT_PAIS,'id_pais',null)
    readRows(API_PROVEEDOR);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
    // Se crean y concatenan las filas de la tabla con los datos de cada registro.
    content += `
    <tr>  
        <td>${row.nombre_compania}</td>
        <td>${row.telefono_pro}</td>
        <td>${row.direccion_pro}</td>
        <td>${row.nombre_pais}</td>
        <td>${row.codigo_postal}</td>
        <td>${row.info_tributaria}</td>
        <td>
            <a href="../../app/reports/proveedor.php?id=${row.id_proveedor}"class="btn" data-tooltip="Reporte">Reporte</a> /
            <a href="#" onclick="openUpdateDialog(${row.id_proveedor})" class="btn" data-bs-toggle="modal"
                data-bs-target="#exampleModal">Editar</a> /
            <a href="#" onclick="openDeleteDialog(${row.id_proveedor})" class="btn">Eliminar</a>
        </td>
    </tr>
    `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
    //M.Tooltip.init(document.querySelectorAll('.tooltipped'));
    }
    // Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
    document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_PROVEEDOR, 'search-form');
    });

    // Función para preparar el formulario al momento de modificar un registro.
    function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('update-form').reset();
    const data = new FormData();
    data.append('id_proveedor', id);
    fetch(API_PROVEEDOR + 'readOne', {
    method: 'post',
    body: data
    }).then(function (request) {
    // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
    if (request.ok) {
    request.json().then(function (response) {
    // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
    if (response.status) {
    document.getElementById('id_proveedor2').value = response.dataset.id_proveedor;
    document.getElementById('nombre_compania2').value = response.dataset.nombre_compania;
    document.getElementById('telefono_pro2').value = response.dataset.telefono_pro;
    document.getElementById('direccion_pro2').value = response.dataset.direccion_pro;
    document.getElementById('info_tributaria2').value = response.dataset.info_tributaria;
    fillSelect(ENDPOINT_PAIS,'id_pais2',value = response.dataset.id_pais);
    } else {
    // En caso contrario nos envia este mensaje
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


    // Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
    document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.

    saveRow(API_PROVEEDOR, "create", 'save-form', null);
    document.getElementById('save-form').reset();
    });

    document.getElementById('update-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    updateRow(API_PROVEEDOR, 'update', 'update-form', 'update-modal');
    });


    function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_proveedor', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PROVEEDOR, data);
    }


