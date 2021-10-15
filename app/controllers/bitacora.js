const API_BITACORA = '../../app/api/bitacora.php?action=';
const LLENAR_ESTADO = '../../app/api/bitacora.php?action=readEstadoEquipo';
const LLENAR_SERVICIO = '../../app/api/bitacora.php?action=readTipoServicio';
const LLENAR_PAGO = '../../app/api/bitacora.php?action=readTipoPago';
const LLENAR_CLIENTE = '../../app/api/bitacora.php?action=readClientes';
const LLENAR_EMPLEADO = '../../app/api/bitacora.php?action=readEmpleados';
const LLENAR_EQUIPO = '../../app/api/bitacora.php?action=readEquipo';

document.addEventListener('DOMContentLoaded', function () {

    readRows(API_BITACORA);

});

function openCreateDialog() {
    // Se restauran los elementos del formulario.
    document.getElementById('save-form').reset();
    fillSelect(LLENAR_ESTADO, 'estado_equipo', null);
    fillSelect(LLENAR_SERVICIO, 'tipo_servicio', null);
    fillSelect(LLENAR_PAGO, 'tipo_pago', null);

    let formElement = document.getElementById('save-form');
    formData = new FormData(formElement);

    //LLENAR CLIENTE
    fetch(LLENAR_CLIENTE, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let data = [];
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    const field = document.getElementById('cliente');
                    const ac = new Autocomplete(field, {
                        maximumItems: 5,
                        treshold: 1,
                        onSelectItem: ({ label, value }) => {
                            console.log("user selected:", label, value);
                            document.getElementById('id_cliente').value = value;
                        }
                    });
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {  
                        data.push({'label':row.nombre_cli,'value':row.id_cliente});
                    });
                    
                    ac.setData(data);

                } else {
                    document.getElementById('cliente').placeholder = 'No hay clientes registrados...';
                }
              
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });

    //LLENAR EMPLEADO
    fetch(LLENAR_EMPLEADO, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let data = [];
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    const field = document.getElementById('empleado');
                    const ac = new Autocomplete(field, {
                        maximumItems: 5,
                        treshold: 1,
                        onSelectItem: ({ label, value }) => {
                            console.log("user selected:", label, value);
                            document.getElementById('id_empleado').value = value;
                        }
                    });
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {  
                        data.push({'label':row.completo,'value':row.id_empleado});
                    });
                    
                    ac.setData(data);

                } else {
                    document.getElementById('cliente').placeholder = 'No hay empleado registrados...';
                }
              
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });

    //LENAR EQUIPOS
    fetch(LLENAR_EQUIPO, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let data = [];
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    const field = document.getElementById('equipo');
                    const ac = new Autocomplete(field, {
                        maximumItems: 5,
                        treshold: 1,
                        onSelectItem: ({ label, value }) => {
                            console.log("selected:", label, value);
                            document.getElementById('id_equipo').value = value;
                        }
                    });
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {  
                        data.push({'label':row.nombre_equipo,'value':row.id_equipo});
                    });
                    
                    ac.setData(data);

                } else {
                    document.getElementById('cliente').placeholder = 'No hay clientes registrados...';
                }
              
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

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
                    <a href="../../app/reports/bitacora.php?id=${row.id_bitacora}"class="btn" data-tooltip="Reporte">Reporte</a> /
                    <a href="#" onclick="openUpdateDialog(${row.id_bitacora})" class="btn"  data-bs-toggle="modal" data-bs-target="#ActualizarBitacora">Editar</a>/
                    <a href="#" onclick="openDeleteDialog(${row.id_bitacora})" class="btn waves-effect red tooltipped" data-tooltip="Eliminar">Eliminar</a>
                </td>
            </tr>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('tbody-rows').innerHTML = content;

     // Se inicializa la tabla con DataTable.
 let dataTable = new DataTable('#data-table', {
    labels: {
        placeholder: 'Buscar bitácotas...',
        perPage: '{select} bitácotas por página',
        noRows: 'No se encontraron bitácotas',
        info:'Mostrando {start} a {end} de {rows} bitácotas'
    }
});

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
                    document.getElementById('cliente2').value = response.dataset.nombre_cli;
                    document.getElementById('empleado2').value = response.dataset.nombre_emp;
                    document.getElementById('equipo2').value = response.dataset.nombre_equipo;
                    document.getElementById('id_cliente2').value = response.dataset.id_cliente;
                    document.getElementById('id_empleado2').value = response.dataset.id_empleado;
                    document.getElementById('id_equipo2').value = response.dataset.id_equipo;

                    fillSelect(LLENAR_ESTADO, 'estado_equipo2', response.dataset.id_estado_equipo);
                    fillSelect(LLENAR_SERVICIO, 'tipo_servicio2', response.dataset.id_tipo_servicio);
                    fillSelect(LLENAR_PAGO, 'tipo_pago2', response.dataset.id_tipo_pago);

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

    let formElement = document.getElementById('update-form');
    formData = new FormData(formElement);

    //LLENAR CLIENTE
    fetch(LLENAR_CLIENTE, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let data = [];
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    const field = document.getElementById('cliente2');
                    const ac = new Autocomplete(field, {
                        maximumItems: 5,
                        treshold: 1,
                        onSelectItem: ({ label, value }) => {
                            console.log("user selected:", label, value);
                            document.getElementById('id_cliente2').value = value;
                        }
                    });
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {  
                        data.push({'label':row.nombre_cli,'value':row.id_cliente});
                    });
                    
                    ac.setData(data);

                } else {
                    document.getElementById('cliente2').placeholder = 'No hay clientes registrados...';
                }
              
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });

    //LLENAR EMPLEADO
    fetch(LLENAR_EMPLEADO, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let data = [];
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    const field = document.getElementById('empleado2');
                    const ac = new Autocomplete(field, {
                        maximumItems: 5,
                        treshold: 1,
                        onSelectItem: ({ label, value }) => {
                            console.log("user selected:", label, value);
                            document.getElementById('id_empleado2').value = value;
                        }
                    });
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {  
                        data.push({'label':row.completo,'value':row.id_empleado});
                    });
                    
                    ac.setData(data);

                } else {
                    document.getElementById('empleado2').placeholder = 'No hay empleado registrados...';
                }
              
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });

    //LENAR EQUIPOS
    fetch(LLENAR_EQUIPO, {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                let data = [];
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    const field = document.getElementById('equipo2');
                    const ac = new Autocomplete(field, {
                        maximumItems: 5,
                        treshold: 1,
                        onSelectItem: ({ label, value }) => {
                            console.log("selected:", label, value);
                            document.getElementById('id_equipo2').value = value;
                        }
                    });
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {  
                        data.push({'label':row.nombre_equipo,'value':row.id_equipo});
                    });
                    
                    ac.setData(data);

                } else {
                    document.getElementById('equipo2').placeholder = 'No hay clientes registrados...';
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
    updateRow(API_BITACORA, 'update', 'update-form', 'update-modal');
});