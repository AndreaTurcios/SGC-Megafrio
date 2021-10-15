<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/capacidades.php');

if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $capacidad = new Capacidad;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $capacidad->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existe ninguna capacidad registrado';
                    }
                }
                break;

                case 'search':
                    $_POST = $capacidad->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $capacidad->searchRows($_POST['search'])) {
                            $result['status'] = 1;
                            $rows = count($result['dataset']);
                            if ($rows > 1) {
                                $result['message'] = 'Se encontraron ' . $rows . ' coincidencias';
                            } else {
                                $result['message'] = 'Solo existe una coincidencia';
                            }
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No hay coincidencias';
                            }
                        }
                    } else {
                        $result['exception'] = 'Ingrese un valor para buscar';
                    }
                    break;
                
            case 'readOne':
                if ($capacidad->setId($_POST['id_capacidad'])) {
                    if ($result['dataset'] = $capacidad->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No existe la respectiva capacidad';
                        }
                    }
                } else {
                    $result['exception'] = 'Capacidad incorrecta';
                }
                break;

                case 'create':
                    $_POST = $capacidad->validateForm($_POST);
                    if($capacidad->setCapacidad($_POST['capacidad'])){
                            if ($capacidad->createRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Capacidad creada correctamente';
                                
                            } else {
                                $result['exception'] = Database::getException();
                            }
                    }else{
                        $result['message'] = 'Capacidad Incorrecta';
                    }
                    break;

                    case 'update':
                        $_POST = $capacidad->validateForm($_POST);
                        if ($capacidad->setId($_POST['id_capacidad2'])) {
                            if ($data = $capacidad->readOne()) {
                                if($capacidad->setCapacidad($_POST['capacidad2'])){
                                        if ($capacidad->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Capacidad actualizada correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                }else{
                                    $result['message'] = 'Nombre de capacidad incorrecta';
                                }
                            }
                        }   
                        break;

            case 'delete':
                if ($capacidad->setId($_POST['id_capacidad'])) {
                    if ($data = $capacidad->readOne()) {
                        if ($capacidad->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Capacidad eliminado correctamente'; 
                           
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Capacidad inexistente';
                    }
                } else {
                    $result['exception'] = 'Capacidad incorrecto';
                }
                break;               
            
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
