<?php
require_once('../../helpers/database.php');
require_once('../../helpers/validator.php');
require_once('../../models/empleados.php');

if (isset($_GET['action'])) {
    session_start();
    $empleados = new Empleados;
    $result = array('status' => 0, 'message' => null, 'exception' => null);
        switch ($_GET['action']) {
            case 'readAll':
                if ($result['dataset'] = $empleados->readAll()) {
                    $result['status'] = 1;
                } else {
                    if (Database::getException()) {
                        $result['exception'] = Database::getException();
                    } else {
                        $result['exception'] = 'No hay ningún empleado ingresado en la base de datos';
                    }
                }
                break;
            case 'search':
                $_POST = $empleados->validateForm($_POST);
                if ($_POST['search'] != '') {
                    if ($result['dataset'] = $empleados->searchRows($_POST['search'])) {
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
                $_POST = $empleados->validateForm($_POST);
                if ($empleados->setNombreEmpleado($_POST['nombreempleado'])) {
                    if ($empleados->setApellidoEmpleado($_POST['apellidoempleado'])) {
                        if ($empleados->setTelefonoEmpleado($_POST['telefonoempleado'])) {
                            if ($empleados->setDireccionEmpleado($_POST['direccionempleado'])) {
                                if ($empleados->setCorreoEmpleado($_POST['correoempleado'])) {
                                        if ($empleados->setEstadoEmpleado($_POST['estadoempleado'])) {
                                            if ($empleados->setUsuario($_POST['usuario'])) {  
                                                if ($_POST['clave'] == $_POST['confclave']) {
                                                    if ($empleados->setClave($_POST['clave'])) {  
                                                        if (isset($_POST['tipoempleado'])) {
                                                            if ($empleados->setIDTipoEmpleado($_POST['tipoempleado'])) {
                                                                if ($empleados->createRow()) {
                                                                    $result['status'] = 1;
                                                                    $result['message'] = 'Empleado registrado exitosamente';                                                        
                                                                } else {
                                                                    $result['exception'] = Database::getException();                                                        
                                                                }  
                                                            }else {
                                                                $result['exception'] ='Tipo empleado incorrecto';
                                                            }
                                                        }else {
                                                            $result['exception'] ='Seleccione un tipo empleado';
                                                        }
                                                    } else {
                                                        $result['exception'] = $empleados->getPasswordError();
                                                        $result['exception'] = 'Claves diferentes';
                                                    }
                                                } else {
                                                    $result['exception'] = 'Claves diferentes';
                                                }
                                            }else {
                                                $result['exception'] ='Nombre de usuario incorrecto';
                                            }
                                        }else {
                                            $result['exception'] ='Estado incorrecto';
                                        }
                                }else {
                                    $result['exception'] ='Correo incorrecto';
                                }
                            }else {
                                $result['exception'] ='Dirección incorrecta';
                            }
                        }else {
                            $result['exception'] ='Teléfono incorrecto';
                        }
                    }else {
                        $result['exception'] ='Apellido incorrecto';
                    }
                }else {
                    $result['exception'] ='Nombre incorrecto';
                }
                    
                    break;
                case 'readOne':
                if ($empleados->setId($_POST['idempleado'])) {
                    if ($result['dataset'] = $empleados->readOne()) {
                        $result['status'] = 1;
                    } else {
                        if (Database::getException()) {
                            $result['exception'] = Database::getException();
                        } else {
                            $result['exception'] = 'No existe el respectivo empleado';
                        }
                    }
                } else {
                    $result['exception'] = 'Empleado erróneo';
                }
                break;
                case 'update':
                    $_POST = $empleados->validateForm($_POST);
                    if($empleados->setId($_POST['idempleado'])){
                        if ($empleados->readOne()) {
                            if ($empleados->setNombreEmpleado($_POST['nombreempleado'])) {
                                if ($empleados->setApellidoEmpleado($_POST['apellidoempleado'])) {
                                    if ($empleados->setTelefonoEmpleado($_POST['telefonoempleado'])) {
                                        if ($empleados->setDireccionEmpleado($_POST['direccionempleado'])) {
                                            if ($empleados->setCorreoEmpleado($_POST['correoempleado'])) {
                                                    if ($empleados->setEstadoEmpleado($_POST['estadoempleado'])) {
                                                        if ($empleados->setUsuario($_POST['usuario'])) { 
                                                            if ($_POST['clave'] == $_POST['confclave']) {
                                                                if ($empleados->setClave($_POST['clave'])) {
                                                            if (isset($_POST['tipoempleado'])) {
                                                                if ($empleados->setIDTipoEmpleado($_POST['tipoempleado'])) {   
                                                                            if ($empleados->updateRow()) {
                                                                                $result['status'] = 1;
                                                                                $result['message'] = 'Usuario modificado correctamente';
                                                                            } else {
                                                                                $result['exception'] = Database::getException();
                                                                            }  
                                                                        }else {
                                                                            $result['exception'] ='tipo incorrecto';
                                                                        }
                                                                    }else {
                                                                        $result['exception'] ='Seleccione un tipo empleado';
                                                                
                                                                    }

                                                                } else {
                                                                    $result['exception'] = $empleados->getPasswordError();
                                                                    $result['exception'] = 'Claves diferentes';
                                                                }
                                                            } else {
                                                                $result['exception'] = 'Claves diferentes';
                                                            }

                                                        }else {
                                                            $result['exception'] ='usuario incorrecto';
                                                        }
                                                    }else {
                                                        $result['exception'] ='estado incorrecto';
                                                    }
                                            }else {
                                                $result['exception'] ='correo incorrecto';
                                            }
                                        }else {
                                            $result['exception'] ='direccion incorrecto';
                                        }
                                    }else {
                                        $result['exception'] ='telefono incorrecto';
                                    }
                                }else {
                                    $result['exception'] ='apellido incorrecto';
                                }
                            }else {
                                $result['exception'] ='nombre incorrecto';
                            }
                        } else {
                            $result['exception'] = 'Categoría inexistente';
                        }
                    } else {
                        $result['exception'] = 'Categoría incorrecta';
                    }
                    break;
            case 'delete':
                if ($empleados->setId($_POST['idempleado'])) {
                    if ($data = $empleados->readOne()) {
                        if ($empleados->deleteRow()) {
                            $result['status'] = 1;
                            $result['message'] = 'Empleado eliminado correctamente'; 
                           
                        } else {
                            $result['exception'] = Database::getException();
                        }
                    } else {
                        $result['exception'] = 'Empleado inexistente';
                    }
                } else {
                    $result['exception'] = 'Proveedor incorrecto';
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
