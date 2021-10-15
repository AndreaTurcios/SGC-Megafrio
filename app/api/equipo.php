<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/equipos.php');

if (isset($_GET['action'])) {
    // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en el script.
    session_start();
    // Se instancia la clase correspondiente.
    $equipo = new Equipos;
    // Se declara e inicializa un arreglo para guardar el resultado que retorna la API.
    $result = array('status' => 0, 'message' => null, 'exception' => null);
    // Se verifica si existe una sesión iniciada como administrador, de lo contrario se finaliza el script con un mensaje de error.
        // Se compara la acción a realizar cuando un administrador ha iniciado sesión.
        switch ($_GET['action']) {
            //Case para leer los registros y ver si existe algún equipo, en caso de no existir manda mensaje en la exception
            case 'readAll':
                if ($result['dataset'] = $equipo->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No existe ningun equipo registrado';
                    }
                }
                break;
                // Case para leer el proveedor y ver si existen o no
                case 'readProveedor':
                    if ($result['dataset'] = $equipo->readProveedor()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay proveedores registrados';
                        }
                    }
                    break;
                    //Case para leer el tipo de equipo 
                case 'readTipoEquipo':
                    if ($result['dataset'] = $equipo->readTipoEquipo()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                           $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay tipos de equipos registrados';
                        }
                    }
                    break;
                    // case para realizar el read de capacidades
                    case 'readCapacidad':
                        if ($result['dataset'] = $equipo->readCapacidad()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                               $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No hay capacidades registradas';
                            }
                        }
                        break;
                        // Case para el search, realizar una busqueda de un equipo en específico 
                        case 'search':
                            $_POST = $equipo->validateForm($_POST);
                            if ($_POST['search'] != '') {
                                if ($result['dataset'] = $equipo->searchRows($_POST['search'])) {
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
                            // Case para realizar el readOne, para leer un dato específico del sistema
                            case 'readOne':
                                if ($equipo->setId($_POST['id_equipo'])) {
                                    if ($result['dataset'] = $equipo->readOne()) {
                                        $result['status'] = 1;
                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'Equipo inexistente';
                                        }
                                    }
                                } else {
                                    $result['exception'] = 'Equipo incorrecto';
                                }
                                break;
                                // Case para crear un dato dentro de la tabla, detallando cada uno de los elementos de la vista de donde se agarra el dato en específico 
                                case 'create':
                                    $_POST = $equipo->validateForm($_POST);
                                    if ($equipo->setNombre($_POST['nombre_equipo'])) {
                                        if ($equipo->setDescripcion($_POST['descripcion_equipo'])) {
                                            if ($equipo->setPrecio($_POST['precio_equipo'])) {
                                                if ($equipo->setModelo($_POST['modelo'])) {
                                                    if ($equipo->setVoltaje($_POST['voltaje'])) {
                                                        if ($equipo->setSerie($_POST['serie'])) {
                                                            if ($equipo->setIdProveedor($_POST['nombre_compania'])) {
                                                                if ($equipo->setIdTipoEqui($_POST['tipo_equipo'] /*|| $equipo->setIdTipoEqui($_POST['prg1'])*/)) {
                                                                    if ($equipo->setIdCapacidad($_POST['capacidad'])) {
                                                                        if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) { //archivo_producto es creado en el modal del vista agregar
                                                                            if ($equipo->setFoto($_FILES['archivo_producto'])) {
                                                                                if ($equipo->createRow()) {
                                                                                    $result['status'] = 1;
                                                                                    if ($equipo->saveFile($_FILES['archivo_producto'], $equipo->getRuta(), $equipo->getFoto())) {
                                                                                        $result['message'] = 'Equipo creado correctamente';
                                                                                    } else {
                                                                                        $result['message'] = 'Equipo creado pero no se guardó la imagen';
                                                                                    }
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();;
                                                                                }
                                                                            } else {
                                                                                $result['exception'] = $equipo->getImageError();
                                                                            }
                                                                        } else {
                                                                            $result['exception'] = 'Seleccione una imagen';
                                                                        }
                                                                    } else {
                                                                        $result['exception'] = 'Capacidad incorrecta';
                                                                    }   
                                                                } else {
                                                                    $result['exception'] = 'Tipo equipo incorrecto';
                                                                }        
                                                            } else {
                                                                $result['exception'] = 'Proveedor incorrecto';
                                                            }
                                                        } else {
                                                            $result['exception'] = 'Serie incorrecto';
                                                        }
                                                    } else {
                                                        $result['exception'] = 'Voltaje incorrecto';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Modelo incorrecto';
                                                }    
                                            } else {
                                                $result['exception'] = 'Precio incorrecto';
                                            }
                                        } else {
                                            $result['exception'] = 'Descripción incorrecta';
                                        }
                                    } else {
                                        $result['exception'] = 'Nombre incorrecto';
                                    }
                                    break;
                                    // Case para el caso del update del sistema
                                    case 'update':
                                        $_POST = $equipo->validateForm($_POST);
                                        if ($equipo->setId($_POST['id_equipo2'])) {
                                            if ($data = $equipo->readOne()) {
                                                if($equipo->setNombre($_POST['nombre_equipo2'])){
                                                    if($equipo->setDescripcion($_POST['descripcion_equipo2'])){
                                                        if($equipo->setPrecio($_POST['precio_equipo2'])){
                                                            if($equipo->setModelo($_POST['modelo2'])){
                                                                if($equipo->setVoltaje($_POST['voltaje2'])){
                                                                    if($equipo->setSerie($_POST['serie2'])){
                                                                        if(isset($_POST['nombre_compania2'])){
                                                                            if($equipo->setIdProveedor($_POST['nombre_compania2'])){
                                                                                if(isset($_POST['tipo_equipo2'])){
                                                                                    if($equipo->setIdTipoEqui($_POST['tipo_equipo2'])){
                                                                                        if(isset($_POST['capacidad2'])){
                                                                                            if($equipo->setIdCapacidad($_POST['capacidad2'])){
                                                                                                if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                                                                    if ($equipo->setFoto($_FILES['archivo_producto'])) {
                                                                                                        if ($equipo->updateRow($data['foto_equipo'])) {
                                                                                                            $result['status'] = 1;
                                                                                                            if ($equipo->saveFile($_FILES['archivo_producto'], $equipo->getRuta(), $equipo->getFoto())) {
                                                                                                                $result['message'] = 'Equipo modificado correctamente';
                                                                                                            } else {
                                                                                                                $result['message'] = 'Equipo modificado pero no se guardó la imagen';
                                                                                                            }
                                                                                                        } else {
                                                                                                            $result['exception'] = Database::getException();
                                                                                                        }
                                                                                                    } else {
                                                                                                        $result['exception'] = $equipo->getImageError();
                                                                                                    }
                                                                                                } else {
                                                                                                    if ($equipo->updateRow($data['foto_equipo'])) {
                                                                                                        $result['status'] = 1;
                                                                                                        $result['message'] = 'equipo modificado correctamente';
                                                                                                    } else {
                                                                                                        $result['exception'] = Database::getException();
                                                                                                    }
                                                                                                }   
                                                                                            }else {
                                                                                                $result['exception'] = 'Capacidad incorrecta';
                                                                                                }
                                                                                            }else {
                                                                                                $result['exception'] = 'Seleccione una capacidad';
                                                                                                }
                                                                                    }else {
                                                                                        $result['exception'] = 'Tipo equipo incorrecta';
                                                                                        }
                                                                                    }else {
                                                                                        $result['exception'] = 'Seleccione un tipo de equipo';
                                                                                        }
                                                                            }else {
                                                                                $result['exception'] = 'Proveedor incorrecta';
                                                                                }
                                                                            }else {
                                                                                $result['exception'] = 'Seleccione un proveedor';
                                                                                }
                                                                        }
                                                                    }else{
                                                                        $result['message'] = 'Serie incorrecto';
                                                                    }
                                                                }else{
                                                                    $result['message'] = 'Voltaje incorrecto';
                                                                }
                                                            }else{
                                                                $result['message'] = 'Modelo incorrecto';
                                                            }
                                                        }else{
                                                            $result['message'] = 'Precio equipo incorrecto';
                                                        }    
                                                    }else{
                                                        $result['message'] = 'Descripcion incorrecta';
                                                    }   
                                                }else{
                                                    $result['message'] = 'Nombre de equipo incorrecto';
                                                }
                                            
                                        }else {
                                            $result['exception'] ='Equipo incorrecto';
                                              }   
                                        break;
                                        // Case para el caso del delete
                                    case 'delete':
                                        if ($equipo->setId($_POST['id_equipo'])) {
                                            if ($data = $equipo->readOne()) {
                                                if ($equipo->deleteRow()) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Equipo eliminado correctamente'; 
                                                
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            } else {
                                                $result['exception'] = 'Equipo inexistente';
                                            }
                                        } else {
                                            $result['exception'] = 'Equipo incorrecto';
                                        }
                                        break;
                case 'cantidadEquiposTipo':
                    if ($result['dataset'] = $equipo->cantidadEquiposTipo()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay datos disponibles';
                        }
                    }
                    break;
                    case 'cantidadEquiposCapacidad':
                        if ($result['dataset'] = $equipo->cantidadEquiposCapacidad()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'No hay datos disponibles';
                            }
                        }
                        break;
                case 'cantidadEquiposFuncionales':
                    if ($equipo->setId($_POST['idEquipo'])) {
                            if ($result['dataset'] = $equipo->cantidadEquiposFuncionales()) {
                                $result['status'] = 1;
                            } else {
                                if (Database::getException()) {
                                    $result['exception'] = Database::getException();
                                } else {
                                    $result['exception'] = 'Actualmente no existen unidades vendidas de este esquipo';
                                }
                            }
                        } else {
                            $result['exception'] = 'Equipo incorrecto';
                        }
                        break; 
                    case 'readOneGraf':
                            if ($equipo->setId($_POST['idEquipo'])) {
                                if ($result['dataset'] = $equipo->readOneGraf()) {
                                    $result['status'] = 1;
                                } else {
                                    if (Database::getException()) {
                                        $result['exception'] = Database::getException();
                                    } else {
                                        $result['exception'] = 'No existe el respectivo proveedor';
                                    }
                                }
                            } else {
                                $result['exception'] = 'Proveedor erróneo f gg';
                            }
                            break;
                            case 'readOneGrafEqui':
                                if ($equipo->setId($_POST['idequi'])) {
                                    if ($result['dataset'] = $equipo->readOneGrafEqui()) {
                                        $result['status'] = 1;
                                    } else {
                                        if (Database::getException()) {
                                            $result['exception'] = Database::getException();
                                        } else {
                                            $result['exception'] = 'No existe el respectivo proveedor';
                                        }
                                    }
                                } else {
                                    $result['exception'] = 'Proveedor erróneo f gg';
                                }
                                break;
                            case 'cantidadEquiposCapacidad2':
                                if ($equipo->setId($_POST['idequi'])) {
                                        if ($result['dataset'] = $equipo->cantidadEquiposCapacidad2()) {
                                            $result['status'] = 1;
                                        } else {
                                            if (Database::getException()) {
                                                $result['exception'] = Database::getException();
                                            } else {
                                                $result['exception'] = 'No existe el respectivo equipo';
                                            }
                                        }
                                    } else {
                                        $result['exception'] = 'Equipo incorrecto';
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
