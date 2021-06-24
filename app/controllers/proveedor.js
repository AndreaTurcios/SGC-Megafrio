// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PROVEEDOR = '../../app/api/proveedor.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
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
        <td>${row.id_proveedor}</td>            
        <td>${row.nombre_compania}</td>
        <td>${row.telefono_pro}</td>
        <td>${row.direccion_pro}</td>
        <td>${row.id_pais}</td>   
        <td>
            <a href="#" onclick="openUpdateDialog(${row.id_proveedor})">Editar</a>/
            <a href="#" onclick="openDeleteDialog(${row.id_proveedor})">Eliminar</a>
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
// Función para preparar el formulario al momento de insertar un registro.
function openCreateDialog() {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Crear empleado';
    // Se establece el campo de archivo como obligatorio.
}

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    // Se abre la caja de dialogo (modal) que contiene el formulario.
    let instance = M.Modal.getInstance(document.getElementById('save-modal'));
    instance.open();
    // Se asigna el título para la caja de dialogo (modal).
    document.getElementById('modal-title').textContent = 'Actualizar empleado';

    // Se define un objeto con los datos del registro seleccionado.
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
                    document.getElementById('id_proveedor').value = response.dataset.id_proveedor;
                    document.getElementById('nombre_compania').value = response.dataset.nombre_compania;
                    document.getElementById('telefono_pro').value = response.dataset.telefono_pro;
                    document.getElementById('direccion_pro').value = response.dataset.direccion_pro;
                    document.getElementById('id_pais').value = response.dataset.id_pais;
                   
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

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se define una variable para establecer la acción a realizar en la API.
    let action = '';
    // Se comprueba si el campo oculto del formulario esta seteado para actualizar, de lo contrario será para crear.
    if (document.getElementById('id_proveedor').value) {
        action = 'update';
    } else {
        action = 'create';
    }
    saveRow(API_PROVEEDOR, action, 'save-form', 'save-modal');
});

function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_proveedor', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PROVEEDOR, data);
}