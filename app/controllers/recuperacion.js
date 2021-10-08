// Constante para establecer la ruta y parámetros de comunicación con la API.
const API = '../../app/api/recuperacion.php?action=';

// Método manejador de eventos que se ejecuta cuando se envía el correo de recuperación.
document.getElementById('recuperacion-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    fetch(API + 'recover', {
        method: 'post',
        body: new FormData(document.getElementById('recuperacion-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(3, response.message, null);
                    bloquearCorreo();
                    var myModal = new bootstrap.Modal(document.getElementById('recuperacion-modal'));
                    myModal.show();
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
});

function bloquearCorreo(){
    document.getElementById('correo').disabled = true;
}

// Método manejador de eventos que se ejecuta cuando se envía el formulario de cambiar clave.
document.getElementById('restore-form').addEventListener('submit', function (event) {
    // Se evita recargar la página web después de enviar el formulario.
    event.preventDefault();
    fetch(API + 'restorePassword', {
        method: 'post',
        body: new FormData(document.getElementById('restore-form'))
    }).then(function (request) {
        // Se verifica si la petición es correcta, de lo contrario se muestra un mensaje indicando el problema.
        if (request.ok) {
            request.json().then(function (response) {
                // Se comprueba si la respuesta es satisfactoria, de lo contrario se muestra un mensaje con la excepción.
                if (response.status) {
                    sweetAlert(1, response.message, 'index.php');
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
});