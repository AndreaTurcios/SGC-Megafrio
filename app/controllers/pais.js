// Constante para establecer la ruta y parámetros de comunicación con la API.
const API_PAIS = '../../app/api/pais.php?action=';

document.addEventListener('DOMContentLoaded', function () {
    // Se llama a la función que obtiene los registros para llenar la tabla. Se encuentra en el archivo components.js
    readRows(API_PAIS);
});

// Función para llenar la tabla con los datos de los registros. Se manda a llamar en la función readRows().
function fillTable(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
        <tr>            
        <td>${row.nombre_pais}</td>
        <td>${row.codigo_postal}</td>   
        <td>
            <a href="../../app/reports/paises.php?id=${row.id_pais}"class="btn" data-tooltip="Reporte">Reporte</a> /
            <a href="#" onclick="openUpdateDialog(${row.id_pais})"class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</a> /
            <a href="#" onclick="openDeleteDialog(${row.id_pais})"class="btn">Eliminar</a>
        </td>
    </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;
    
    // Se inicializa la tabla con DataTable.
    let dataTable = new DataTable('#data-table', {
        labels: {
            placeholder: 'Buscar países...',
            perPage: '{select} Países por página',
            noRows: 'No se encontraron países',
            info: 'Mostrando {start} a {end} de {rows} países'
        }
    });
}
// Método manejador de eventos que se ejecuta cuando se envía el formulario de buscar.
document.getElementById('search-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se llama a la función que realiza la búsqueda. Se encuentra en el archivo components.js
    searchRows(API_PAIS, 'search-form');
});

// Método manejador de eventos que se ejecuta cuando se envía el formulario de guardar.
document.getElementById('save-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();

    saveRow(API_PAIS, 'create', 'save-form', null);
    document.getElementById('save-form').reset();
});


// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    const data = new FormData();
    data.append('id_pais', id);
    fetch(API_PAIS + 'readOne', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    document.getElementById('id_pais2').value = response.dataset.id_pais;
                    document.getElementById('nombre_pais2').value = response.dataset.nombre_pais;
                    document.getElementById('codigo_postal2').value = response.dataset.codigo_postal;
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
    updateRow(API_PAIS, 'update', 'update-form', 'update-modal');
});






function openDeleteDialog(id) {
    // Se define un objeto con los datos del registro seleccionado.
    const data = new FormData();
    data.append('id_pais', id);
    // Se llama a la función que elimina un registro. Se encuentra en el archivo components.js
    confirmDelete(API_PAIS, data);
}

