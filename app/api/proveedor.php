<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/proveedor.php');

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
             // Esto se ejecuta en el caso del readall, ya sea al visualizar la tabla o en la accion que se indique que se quieren leer todos los datos de la tabla
            case 'readAll':
                if ($result['dataset'] = $proveedor->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        // En caso de que no haya ningún empleado registrado en la base de datos, nos tira este mensaje
                        $result['exception'] = 'No hay ningún proveedor ingresado en la base de datos';
                    }
                }
                break;
                // En el caso de que la variable action nos detecte que se quiera buscar, se ejecutará lo siguiente
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
                        // Esto ocurrirá en el caso de que no existan coincidencias de la busqueda realizada
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No hay coincidencias';
                            }
                        }
                    // En el caso de que esté vacío
                    } else {
                        $result['exception'] = 'Ingrese un valor para buscar';
                    }
                    break;
            // En el caso de que el action detecte que se desea crear o insertar, se ejecutará lo siguiente
            case 'create':
                $_POST = $proveedor->validateForm($_POST);
                if ($proveedor->setNombreCompania($_POST['nombre_compania'])) {
                        if ($proveedor->setTelefonoProveedor($_POST['telefono_pro'])) {                                                
                                if ($proveedor->setDireccionProveedor($_POST['direccion_pro'])) {  
                                    if ($proveedor->setIdPais($_POST['id_pais'])) { 
                                        if ($proveedor->setInfoTributaria($_POST['info_tributaria'])) {                                                   
                                                    if ($proveedor->createRow()) {
                                                          $result['status'] = 1;
                                                          // Se indica que el proveedor se registró existosamente en el caso de que los if se ejecuten automáticamente, caso contrario nos manda los siguientes mensajes
                                                          $result['message'] = 'Proveedor registrado exitosamente';  

                                                      } else {
                                                          $result['exception'] = Database::getException();                                                        
                                                      }   
                                } else {
                                    $result['exception'] = 'Carácteres incorrectos en informacion tributaria';
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
            // En el caso de que el action detecte que se desea únicamente leer un id en específico nos 
            //ejecuta la siguiente acción, en caso contrario nos indica que el empleado que se intenta 
            //seleccionar no existe
            case 'readOne':
                if ($proveedor->setId($_POST['id_proveedor'])) {
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
                // Si el action detecta que se desea realizar un update se ejecuta lo siguiente
                case 'update':
                    $_POST = $proveedor->validateForm($_POST);
                    if ($proveedor->setId($_POST['id_proveedor2'])) {
                        if ($proveedor->setNombreCompania($_POST['nombre_compania2'])) {
                                if ($proveedor->setTelefonoProveedor($_POST['telefono_pro2'])) {                                                
                                        if ($proveedor->setDireccionProveedor($_POST['direccion_pro2'])) {      
                                            if ($proveedor->setIdPais($_POST['id_pais2'])) { 
                                                if ($proveedor->setInfoTributaria($_POST['info_tributaria2'])) {                                                   
                                                            if ($proveedor->updateRow()) {
                                                                $result['status'] = 1;
                                                                $result['message'] = 'Proveedor modificado exitosamente';  
                                                            } else {
                                                                $result['exception'] = Database::getException();                                                        
                                                            }   
                                        } else {
                                            $result['exception'] = 'Carácteres incorrectos en informacion tributaria';
                                        }
                                    } else {
                                        $result['exception'] = 'Problema con id pais';
                                    }
                                } else {
                                    $result['exception'] = 'Problema con la direcion del proveedor';
                                }
                            } else {
                                $result['exception'] = 'Formato del teléfono incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Carácteres incorrectos en nombre de la compañía';
                        }
                    } else {
                        $result['exception'] = 'Proveedor incorrecto';
                    }    
                break;   
            // Si el action detecta que se desea realizar un delete a un dato se ejecuta lo siguiente
            case 'delete':
                if ($proveedor->setId($_POST['id_proveedor'])) {
                    if ($data = $proveedor->readOne()) {
                        if ($proveedor->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Proveedor eliminado correctamente'; 
                           
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    // En caso el proveedor no exista manda el mensaje correspondiente
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