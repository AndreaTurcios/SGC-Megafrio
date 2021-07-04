const API_CLIENTE = '../../app/api/clientes.php?action=';
const ENDPOINT_CLIENTE = '../../app/api/clientes.php?action=readEstados';

document.addEventListener('DOMContentLoaded', function () {
    //Se llama a la funcion que obtiene los registros para llenar la tabla.
    fillSelect(ENDPOINT_CLIENTE,'estado_pago',null)
    readRows(API_CLIENTE);
}); 


function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <tr>
                
                <td>${row.nombre_cli}</td>
                <td>${row.telefono_cli}</td>
                <td>${row.nit_cli}</td>
                <td>${row.dui_cli}</td>
                <td>${row.direccion_cli}</td>
                <td>${row.correo_cli}</td>
                <td>${row.estado_pago}</td>
                
                <td>
                <a href="#" onclick="openUpdateDialog(${row.id_cliente})" class="btn waves-effect blue tooltipped"  data-bs-toggle="modal" data-bs-target="#ModalAgregarCliente"  data-tooltip="Actualizar">Editar</a>
                    <a href="#" onclick="openDeleteDialog(${row.id_cliente})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar">Eliminar</a>
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
    searchRows(API_CLIENTE, 'search-form');
});


function openCreateDialog() {

    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Crear producto';
    // Se llama a la función que llena el select del formulario. Se encuentra en el archivo components.js
    fillSelect(ENDPOINT_CLIENTE, 'estado_pago', null);
}


function openUpdateDialog(id) {


        // Se restauran los elementos del formulario.
        document.getElementById('save-form').reset();

        // Se asigna el título para la caja de dialogo (modal).
        document.getElementById('modal-title').textContent = 'Actualizar producto';
        
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_cliente', id);

    fetch(API_CLIENTE + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('id_cliente').value = response.dataset.id_cliente;
                    document.getElementById('nombre_cli').value = response.dataset.nombre_cli;
                    document.getElementById('telefono_cli').value = response.dataset.telefono_cli;
                    document.getElementById('dui_cli').value = response.dataset.dui_cli;
                    document.getElementById('nit_cli').value = response.dataset.nit_cli;
                    document.getElementById('direccion_cli').value = response.dataset.direccion_cli;
                    document.getElementById('correo_cli').value = response.dataset.correo_cli;
                    fillSelect(ENDPOINT_CLIENTE, 'estado_pago', response.dataset.id_estado_pago);                    
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

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('id_cliente').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_CLIENTE, action, 'save-form', 'save-modal');
});



// Función para establecer el registro a eliminar y abrir una caja de dialogo de confirmación.
function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_cliente', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_CLIENTE, data);
}


