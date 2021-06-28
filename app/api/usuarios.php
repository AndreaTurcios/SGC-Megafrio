<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/empleados.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
if(isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $usuario = new Empleados;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'error' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
    if (isset($_SESSION['id_empleado'])) {
        switch ($_GET['action']) {
        case 'logOut':
            if (session_destroy()) {
                $result['status'] = 1;
                $result['message'] = 'Sesión eliminada correctamente';
            } else {
                $result['exception'] = 'Ocurrió un problema al cerrar la sesión';
            }
            break;
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }    
    }else {
    // Se compara la acción a realizar cuando el administrador no ha iniciado sesión.
    switch ($_GET['action']) {
        case 'readAll':
            if ($usuario->readAll()) {
                $result['status'] = 1;
                $result['message'] = 'Existe al menos un usuario registrado';
            } else {
                if (Database::getException()) {
                    $result['error'] = 1;
                    $result['exception'] = Database::getException();
                } else {
                    $result['exception'] = 'No existen usuarios registrados';
                }
            }
            break;
        case 'logIn':
                $_POST = $usuario->validateForm($_POST);
                if ($usuario->checkUser($_POST['username'])) {
                    if ($usuario->checkPassword($_POST['clave'])) {
                        $result['status'] = 1;
                        $result['message'] = 'Autenticación correcta';
                        $_SESSION['id_empleado'] = $usuario->getId();
                        $_SESSION['nombre_usuario'] = $usuario->getNombreUsuario();
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Clave incorrecta';
                        }
                    }
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'Usuario incorrecto';
                    }
                }
                break;
            default:
                $result['exception'] = 'Acción no disponible fuera de la sesión';    
        }
    }    
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
} else{
    print(json_encode('Recurso no disponible'));
}
?>