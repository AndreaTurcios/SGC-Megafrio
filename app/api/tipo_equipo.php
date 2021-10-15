<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/tipo_equipo.php');

if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $tipoEquipo = new tipoequipo;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
        switch ($_GET['action']) {
             // Esto se ejecuta en el caso del readall, ya sea al visualizar la tabla o en la accion que se indique que se quieren leer todos los datos de la tabla
            case 'readAll':
                if ($result['dataset'] = $tipoEquipo->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        // En caso de que no haya ningún empleado registrado en la base de datos, nos tira este mensaje
                        $result['exception'] = 'No hay ningún tipo de equipo ingresado en la base de datos';
                    }
                }
                break;
            case 'create':
                $_POST = $tipoEquipo->validateForm($_POST);
                if ($tipoEquipo->setTipoEquipo($_POST['tipo_equipo'])) {
                    if ($tipoEquipo->createRow()) {
                            $result['status'] = 1;
                            // Se indica que el proveedor se registró existosamente en el caso de que los if se ejecuten automáticamente, caso contrario nos manda los siguientes mensajes
                            $result['message'] = 'Tipo equipo registrado exitosamente';  
                    } else {
                            $result['exception'] = Database::getException();                                                        
                    }   
                    } else {
                            $result['exception'] = 'Tipo equipo incorrecto';
                    }
                break;
                case 'readOne':
                    if ($tipoEquipo->setId($_POST['id_tipo_equipo'])) {
                        if ($result['dataset'] = $tipoEquipo->readOne()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No existe el respectivo tipo equipo';
                            }
                        }
                    } else {
                        $result['exception'] = 'Empleado erróneo';
                    }
                    break;
                    case 'update':
                        $_POST = $tipoEquipo->validateForm($_POST);
                        if ($tipoEquipo->setId($_POST['id_tipo_equipo2'])) {
                            if ($tipoEquipo->setTipoEquipo($_POST['tipo_equipo2'])) {                                              
                                if ($tipoEquipo->updateRow()) {
                                        $result['status'] = 1;
                                        $result['message'] = 'Tipo equipo modificado exitosamente';  
                                } else {
                                        $result['exception'] = Database::getException();                                                        
                                        }   
                                    } else {
                                        $result['exception'] = 'Problema con el tipo de equipo';
                                    }
                                } else {
                                    $result['exception'] = 'Tipo equipo inexistente';
                                }
                    break;  
                    case 'delete':
                        if ($tipoEquipo->setId($_POST['id_tipo_equipo2'])) {
                            if ($data = $tipoEquipo->readOne()) {
                                if ($tipoEquipo->deleteRow()) {
                                    $result['status'] = 1;
                                    $result['message'] = 'Tipo equipo eliminado correctamente'; 
                                   
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            // En caso el tipo equipo no exista manda el mensaje correspondiente
                            } else {
                                $result['exception'] = 'Tipo equipo inexistente';
                            }
                        } else {
                            $result['exception'] = 'Tipo equipo incorrecto';
                        }
                        break;   
            }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de carácteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    // } else {
    //     print(json_encode('Acceso denegado'));
    // }
} else {
    print(json_encode('Recurso no disponible'));
}