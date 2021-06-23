<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/proveedor.php');

if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $proveedor = new Proveedor;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $proveedor->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay ningún proveedor ingresado en la base de datos';
                    }
                }
                break;
                case 'search':
                    $_POST = $proveedor->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $proveedor->searchRows($_POST['search'])) {
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
            case 'create':
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setNombreCompania($_POST['nombre_compania'])) {
                    if ($proveedor->setRepresentante($_POST['representante'])) {
                        if ($proveedor->setTelefonoProveedor($_POST['telefono_proveedor'])) {                                                
                                if ($proveedor->setDireccionProveedor($_POST['direccion_proveedor'])) {                                                    
                                                    if ($proveedor->createRow()) {
                                                          $result['status'] = 1;
                                                          $result['message'] = 'Proveedor registrado exitosamente';  

                                                      } else {
                                                          $result['exception'] = Database::getException();                                                        
                                                      }   
                                } else {
                                    $result['exception'] = 'Carácteres incorrectos en dirección';
                                }
                        } else {
                            $result['exception'] = 'El teléfono debe tener el formato 0000-0000 e iniciar con 2, 6 o 7';
                        }
                    } else {
                        $result['exception'] = 'Carácteres incorrectos en representante';
                    }
                } else {
                    $result['exception'] = 'Carácteres incorrectos en nombre de la compañía';
                }
                break;
            case 'readOne':
                if ($proveedor->setId($_POST['idproveedor'])) {
                    if ($result['dataset'] = $proveedor->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No existe el respectivo proveedor';
                        }
                    }
                } else {
                    $result['exception'] = 'Proveedor erróneo';
                }
                break;
                case 'update':
                    $_POST = $proveedor->validateForm($_POST);
                    if ($proveedor->setId($_POST['id'])) {
                        if ($proveedor->readOne()) {
                            if ($proveedor->setNombreCompania($_POST['nombre_compania'])) {
                                if ($proveedor->setRepresentante($_POST['representante'])) {
                                        if ($proveedor->setTelefonoProveedor($_POST['telefono_proveedor'])) {
                                            if ($proveedor->setDireccionProveedor($_POST['direccion_proveedor'])) {
                                                if ($proveedor->updateRow()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Usuario modificado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['message'] = 'No se guardó el teléfono';
                                            }
                                        } else {
                                            $result['message'] = 'No se guardó el representante';
                                        }
                                    } else {
                                        $result['message'] = 'No se guardó el nombre de la compañía';
                                    }
                                } else {
                                    $result['exception'] = 'Descripción incorrecta';
                                }
                            } else {
                                $result['exception'] = 'Problema con id';
                            }
                        }else {
                            $result['exception'] = 'Problema con id';
                        }
                    break;
            case 'delete':
                if ($proveedor->setId($_POST['idproveedor'])) {
                    if ($data = $proveedor->readOne()) {
                        if ($proveedor->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Proveedor eliminado correctamente'; 
                           
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Proveedor inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
                }
                break;               
            default:
                $result['exception'] = 'Acción no disponible dentro de la sesión';
        }
        // Se indica el tipo de contenido a mostrar y su respectivo conjunto de caracteres.
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
} else {
    print(json_encode('Recurso no disponible'));
}
