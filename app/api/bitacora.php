<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/bitacora.php');

if (isset($_GET['action'])) {
    session_start();
    $bitacora = new Bitacora;
    $result = array('status' => 0, 'message' => null, 'exception' => null);

    if (isset($_SESSION['id_empleado'])) {
        switch ($_GET['action']) {

            case 'readAll':
                if ($result['dataset'] = $bitacora->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay bitacoras registradas';
                    }
                }
                break;


            case 'search':
                $_POST = $bitacora->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $bitacora->searchRows($_POST['search'])) {
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

            case 'readClientes':
                if ($result['dataset'] = $bitacora->readClientes()) {
                        $result['status'] = 1;
                } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay clientes registrados';
                        }
                    }
                break;

            case 'readEmpleados':
                if ($result['dataset'] = $bitacora->readEmpleados()) {
                        $result['status'] = 1;
                } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay empleados registrados';
                        }
                    }
                break;

            case 'readEquipo':
                if ($result['dataset'] = $bitacora->readEquipo()) {
                        $result['status'] = 1;
                } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay equipos registrados';
                        }
                    }
                break;
            
            case 'readEstadoEquipo':
                if ($result['dataset'] = $bitacora->readEstadoEquipo()) {
                        $result['status'] = 1;
                } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay estados de equipo registrados';
                        }
                    }
                break;

            case 'readTipoServicio':
                if ($result['dataset'] = $bitacora->readTipoServicio()) {
                        $result['status'] = 1;
                } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay tipo de servicio registrados';
                        }
                    }
                break;

            case 'readTipoPago':
                if ($result['dataset'] = $bitacora->readTipoPago()) {
                        $result['status'] = 1;
                } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No hay tipo de pago registrados';
                        }
                    }
                break;

            case 'readOne':
                    if ($bitacora->setId($_POST['id_bitacora'])) {   
                        if ($result['dataset'] = $bitacora->readOne()) {
                            $result['status'] = 1;
                        } else {
                            if (Database::getException()) {
                                $result['exception'] = Database::getException();
                            } else {
                                $result['exception'] = 'Bitacora inexistente';
                            }
                        }
                    } else {
                        $result['exception'] = 'Bitacora incorrecto';
                    }
                break;

            case 'search':
                $_POST = $bitacora->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $bitacora->searchRows($_POST['search'])) {
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
                        $result['exception'] = 'Hay campos vacios';
                }
                break;

            case 'delete':
                    if ($bitacora->setId($_POST['id_bitacora'])) {
                        if ($data = $bitacora->readOne()) {
                            if ($bitacora->deleteRow()) {
                                $result['status'] = 1;
                                $result['message'] = 'Cliente eliminado correctamente';
    
                            } else {
                                $result['exception'] = Database::getException();
                            }
                        } else {
                            $result['exception'] = 'Cliente inexistente';
                        }
                    } else {
                        $result['exception'] = 'Cliente incorrecto';
                    }
                break;

            case 'create':
                $_POST = $bitacora->validateForm($_POST);
                if($bitacora->setFecha($_POST['fecha'])){
                    if($bitacora->setUbicacion($_POST['ubicacion'])){
                        if($bitacora->setHora($_POST['hora'])){
                            if (isset($_POST['cliente'])) {
                                if ($bitacora->setCliente($_POST['cliente'])) {
                                    if (isset($_POST['empleado'])) {
                                        if ($bitacora->setEmpleado($_POST['empleado'])) {
                                            if (isset($_POST['estado_equipo'])) {
                                                if ($bitacora->setEstadoEquipo($_POST['estado_equipo'])) {
                                                    if (isset($_POST['tipo_servicio'])) {
                                                        if ($bitacora->setTipoServicio($_POST['tipo_servicio'])) {
                                                            if (isset($_POST['tipo_pago'])) {
                                                                if ($bitacora->setTipoPago($_POST['tipo_pago'])) {
                                                                    
                                                                   if(isset($_POST['equipo'])){
                                                                    if ($bitacora->setEquipo($_POST['equipo'])) {

                                                                        if (is_uploaded_file($_FILES['archivo']['tmp_name'])) {
                                                                            if ($bitacora->setArchivo($_FILES['archivo'])) {
                                                                                if ($bitacora->createRow()) {
                                                                                    $result['status'] = 1;
                                                                                    if ($bitacora->saveFile($_FILES['archivo'], $bitacora->getDireccion(), $bitacora->getArchivo())) {
                                                                                        $result['message'] = 'Bitacora creada correctamente';
                                                                                    } else {
                                                                                        $result['message'] = 'Bitacora creada pero no se guardó el archivo';
                                                                                    }
                                                                                } else {
                                                                                    $result['exception'] = Database::getException();;
                                                                                }
                                                                            } else {
                                                                                $result['exception'] = $bitacora->getFileError();
                                                                            }
                                                                        } else {
                                                                            $result['exception'] = 'Seleccione una imagen';
                                                                        }

                                                                    }else{
                                                                            $result['exception'] = 'Equipo Incorrecto';
                                                                        }
                                                                    
                                                                   }else{
                                                                    $result['exception'] = 'Seleccione un equipo';
                                                                   }


                                                                } else {
                                                                    $result['exception'] = 'Tipo de pago incorrecta';
                                                                }
                                                            }else {
                                                                    $result['exception'] = 'Seleccione un tipo de pago';
                                                                }
                                                        } else {
                                                            $result['exception'] = 'Tipo servicio incorrecta';
                                                        }
                                                    }else {
                                                            $result['exception'] = 'Seleccione un tipo de servicio';
                                                        } 
                                                } else {
                                                    $result['exception'] = 'Estado Equipo incorrecta';
                                                }
                                            }else {
                                                    $result['exception'] = 'Seleccione un estado equipo';
                                                } 
                                        } else {
                                            $result['exception'] = 'Empleado incorrecta';
                                        }
                                    }else {
                                            $result['exception'] = 'Seleccione un empleado';
                                        } 
                                } else {
                                    $result['exception'] = 'Cliente incorrecta';
                                }
                            }else {
                                    $result['exception'] = 'Seleccione un Cliente';
                                } 
                            
                        }else {
                            $result['exception'] = 'Hora Incorrecta';
                        }   
                    }else {
                        $result['exception'] = 'Ubicacion Incorrecta';
                    }   

                }else {
                    $result['exception'] = 'Fecha Incorrecta';
                }

                break;

                case 'delete':
                        if ($bitacora->setId($_POST['id_bitacora'])) {
                            if ($data = $bitacora->readOne()) {
                                if ($bitacora->deleteRow()) {
                                    $result['status'] = 1;
                                    if ($bitacora->deleteFile($bitacora->getDireccion(), $data['archivo'])) {
                                        $result['message'] = 'Bitacora eliminado correctamente';
                                    } else {
                                        $result['message'] = 'Bitacora eliminado pero no se borró la imagen';
                                    }
                                } else {
                                    $result['exception'] = Database::getException();
                                }
                            } else {
                                $result['exception'] = 'Bitacora inexistente';
                            }
                        } else {
                            $result['exception'] = 'Bitacora incorrecto';
                        }
                break;




                case 'update':
                    $_POST = $bitacora->validateForm($_POST);
                    if ($bitacora->setId($_POST['id_bitacora'])) {
                        if ($data = $bitacora->readOne()) {
                            if($bitacora->setFecha($_POST['fecha2'])){
                                if($bitacora->setUbicacion($_POST['ubicacion2'])){
                                    if($bitacora->setHora($_POST['hora2'])){
                                        if (isset($_POST['cliente2'])) {
                                            if ($bitacora->setCliente($_POST['cliente2'])) {
                                                if (isset($_POST['empleado2'])) {
                                                    if ($bitacora->setEmpleado($_POST['empleado2'])) {
                                                        if (isset($_POST['estado_equipo2'])) {
                                                            if ($bitacora->setEstadoEquipo($_POST['estado_equipo2'])) {
                                                                if (isset($_POST['tipo_servicio2'])) {
                                                                    if ($bitacora->setTipoServicio($_POST['tipo_servicio2'])) {
                                                                        if (isset($_POST['tipo_pago2'])) {
                                                                            if ($bitacora->setTipoPago($_POST['tipo_pago2'])) {
                                                                                
                                                                               if(isset($_POST['equipo2'])){
                                                                                if ($bitacora->setEquipo($_POST['equipo2'])) {
            
                                                                                    if (is_uploaded_file($_FILES['archivo2']['tmp_name'])) {
                                                                                        if ($bitacora->setArchivo($_FILES['archivo2'])) {
                                                                                            if ($bitacora->updateRow($data['archivo2'])) {
                                                                                                $result['status'] = 1;
                                                                                                if ($bitacora->saveFile($_FILES['archivo2'], $bitacora->getDireccion(), $bitacora->getArchivo())) {
                                                                                                    $result['message'] = 'Bitacora actualizada correctamente';
                                                                                                } else {
                                                                                                    $result['message'] = 'Bitacora actualizada pero no se guardó el archivo';
                                                                                                }
                                                                                            } else {
                                                                                                $result['exception'] = Database::getException();;
                                                                                            }
                                                                                        } else {
                                                                                            $result['exception'] = $bitacora->getFileError();
                                                                                        }
                                                                                    } else {
                                                                                        $result['exception'] = 'Seleccione una imagen';
                                                                                    }
            
                                                                                }else{
                                                                                        $result['exception'] = 'Equipo Incorrecto';
                                                                                    }
                                                                                
                                                                               }else{
                                                                                $result['exception'] = 'Seleccione un equipo';
                                                                               }
            
            
                                                                            } else {
                                                                                $result['exception'] = 'Tipo de pago incorrecta';
                                                                            }
                                                                        }else {
                                                                                $result['exception'] = 'Seleccione un tipo de pago';
                                                                            }
                                                                    } else {
                                                                        $result['exception'] = 'Tipo servicio incorrecta';
                                                                    }
                                                                }else {
                                                                        $result['exception'] = 'Seleccione un tipo de servicio';
                                                                    } 
                                                            } else {
                                                                $result['exception'] = 'Estado Equipo incorrecta';
                                                            }
                                                        }else {
                                                                $result['exception'] = 'Seleccione un estado equipo';
                                                            } 
                                                    } else {
                                                        $result['exception'] = 'Empleado incorrecta';
                                                    }
                                                }else {
                                                        $result['exception'] = 'Seleccione un empleado';
                                                    } 
                                            } else {
                                                $result['exception'] = 'Cliente incorrecta';
                                            }
                                        }else {
                                                $result['exception'] = 'Seleccione un Cliente';
                                            } 
                                        
                                    }else {
                                        $result['exception'] = 'Hora Incorrecta';
                                    }   
                                }else {
                                    $result['exception'] = 'Ubicacion Incorrecta';
                                }   
            
                            }else {
                                $result['exception'] = 'Fecha Incorrecta';
                            }
                        } else {
                            $result['exception'] = 'Producto inexistente';
                        }
                    } else {
                        $result['exception'] = 'Bitacora incorrecto';
                    }

                    break;


           

                default:
                    $result['exception'] = 'Acción no disponible dentro de la sesión';



        }
        header('content-type: application/json; charset=utf-8');
        // Se imprime el resultado en formato JSON y se retorna al controlador.
        print(json_encode($result));
    } else {
        print(json_encode('Acceso denegado'));
    }

} else {
    print(json_encode('Recurso no disponible'));
}
