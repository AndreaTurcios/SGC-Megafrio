<?php
require_once('../helpers/database.php');
require_once('../helpers/validator.php');
require_once('../models/empleados.php');

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
                if ($empleados->setNombreUsuario($_POST['nombre_usuario'])) {
                    if ($empleados->setNombreEmpleado($_POST['nombre_emp'])) {
                        if ($empleados->setApellidoEmpleado($_POST['apellido_emp'])) {
                            if ($empleados->setTelefonoEmpleado($_POST['telefono_emp'])) {
                                if ($empleados->setClaveEmpleado($_POST['clave_emp'])) {
                                    if ($empleados->setEstado($_POST['estado'])) {
                                    if ($empleados->setIDTipoEmpleado($_POST['tipoemp'])) {
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
                                        $result['exception'] ='Estado empleado incorrecto';
                                          }
                                }else {
                                    $result['exception'] ='Claves diferentes';
                                       }
                            } else {
                                $result['exception'] = $empleados->getPasswordError();
                                $result['exception'] = 'Claves inválida';
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
            break;

                case 'readOne':
                if ($empleados->setId($_POST['id_empleado'])) {
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
                    if ($empleados->setNombreUsuario($_POST['nombre_usuario2'])) {
                        if ($empleados->setNombreEmpleado($_POST['nombre_emp2'])) {
                            if ($empleados->setApellidoEmpleado($_POST['apellido_emp2'])) {
                                if ($empleados->setTelefonoEmpleado($_POST['telefono_emp2'])) {
                                    if ($empleados->setClaveEmpleado($_POST['clave_emp2'])) {
                                        if ($empleados->setEstado($_POST['estado2'])) {
                                        if ($empleados->setIDTipoEmpleado($_POST['tipoemp2'])) {
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
                                            $result['exception'] ='Estado empleado incorrecto';
                                              }
                                    }else {
                                        $result['exception'] ='Claves diferentes';
                                           }
                                } else {
                                    $result['exception'] = $empleados->getPasswordError();
                                    $result['exception'] = 'Claves inválida';
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
                break;
            case 'delete':
                if ($empleados->setId($_POST['id_empleado'])) {
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
