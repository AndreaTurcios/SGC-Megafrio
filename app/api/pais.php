<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/pais.php');

if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $pais = new Pais;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $pais->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay ningún pais ingresado en la base de datos';
                    }
                }
                break;
                case 'search':
                    $_POST = $pais->validateForm($_POST);
                    if ($_POST['search'] != '') {
                        if ($result['dataset'] = $pais->searchRows($_POST['search'])) {
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
                if ($pais->setId($_POST['id_pais'])) {
                    if ($result['dataset'] = $pais->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No existe el respectivo pais';
                        }
                    }
                } else {
                    $result['exception'] = 'Pais incorrecto';
                }
                break;

                case 'create':
                    $_POST = $pais->validateForm($_POST);
                    if($pais->setNombreP($_POST['nombre_pais'])){
                        if($pais->setCodigo($_POST['codigo_postal'])){
                            if ($pais->createRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Pais creado correctamente';
                                
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        }else{
                            $result['message'] = 'Codigo postal incorrecto';
                        }   
                    }else{
                        $result['message'] = 'Pais Incorrecto';
                    }
                    break;

                    case 'update':
                        $_POST = $pais->validateForm($_POST);
                        if ($pais->setId($_POST['id_pais'])) {
                            if ($data = $pais->readOne()) {
                                if($pais->setNombreP($_POST['categoria2'])){
                                    if($pais->setCodigo($_POST['categoria2'])){
                                        if ($pais->updateRow()) {
                                            $result['status'] = 1;
                                            $result['message'] = 'Pais actualizadao correctamente';
                                        } else {
                                            $result['exception'] = Database::getException();
                                        }
                                    }else{
                                        $result['message'] = 'Codigo postal incorrecto';
                                    }   
                                }else{
                                    $result['message'] = 'Nombre de pais incorrecto';
                                }
                            }
                        }   
                        break;

            case 'delete':
                if ($pais->setId($_POST['id_pais'])) {
                    if ($data = $pais->readOne()) {
                        if ($pais->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Pais eliminado correctamente'; 
                           
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Pais inexistente';
                    }
                } else {
                    $result['exception'] = 'Pais incorrecto';
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
