// Constante para establecer la ruta y parámetros de comunicación con la API.

const API_EMPLEADOSS = '../../app/api/empleados.php?action=';
const API_CLIENTESS = '../../app/api/clientes.php?action=';
const API_PROVEEDORESS = '../../app/api/proveedor.php?action=';
const API_EQUIPOSS = '../../app/api/equipo.php?action=';

// Método manejador de eventos que se ejecuta cuando el documento ha cargado.
document.addEventListener('DOMContentLoaded', function () {
    // Se declara e inicializa un objeto con la fecha y hora actual.
    let today = new Date();
    // Se declara e inicializa una variable con el número de horas transcurridas en el día.
    let hour = today.getHours();
    // Se declara e inicializa una variable para guardar un saludo.
    let greeting = '';
    // Dependiendo del número de horas transcurridas en el día, se asigna un saludo para el usuario.
    if (hour < 12) {
        greeting = 'Buenos días';
    } else if (hour < 19) {
        greeting = 'Buenas tardes';
    } else if (hour <= 23) {
        greeting = 'Buenas noches';
    }
    // Se muestra el saludo en la página web.
    document.getElementById('greeting').textContent = greeting;
    // Se llaman a la funciones que muestran las gráficas en la página web.
    graficaEstadoEmpleado();
    graficaProveedor(); 
    graficaBarrasEquipo()
    graficaTopEmpleados()
    graficaTipoEquipo()
    graficaClientesPago()
    graficaCapacidadEquipo()
});


function graficaEstadoEmpleado() {
    fetch(API_EMPLEADOSS + 'estadoEmpleadoR', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let estado = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        var l = '';
                        if(row.estado){l='Activos'} else{l='Bloqueados'}
                        estado.push( l);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de pastel en porcentajes. Se encuentra en el archivo components.js
                   // pieGraph('chart5',['inactivos','activos'], cantidad, 'Porcentaje de empleados por estado' );
                   donutGraph('empleadosR',estado, cantidad, 'Porcentaje de empleados por estado' );
                } else {
                    document.getElementById('empleadosR').remove();
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
    }

    function graficaProveedor() {
        fetch(API_PROVEEDORESS + 'Reporte', {
            method: 'get'
        }).then(function (request) {
            // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
            if (request.ok) {
                request.json().then(function (response) {
                    // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                    if (response.status) {
                        // Se declaran los arreglos para guardar los datos por gráficar.
                        let nombre_pais = [];
                        let cantidad = [];
                        // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                        response.dataset.map(function (row) {
                            // Se asignan los datos a los arreglos.
                            nombre_pais.push(row.nombre_pais);
                            cantidad.push(row.cantidad);
                        });
                        // Se llama a la función que genera y muestra una gráfica de pastel en porcentajes. Se encuentra en el archivo components.js
                       // pieGraph('chart5',['inactivos','activos'], cantidad, 'Porcentaje de empleados por estado' );
                       lineGraph('ProveedoreG',nombre_pais, cantidad, 'Proveedores por país', 'Top 10 de proveedores por país' );
                    } else {
                        document.getElementById('ProveedoreG').remove();
                        console.log(response.exception);
                    }
                });
            } else {
                console.log(request.status + ' ' + request.statusText);
            }
        }).catch(function (error) {
            console.log(error);
        });
}

function graficaClientesPago() {
    fetch(API_CLIENTESS + 'cantidadClientesPago', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let estado = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        estado.push(row.estado_pago);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                    donutGraph('chartClientePago', estado, cantidad, 'Porcentaje de clientes', 'Cantidad de clientes con sus estados de pago');
                } else {
                    document.getElementById('chartClientePago').remove();
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

function graficaCapacidadEquipo() {
    fetch(API_EQUIPOSS + 'cantidadEquiposCapacidad', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let capacidad = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        capacidad.push(row.capacidad);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                    barGraph('chartEquipoCapacidad', capacidad, cantidad, 'Cantidad de equipos por capacidad', 'Top 3 de capacidades por cantidad equipos');
                } else {
                    document.getElementById('chartEquipoCapacidad').remove();
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}



function graficaTipoEquipo() {
    fetch(API_EQUIPOSS + 'cantidadEquiposTipo', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let tipo = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        tipo.push(row.tipo_equipo);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                    barGraph('chartEquipoTipo', tipo, cantidad, 'Cantidad de equipos por tipo', 'Top 3 de equipos por tipo de equipo');
                } else {
                    document.getElementById('chartEquipoTipo').remove();
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Función para mostrar la cantidad de productos por categoría en una gráfica de barras.
function graficaBarrasEquipo() {
    fetch(API_PROVEEDORESS + 'cantidadEquiposProveedores', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let proveedor = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        proveedor.push(row.nombre_compania);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                    barGraph('chartEquipoPro', proveedor, cantidad, 'Cantidad de equipos', 'Top 5 proveedores con más equipos instalados');
                } else {
                    document.getElementById('chartEquipoPro').remove();
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}

// Función para mostrar la cantidad de empleados con mas tareas finalizadas.
function graficaTopEmpleados() {
    fetch(API_EMPLEADOSS + 'topEmpleados', {
        method: 'get'
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se remueve la etiqueta canvas de la gráfica.
                if (response.status) {
                    // Se declaran los arreglos para guardar los datos por gráficar.
                    let usuario = [];
                    let cantidad = [];
                    // Se recorre el conjunto de registros devuelto por la API (dataset) fila por fila a través del objeto row.
                    response.dataset.map(function (row) {
                        // Se asignan los datos a los arreglos.
                        usuario.push(row.nombre_usuario);
                        cantidad.push(row.cantidad);
                    });
                    // Se llama a la función que genera y muestra una gráfica de barras. Se encuentra en el archivo components.js
                    barGraph('chartTopEmpleados', usuario, cantidad, 'Cantidad de tareas', 'Top 3 de empleados con más tareas finalizadas');
                } else {
                    document.getElementById('chartTopEmpleados').remove();
                    console.log(response.exception);
                }
            });
        } else {
            console.log(request.status + ' ' + request.statusText);
        }
    }).catch(function (error) {
        console.log(error);
    });
}