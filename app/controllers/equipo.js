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
                <td>${row.nombre_compania}</td>
                <td>${row.tipo_equipo}</td>
                <td>${row.capacidad}</td>
                <td><img src="../../resources/img/productos/${row.foto_equipo}" class="materialboxed" height="100"></td>
                <td>
                    <a href="../../app/reports/equipo.php?id=${row.id_equipo}"class="btn" data-tooltip="Reporte">Reporte</a> /
                    <a href="#" onclick="openUpdateDialog(${row.id_equipo})"class="btn"  data-bs-toggle="modal" data-bs-target="#exampleModal">Editar</a> /
                    <a href="#" onclick="openDeleteDialog(${row.id_equipo})"class="btn">Eliminar</a> / 
                    <a href="#" onclick="openChart(${row.id_equipo})" class="btn" data-bs-toggle="modal" data-bs-target="#graficosEquipo">Generar gráfico</a>
                    <a href="#" onclick="openChartEquip(${row.id_equipo})" class="btn" data-bs-toggle="modal" data-bs-target="#graficosEquip">Gráfico</a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;

     // Se inicializa la tabla con DataTable.
 let dataTable = new DataTable('#data-table', {
    labels: {
        placeholder: 'Buscar clientes...',
        perPage: '{select} clientes por página',
        noRows: 'No se encontraron clientes',
        info:'Mostrando {start} a {end} de {rows} clientes'
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
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    // Se establece el campo de archivo como obligatorio.
    document.getElementById('archivo_producto').required = true;
    saveRow(API_EQUIPO, 'create', 'save-form', null);

});

// Función para preparar el formulario al momento de modificar un registro.
function openUpdateDialog(id) {
    // Se restauran los elementos del formulario.
    document.getElementById('update-form').reset();
    // Se establece el campo de archivo como opcional.
    document.getElementById('archivo_producto').required = false;
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

function openChart(id){
    
   

    const data = new FormData();
    data.append('idEquipo', id);
    fetch(API_EQUIPO + 'readOneGraf', {
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('idEquipo').value = response.dataset.id_equipo;
                    fetch(API_EQUIPO + 'cantidadEquiposFuncionales', {
                        method: 'post',
                        body: data
                    }).then(function (request) {
                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                        if (request.ok) {
                            request.json().then(function (response) {
                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                                if (response.status) {                    
                                    // Se declaran los arreglos para guardar los datos por gráficar.        
                                    let nombre_equipo = [];            
                                    let estado_equipo = [];
                                    let cantidad = [];
                                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                                    response.dataset.map(function (row) {
                                        // Se asignan los datos a los arreglos.
                                        nombre_equipo.push(row.nombre_equipo);
                                        estado_equipo.push(row.estado_equipo);
                                        cantidad.push(row.cantidad);
                                    });
                                    // Se llama a la función que genera y muestra una gráfica de pastel en porcentajes. Se encuentra en el archivo components.js
                                    barGraph('chartEquipo', estado_equipo, cantidad, 'Cantidad de unidades:', 'Cantidad de unidades funcionales y no funcionales de ' + nombre_equipo);
                                } else {
                                    document.getElementById('chartEquipo').remove();
                                    console.log(response.exception);
                                }
                            });
                        } else {
                            console.log(request.status + ' ' + request.statusText);
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
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

function openChartEquip(id){
    const data = new FormData();
    data.append('idequi', id);
    fetch(API_EQUIPO + 'readOneGrafEqui', {   
        method: 'post',
        body: data
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) { 
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    // Se inicializan los campos del formulario con los datos del registro seleccionado.
                    document.getElementById('idequi').value = response.dataset.id_equipo;
                    fetch(API_EQUIPO + 'cantidadEquiposCapacidad2', {
                        method: 'post',
                        body: data
                    }).then(function (request) {
                        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
                        if (request.ok) {
                            request.json().then(function (response) {
                                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                                if (response.status) {                    
                                    // Se declaran los arreglos para guardar los datos por gráficar.                    
                                    let tiposervicio = [];
                                    let cantidad = [];
                                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                                    response.dataset.map(function (row) {
                                        // Se asignan los datos a los arreglos.
                                        tiposervicio.push(row.tiposervicio);
                                        cantidad.push(row.cantidad);        
                                    });
                                    // Se llama a la función que genera y muestra una gráfica de pastel en porcentajes. Se encuentra en el archivo components.js
                                    pieGraph('chartEqui', tiposervicio, cantidad, 'Cantidad de equipos:', 'Cantidad de equipos por tipo de servicio');
                                } else {
                                    document.getElementById('chartEqui').remove();
                                    console.log(response.exception);
                                }
                            });
                        } else {
                            console.log(request.status + ' ' + request.statusText);
                        }
                    }).catch(function (error) {
                        console.log(error);
                    });
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