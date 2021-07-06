<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/equipos.php');

// Se comprueba si existe una acción a realizar, de lo contrario se finaliza el script con un mensaje de error.
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
            case 'readAll':
                if ($result['dataset'] = $equipo->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay equipos registrados';
                    }
                }
                break;

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

            case 'create':
                $_POST = $equipo->validateForm($_POST);
                if ($equipo->setNombre($_POST['nombre_equipo'])) {
                    if ($equipo->setDescripcion($_POST['descripcion_equipo'])) {
                        if ($equipo->setPrecio($_POST['precio_equipo'])) {
                            if ($equipo->setModelo($_POST['modelo'])) {
                                if ($equipo->setVoltaje($_POST['voltaje'])) {
                                    if ($equipo->setSerie($_POST['serie'])) {
                                        if ($equipo->setIdProveedor($_POST['nombre_compania'])) {
                                            if ($equipo->setIdTipoEqui($_POST['tipo_equipo'])) {
                                                if ($equipo->setIdCapacidad($_POST['capacidad'])) {
                                                    if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) { //archivo_producto es creado en el modal del vista agregar
                                                        if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                            if ($producto->createRow()) {
                                                                $result['status'] = 1;
                                                                if ($producto->saveFile($_FILES['archivo_producto'], $producto->getRuta(), $producto->getImagen())) {
                                                                    $result['message'] = 'Producto creado correctamente';
                                                                } else {
                                                                    $result['message'] = 'Producto creado pero no se guardó la imagen';
                                                                }
                                                            } else {
                                                                $result['exception'] = Database::getException();;
                                                            }
                                                        } else {
                                                            $result['exception'] = $producto->getImageError();
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
            case 'readOne':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($result['dataset'] = $producto->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'update':
                $_POST = $producto->validateForm($_POST);
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->setNombre($_POST['nombre_producto'])) {
                            if ($producto->setDescripcion($_POST['descripcion_producto'])) {
                                if ($producto->setPrecio($_POST['precio_producto'])) {
                                    if ($producto->setCategoria($_POST['categoria_producto'])) {
                                        if ($producto->setEstado(isset($_POST['estado_producto']) ? 1 : 0)) {
                                            if (is_uploaded_file($_FILES['archivo_producto']['tmp_name'])) {
                                                if ($producto->setImagen($_FILES['archivo_producto'])) {
                                                    if ($producto->updateRow($data['imagen_producto'])) {
                                                        $result['status'] = 1;
                                                        if ($producto->saveFile($_FILES['archivo_producto'], $producto->getRuta(), $producto->getImagen())) {
                                                            $result['message'] = 'Producto modificado correctamente';
                                                        } else {
                                                            $result['message'] = 'Producto modificado pero no se guardó la imagen';
                                                        }
                                                    } else {
                                                        $result['exception'] = Database::getException();
                                                    }
                                                } else {
                                                    $result['exception'] = $producto->getImageError();
                                                }
                                            } else {
                                                if ($producto->updateRow($data['imagen_producto'])) {
                                                    $result['status'] = 1;
                                                    $result['message'] = 'Producto modificado correctamente';
                                                } else {
                                                    $result['exception'] = Database::getException();
                                                }
                                            }
                                        } else {
                                            $result['exception'] = 'Estado incorrecto';
                                        }
                                    } else {
                                        $result['exception'] = 'Seleccione una categoría';
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
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'delete':
                if ($producto->setId($_POST['id_producto'])) {
                    if ($data = $producto->readOne()) {
                        if ($producto->deleteRow()) {
                            $result['status'] = 1;
                            if ($producto->deleteFile($producto->getRuta(), $data['imagen_producto'])) {
                                $result['message'] = 'Producto eliminado correctamente';
                            } else {
                                $result['message'] = 'Producto eliminado pero no se borró la imagen';
                            }
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Producto inexistente';
                    }
                } else {
                    $result['exception'] = 'Producto incorrecto';
                }
                break;
            case 'cantidadProductosCategoria':
                if ($result['dataset'] = $producto->cantidadProductosCategoria()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay datos disponibles';
                    }
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
