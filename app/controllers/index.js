const API_EMPLEADOSS = '../../app/api/empleados.php?action=';
const API_PROVEEDORESS = '../../app/api/proveedor.php?action=';
graficaEstadoEmpleado();
graficaProveedor();

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
                       barGraph('ProveedoreG',nombre_pais, cantidad, 'Proveedores por país', 'Top 10 de proveedores por país' );
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