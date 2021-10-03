<?php
/*
*	Clase para definir las plantillas de las páginas web del <SGC-MEGAFRIO class=""></SGC-MEGAFRIO>
*/
class Dashboard_Page
{
    /*
    *   Método para imprimir la plantilla del encabezado.
    *
    *   Parámetros: $title (título de la página web y del contenido principal).
    *
    *   Retorno: ninguno.
    */
    public static function headerTemplate($title)
    {
        // Se crea una sesión o se reanuda la actual para poder utilizar variables de sesión en las páginas web.
        session_start();
        // Se imprime el código HTML de la cabecera del documento.
        print('
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <!-- Agregamos Bootstrap -->
                
                <link rel="stylesheet" href="../../resources/css/bootstrap/bootstrap.min.css">
                <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
                <!-- Agregamos LibroCSS -->
                <link rel="stylesheet" href="../../resources/css/Estilos/style.css">
                <link rel="stylesheet" href="../../resources/css/Estilos/login.css">
                <link rel="stylesheet" href="../../resources/css/vanilla-dataTables.min.css">
                <title>SGC Megafrio</title>
                <link rel="shortcut icon" href="../../resources/img/logos/logo.ico" type="image/x-icon">
            </head>
            <body>          
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['id_empleado'])) {
            if( $_SESSION['id_tipo_emp']== 1) {
                if ($filename != 'index.php') {
                  print('
                  <header>
          <div class="container-fluid">
          <div class="row ">
            <nav class="nav">
              <!-- Columna Logo -->
              <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
                <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>
                
              </div>
              <!-- Columna Logo pero para mobile -->
              <div class="col-10 d-none d-lg-block " id="SeccionImagen">

                <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>

              </div>
              <!-- Columna de Boton usuario pero para Pequeños -->
              <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
                <a href="#" onclick="openProfileDialog()" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white"><button class="btn btn-primary ">
                  <i class="far fa-user"></i>
                </button></a>
                <a href="#" onclick="logOut()">
                  <i class="fas fa-sign-out-alt"></i>
                </button></a>
                
              </div>
              <!-- Columna para perfil pero en usuarios de pantalla grande -->
              <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
              <button class="btn btncontra"><a href="#" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#password-modal" class="text-white"><i class="fas fa-shield-alt"></i> Cambiar contraseña</a></button>
              <button class="btn btnperfill"><a href="#" onclick="openProfileDialog()"data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white" id="fontmen"><i class="far fa-user"></i> Perfil</a></button>
              <button class="btn btncerrar" id="cerrar">
                <i href="#" id="fontmen" onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</i>
                </button>
              </div>
            </nav>
          </div>

        </div>

        <div class="container-fluid " id="BarraNav">
          <div class="row">

            <nav class="navbar navbar-expand-lg navbar-light SecBarra">
              <div class="container-fluid">
                <!-- Parte del NAVBAR MOBILE -->
                <a class="navbar-brand d-lg-none" href="#">Navegación</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-12 d-lg-none">
                  <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav  ">
                      <!-- Opciones -->
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="gestion_proveedores.php">PROVEEDORES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="gestion_equipo.php">EQUIPO</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="gestion_clientes.php">CLIENTES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="gestion_empleados.php">EMPLEADOS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="agenda.php">AGENDA</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="Pais.php">PAÍSES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="bitacora.php">BITÁCORA</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="Reportes.php">REPORTES</a>
                      </li>

                    </ul>
                  </div>
                </div>
                  <!-- Navbar Normal -->
                <div class="col-12 d-none d-lg-block MenuSec">
                  <ul class="nav justify-content-center">
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="fas fa-user"></i><a href="gestion_empleados.php" id="fontmen"> EMPLEADOS</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="fas fa-shopping-basket"></i><a href="gestion_clientes.php" id="fontmen"> CLIENTES</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/aire.svg" class="text-center" style="max-width:20%;width:20px;height:auto;"><a href="gestion_equipo.php" id="fontmen"> EQUIPO</a></button>
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="fas fa-truck-moving"></i><a href="gestion_proveedores.php" id="fontmen"> PROVEEDORES</a></button>
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-flag"></i><a href="Pais.php" id="fontmen"> PAÍSES</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-clipboard"></i><a href="bitacora.php" id="fontmen"> BITÁCORA</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-calendar-alt"></i><a href="agenda.php" id="fontmen"> AGENDA</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/reportes.svg" class="text-center" style="max-width:20%;width:13px;height:auto;"><a href="Reportes.php" id="fontmen"> REPORTES</a></button> 
                    </li>
                  </ul>
                </div>
              </div>
          </div>
          </nav>
        </div>
        </div>
      </header>
      <main>
      <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="profile-form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <div class="">
                                    <h4>Nombres:</h4>
                                </div>
                                <div class="">
                                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="nombres" name="nombres" class="validate" required>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="">
                                    <h4>Apellidos:</h4>
                                </div>
                                <div class="">
                                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="apellidos" name="apellidos" class="validate" required>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="">
                                  <h4>Telefono:</h4>
                                </div>
                                <div class="">
                                    <input class="form-control me-2" type="text" placeholder="" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" aria-label="Usuario" id="telefono" name="telefono" class="validate" required>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="">
                                    <h4>Nombre de usuario:</h4>
                                </div>
                                <div class="">
                                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="username" name="username" class="validate" required>
                                </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="password-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title"> Cambio de contraseña</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="password-form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_actual">Clave actual</label>   
                                            <input id="clave_actual" type="password" name="clave_actual" class="validate form-control" required/>
                                            
                                    </div>
                                    <br>
                                    <div class="center-align">
                                        <label>CLAVE NUEVA</label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_nueva_1">Clave</label>
                                            <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate form-control" required/>
                                            
                                            
                                    </div>
                                    <br>
                                    
                                    <div class="form-group">
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_nueva_2">Confirmar clave</label>   
                                            <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate form-control" required/>
                                            
                                    </div>        
                                </div>  
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> ');
                  
              } else {
                  header('location: main.php');
              }
            } else if($_SESSION['id_tipo_emp']==2) {
              if ($filename != 'index.php') {
                print('
          <header>
          <div class="container-fluid">
          <div class="row ">
            <nav class="nav">
              <!-- Columna Logo -->
              <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
                <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>
                
              </div>
              <!-- Columna Logo pero para mobile -->
              <div class="col-10 d-none d-lg-block " id="SeccionImagen">

                <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>

              </div>
              <!-- Columna de Boton usuario pero para Pequeños -->
              <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
                <a href="#" onclick="openProfileDialog()" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white"><button class="btn btn-primary ">
                  <i class="far fa-user"></i>
                </button></a>
                <a href="#" onclick="logOut()">
                  <i class="fas fa-sign-out-alt"></i>
                </button></a>
                
              </div>
              <!-- Columna para perfil pero en usuarios de pantalla grande -->
              <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
              <button class="btn btncontra"><a href="#" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#password-modal" class="text-white"><i class="fas fa-shield-alt"></i> Cambiar contraseña</a></button>
              <button class="btn btnperfill"><a href="#" onclick="openProfileDialog()"data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white" id="fontmen"><i class="far fa-user"></i> Perfil</a></button>
              <button class="btn btncerrar" id="cerrar">
                <i href="#" id="fontmen" onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</i>
                </button>
              </div>
            </nav>
          </div>

        </div>

        <div class="container-fluid " id="BarraNav">
          <div class="row">

            <nav class="navbar navbar-expand-lg navbar-light SecBarra">
              <div class="container-fluid">
                <!-- Parte del NAVBAR MOBILE -->
                <a class="navbar-brand d-lg-none" href="#">Navegación</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="col-12 d-lg-none">
                  <div class="collapse navbar-collapse " id="navbarNav">
                    <ul class="navbar-nav  ">
                      <!-- Opciones -->
                      <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="gestion_proveedores.php">PROVEEDORES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="gestion_equipo.php">EQUIPO</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="gestion_empleados.php">EMPLEADOS</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="agenda.php">AGENDA</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="Pais.php">PAÍSES</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="bitacora.php">BITÁCORA</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="Reportes.php">REPORTES</a>
                      </li>

                    </ul>
                  </div>
                </div>
                  <!-- Navbar Normal -->
                <div class="col-12 d-none d-lg-block MenuSec">
                  <ul class="nav justify-content-center">
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="fas fa-user"></i><a href="gestion_empleados.php" id="fontmen"> EMPLEADOS </a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/aire.svg" class="text-center" style="max-width:20%;width:20px;height:auto;"><a href="gestion_equipo.php" id="fontmen"> EQUIPO</a></button>
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="fas fa-truck-moving"></i><a href="gestion_proveedores.php" id="fontmen"> PROVEEDORES</a></button>
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-flag"></i><a href="Pais.php" id="fontmen"> PAÍSES</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-clipboard"></i><a href="bitacora.php" id="fontmen"> BITÁCORA</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-calendar-alt"></i><a href="agenda.php" id="fontmen"> AGENDA</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/reportes.svg" class="text-center" style="max-width:20%;width:13px;height:auto;"><a href="Reportes.php" id="fontmen"> REPORTES</a></button> 
                    </li>
                  </ul>
                </div>
              </div>
          </div>
          </nav>
        </div>
        </div>
      </header>
      <main>
      <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Perfil</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="profile-form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <div class="">
                                    <h4>Nombres:</h4>
                                </div>
                                <div class="">
                                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="nombres" name="nombres" class="validate" required>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="">
                                    <h4>Apellidos:</h4>
                                </div>
                                <div class="">
                                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="apellidos" name="apellidos" class="validate" required>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="">
                                  <h4>Telefono:</h4>
                                </div>
                                <div class="">
                                    <input class="form-control me-2" type="text" placeholder="" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" aria-label="Usuario" id="telefono" name="telefono" class="validate" required>
                                </div>
                                </div>
                                <div class="form-group">
                                <div class="">
                                    <h4>Nombre de usuario:</h4>
                                </div>
                                <div class="">
                                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="username" name="username" class="validate" required>
                                </div>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="password-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title"> Cambio de contraseña</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form id="password-form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_actual">Clave actual</label>   
                                            <input id="clave_actual" type="password" name="clave_actual" class="validate form-control" required/>
                                    </div>
                                    <br>
                                    <div class="center-align">
                                        <label>CLAVE NUEVA</label>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_nueva_1">Clave</label>
                                            <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate form-control" required/>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                            <i class="fas fa-shield-alt"></i>
                                            <label for="clave_nueva_2">Confirmar clave</label>   
                                            <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate form-control" required/>
                                            
                                    </div>        
                                </div>  
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> 
            ');
            } else {
                header('location: main.php');
            }
        } else if($_SESSION['id_tipo_emp']==3) {
          if ($filename != 'index.php') {
            print('
      <header>
      <div class="container-fluid">
      <div class="row ">
        <nav class="nav">
          <!-- Columna Logo -->
          <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
            <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>
            
          </div>
          <!-- Columna Logo pero para mobile -->
          <div class="col-10 d-none d-lg-block " id="SeccionImagen">

            <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>

          </div>
          <!-- Columna de Boton usuario pero para Pequeños -->
          <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
            <a href="#" onclick="openProfileDialog()" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white"><button class="btn btn-primary ">
              <i class="far fa-user"></i>
            </button></a>
            <a href="#" onclick="logOut()">
              <i class="fas fa-sign-out-alt"></i>
            </button></a>
            
          </div>
          <!-- Columna para perfil pero en usuarios de pantalla grande -->
          <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
          <button class="btn btncontra"><a href="#" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#password-modal" class="text-white"><i class="fas fa-shield-alt"></i> Cambiar contraseña</a></button>
          <button class="btn btnperfill"><a href="#" onclick="openProfileDialog()"data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white" id="fontmen"><i class="far fa-user"></i> Perfil</a></button>
          <button class="btn btncerrar" id="cerrar">
            <i href="#" id="fontmen" onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</i>
            </button>
          </div>
        </nav>
      </div>

    </div>

    <div class="container-fluid " id="BarraNav">
      <div class="row">

        <nav class="navbar navbar-expand-lg navbar-light SecBarra">
          <div class="container-fluid">
            <!-- Parte del NAVBAR MOBILE -->
            <a class="navbar-brand d-lg-none" href="#">Navegación</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="col-12 d-lg-none">
              <div class="collapse navbar-collapse " id="navbarNav">
                <ul class="navbar-nav  ">
                  <!-- Opciones -->
                  <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="gestion_proveedores.php">PROVEEDORES</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gestion_equipo.php">EQUIPO</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="gestion_empleados.php">EMPLEADOS</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="agenda.php">AGENDA</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Pais.php">PAÍSES</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="bitacora.php">BITÁCORA</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="Reportes.php">REPORTES</a>
                  </li>

                </ul>
              </div>
            </div>
              <!-- Navbar Normal -->
            <div class="col-12 d-none d-lg-block MenuSec">
              <ul class="nav justify-content-center">
                <li class="nav-item p-1">
                  <button type="button" class="btn botonAnim"><i class="far fa-clipboard"></i><a href="bitacora.php" id="fontmen"> BITÁCORA</a></button> 
                </li>
                <li class="nav-item p-1">
                  <button type="button" class="btn botonAnim"><i class="far fa-calendar-alt"></i><a href="agenda.php" id="fontmen"> AGENDA</a></button> 
                </li>
                <li class="nav-item p-1">
                  <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/reportes.svg" class="text-center" style="max-width:20%;width:13px;height:auto;"><a href="Reportes.php" id="fontmen"> REPORTES</a></button> 
                </li>
              </ul>
            </div>
          </div>
      </div>
      </nav>
    </div>
    </div>
  </header>
  <main>
  <div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Perfil</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="profile-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                            <div class="">
                                <h4>Nombres:</h4>
                            </div>
                            <div class="">
                                <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="nombres" name="nombres" class="validate" required>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="">
                                <h4>Apellidos:</h4>
                            </div>
                            <div class="">
                                <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="apellidos" name="apellidos" class="validate" required>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="">
                              <h4>Telefono:</h4>
                            </div>
                            <div class="">
                                <input class="form-control me-2" type="text" placeholder="" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" aria-label="Usuario" id="telefono" name="telefono" class="validate" required>
                            </div>
                            </div>
                            <div class="form-group">
                            <div class="">
                                <h4>Nombre de usuario:</h4>
                            </div>
                            <div class="">
                                <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="username" name="username" class="validate" required>
                            </div>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="password-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modal-title"> Cambio de contraseña</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form id="password-form" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                        <i class="fas fa-shield-alt"></i>
                                        <label for="clave_actual">Clave actual</label>   
                                        <input id="clave_actual" type="password" name="clave_actual" class="validate form-control" required/>
                                </div>
                                <br>
                                <div class="center-align">
                                    <label>CLAVE NUEVA</label>
                                </div>
                                <br>
                                <div class="form-group">
                                        <i class="fas fa-shield-alt"></i>
                                        <label for="clave_nueva_1">Clave</label>
                                        <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate form-control" required/>
                                </div>
                                <br>
                                <div class="form-group">
                                        <i class="fas fa-shield-alt"></i>
                                        <label for="clave_nueva_2">Confirmar clave</label>   
                                        <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate form-control" required/>
                                        
                                </div>        
                            </div>  
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div> 
        ');
        } else {
            header('location: main.php');
        }
      } else if($_SESSION['id_tipo_emp']==4) {
        if ($filename != 'index.php') {
          print('
    <header>
    <div class="container-fluid">
    <div class="row ">
      <nav class="nav">
        <!-- Columna Logo -->
        <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
          <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>
          
        </div>
        <!-- Columna Logo pero para mobile -->
        <div class="col-10 d-none d-lg-block " id="SeccionImagen">

          <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>

        </div>
        <!-- Columna de Boton usuario pero para Pequeños -->
        <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
          <a href="#" onclick="openProfileDialog()" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white"><button class="btn btn-primary ">
            <i class="far fa-user"></i>
          </button></a>
          <a href="#" onclick="logOut()">
            <i class="fas fa-sign-out-alt"></i>
          </button></a>
          
        </div>
        <!-- Columna para perfil pero en usuarios de pantalla grande -->
        <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
        <button class="btn btncontra"><a href="#" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#password-modal" class="text-white"><i class="fas fa-shield-alt"></i> Cambiar contraseña</a></button>
        <button class="btn btnperfill"><a href="#" onclick="openProfileDialog()"data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white" id="fontmen"><i class="far fa-user"></i> Perfil</a></button>
        <button class="btn btncerrar" id="cerrar">
          <i href="#" id="fontmen" onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</i>
          </button>
        </div>
      </nav>
    </div>

  </div>

  <div class="container-fluid " id="BarraNav">
    <div class="row">

      <nav class="navbar navbar-expand-lg navbar-light SecBarra">
        <div class="container-fluid">
          <!-- Parte del NAVBAR MOBILE -->
          <a class="navbar-brand d-lg-none" href="#">Navegación</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="col-12 d-lg-none">
            <div class="collapse navbar-collapse " id="navbarNav">
              <ul class="navbar-nav  ">
                <!-- Opciones -->
                <li class="nav-item">
                  <a class="nav-link" aria-current="page" href="gestion_proveedores.php">PROVEEDORES</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="gestion_equipo.php">EQUIPO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="gestion_empleados.php">EMPLEADOS</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="agenda.php">AGENDA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Pais.php">PAÍSES</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="bitacora.php">BITÁCORA</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="Reportes.php">REPORTES</a>
                </li>

              </ul>
            </div>
          </div>
            <!-- Navbar Normal -->
          <div class="col-12 d-none d-lg-block MenuSec">
            <ul class="nav justify-content-center">
            <li class="nav-item p-1">
              <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/aire.svg" class="text-center" style="max-width:20%;width:20px;height:auto;"><a href="gestion_equipo.php" id="fontmen"> EQUIPO</a></button>
            </li>
            <li class="nav-item p-1">
              <button type="button" class="btn botonAnim"><i class="fas fa-truck-moving"></i><a href="gestion_proveedores.php" id="fontmen"> PROVEEDORES</a></button>
            </li>
            <li class="nav-item p-1">
              <button type="button" class="btn botonAnim"><i class="far fa-calendar-alt"></i><a href="agenda.php" id="fontmen"> AGENDA</a></button> 
            </li>
            </ul>
          </div>
        </div>
    </div>
    </nav>
  </div>
  </div>
</header>
<main>
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modal-title">Perfil</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <form id="profile-form" method="post" enctype="multipart/form-data">
                          <div class="form-group">
                          <div class="">
                              <h4>Nombres:</h4>
                          </div>
                          <div class="">
                              <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="nombres" name="nombres" class="validate" required>
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="">
                              <h4>Apellidos:</h4>
                          </div>
                          <div class="">
                              <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="apellidos" name="apellidos" class="validate" required>
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="">
                            <h4>Telefono:</h4>
                          </div>
                          <div class="">
                              <input class="form-control me-2" type="text" placeholder="" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" aria-label="Usuario" id="telefono" name="telefono" class="validate" required>
                          </div>
                          </div>
                          <div class="form-group">
                          <div class="">
                              <h4>Nombre de usuario:</h4>
                          </div>
                          <div class="">
                              <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="username" name="username" class="validate" required>
                          </div>
                          </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                  </div>
              </form>
              </div>
          </div>
      </div>
      <div class="modal fade" id="password-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modal-title"> Cambio de contraseña</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                              <form id="password-form" method="post" enctype="multipart/form-data">
                              <div class="form-group">
                                      <i class="fas fa-shield-alt"></i>
                                      <label for="clave_actual">Clave actual</label>   
                                      <input id="clave_actual" type="password" name="clave_actual" class="validate form-control" required/>
                              </div>
                              <br>
                              <div class="center-align">
                                  <label>CLAVE NUEVA</label>
                              </div>
                              <br>
                              <div class="form-group">
                                      <i class="fas fa-shield-alt"></i>
                                      <label for="clave_nueva_1">Clave</label>
                                      <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate form-control" required/>
                              </div>
                              <br>
                              <div class="form-group">
                                      <i class="fas fa-shield-alt"></i>
                                      <label for="clave_nueva_2">Confirmar clave</label>   
                                      <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate form-control" required/>
                                      
                              </div>        
                          </div>  
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div> 
          ');
        } else {
            header('location: main.php');
        }
      } else if($_SESSION['id_tipo_emp']==5) {
        if ($filename != 'index.php') {
          print('
          <header>
  <div class="container-fluid">
  <div class="row ">
    <nav class="nav">
      <!-- Columna Logo -->
      <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
        <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>
        
      </div>
      <!-- Columna Logo pero para mobile -->
      <div class="col-10 d-none d-lg-block " id="SeccionImagen">

        <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>

      </div>
      <!-- Columna de Boton usuario pero para Pequeños -->
      <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
        <a href="#" onclick="openProfileDialog()" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white"><button class="btn btn-primary ">
          <i class="far fa-user"></i>
        </button></a>
        <a href="#" onclick="logOut()">
          <i class="fas fa-sign-out-alt"></i>
        </button></a>
        
      </div>
      <!-- Columna para perfil pero en usuarios de pantalla grande -->
      <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
      <button class="btn btncontra"><a href="#" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#password-modal" class="text-white"><i class="fas fa-shield-alt"></i> Cambiar contraseña</a></button>
      <button class="btn btnperfill"><a href="#" onclick="openProfileDialog()"data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white" id="fontmen"><i class="far fa-user"></i> Perfil</a></button>
      <button class="btn btncerrar" id="cerrar">
        <i href="#" id="fontmen" onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</i>
        </button>
      </div>
    </nav>
  </div>

</div>

<div class="container-fluid " id="BarraNav">
  <div class="row">

    <nav class="navbar navbar-expand-lg navbar-light SecBarra">
      <div class="container-fluid">
        <!-- Parte del NAVBAR MOBILE -->
        <a class="navbar-brand d-lg-none" href="#">Navegación</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-12 d-lg-none">
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav  ">
              <!-- Opciones -->
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="gestion_proveedores.php">PROVEEDORES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="agenda.php">AGENDA</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Pais.php">PAÍSES</a>
              </li>

            </ul>
          </div>
        </div>
          <!-- Navbar Normal -->
        <div class="col-12 d-none d-lg-block MenuSec">
          <ul class="nav justify-content-center">
            <li class="nav-item p-1">
              <button type="button" class="btn botonAnim"><i class="fas fa-truck-moving"></i><a href="gestion_proveedores.php" id="fontmen"> PROVEEDORES</a></button>
            </li>
            <li class="nav-item p-1">
              <button type="button" class="btn botonAnim"><i class="far fa-flag"></i><a href="Pais.php" id="fontmen"> PAÍSES</a></button> 
            </li>
            <li class="nav-item p-1">
              <button type="button" class="btn botonAnim"><i class="far fa-calendar-alt"></i><a href="agenda.php" id="fontmen"> AGENDA</a></button> 
            </li>
          </ul>
        </div>
      </div>
  </div>
  </nav>
</div>
</div>
</header>
<main>
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profile-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <div class="">
                            <h4>Nombres:</h4>
                        </div>
                        <div class="">
                            <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="nombres" name="nombres" class="validate" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="">
                            <h4>Apellidos:</h4>
                        </div>
                        <div class="">
                            <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="apellidos" name="apellidos" class="validate" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="">
                          <h4>Telefono:</h4>
                        </div>
                        <div class="">
                            <input class="form-control me-2" type="text" placeholder="" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" aria-label="Usuario" id="telefono" name="telefono" class="validate" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="">
                            <h4>Nombre de usuario:</h4>
                        </div>
                        <div class="">
                            <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="username" name="username" class="validate" required>
                        </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="password-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title"> Cambio de contraseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="password-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                
                                    <i class="fas fa-shield-alt"></i>
                                    <label for="clave_actual">Clave actual</label>   
                                    <input id="clave_actual" type="password" name="clave_actual" class="validate form-control" required/>
                                    
                            </div>
                            <br>
                            <div class="center-align">
                                <label>CLAVE NUEVA</label>
                            </div>
                            <br>
                            <div class="form-group">
                                
                                    <i class="fas fa-shield-alt"></i>
                                    <label for="clave_nueva_1">Clave</label>
                                    <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate form-control" required/>
                                    
                                    
                            </div>
                            <br>
                            
                            <div class="form-group">
                                    <i class="fas fa-shield-alt"></i>
                                    <label for="clave_nueva_2">Confirmar clave</label>   
                                    <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate form-control" required/>
                                    
                            </div>        
                        </div>  
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> ');
      } else {
          header('location: main.php');
      }
    }
      if( $_SESSION['id_tipo_emp']== 6) {
        if ($filename != 'index.php') {
          print('
          <header>
  <div class="container-fluid">
  <div class="row ">
    <nav class="nav">
      <!-- Columna Logo -->
      <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
        <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>
        
      </div>
      <!-- Columna Logo pero para mobile -->
      <div class="col-10 d-none d-lg-block " id="SeccionImagen">

        <a href="main.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>

      </div>
      <!-- Columna de Boton usuario pero para Pequeños -->
      <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
        <a href="#" onclick="openProfileDialog()" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white"><button class="btn btn-primary ">
          <i class="far fa-user"></i>
        </button></a>
        <a href="#" onclick="logOut()">
          <i class="fas fa-sign-out-alt"></i>
        </button></a>
        
      </div>
      <!-- Columna para perfil pero en usuarios de pantalla grande -->
      <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
      <button class="btn btncontra"><a href="#" data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#password-modal" class="text-white"><i class="fas fa-shield-alt"></i> Cambiar contraseña</a></button>
      <button class="btn btnperfill"><a href="#" onclick="openProfileDialog()"data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white" id="fontmen"><i class="far fa-user"></i> Perfil</a></button>
      <button class="btn btncerrar" id="cerrar">
        <i href="#" id="fontmen" onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</i>
        </button>
      </div>
    </nav>
  </div>

</div>

<div class="container-fluid " id="BarraNav">
  <div class="row">

    <nav class="navbar navbar-expand-lg navbar-light SecBarra">
      <div class="container-fluid">
        <!-- Parte del NAVBAR MOBILE -->
        <a class="navbar-brand d-lg-none" href="#">Navegación</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="col-12 d-lg-none">
          <div class="collapse navbar-collapse " id="navbarNav">
            <ul class="navbar-nav  ">
              <!-- Opciones -->
              <li class="nav-item">
                <a class="nav-link" href="gestion_equipo.php">EQUIPO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="agenda.php">AGENDA</a>
              </li>
            </ul>
          </div>
        </div>
          <!-- Navbar Normal -->
        <div class="col-12 d-none d-lg-block MenuSec">
          <ul class="nav justify-content-center">
            <li class="nav-item p-1">
              <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/aire.svg" class="text-center" style="max-width:20%;width:20px;height:auto;"><a href="gestion_equipo.php" id="fontmen"> EQUIPO</a></button>
            </li>
            <li class="nav-item p-1">
              <button type="button" class="btn botonAnim"><i class="far fa-calendar-alt"></i><a href="agenda.php" id="fontmen"> AGENDA</a></button> 
            </li>
          </ul>
        </div>
      </div>
  </div>
  </nav>
</div>
</div>
</header>
<main>
<div class="modal fade" id="profile" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Perfil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="profile-form" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <div class="">
                            <h4>Nombres:</h4>
                        </div>
                        <div class="">
                            <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="nombres" name="nombres" class="validate" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="">
                            <h4>Apellidos:</h4>
                        </div>
                        <div class="">
                            <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="apellidos" name="apellidos" class="validate" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="">
                          <h4>Telefono:</h4>
                        </div>
                        <div class="">
                            <input class="form-control me-2" type="text" placeholder="" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" aria-label="Usuario" id="telefono" name="telefono" class="validate" required>
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="">
                            <h4>Nombre de usuario:</h4>
                        </div>
                        <div class="">
                            <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" id="username" name="username" class="validate" required>
                        </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="password-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title"> Cambio de contraseña</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="password-form" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                
                                    <i class="fas fa-shield-alt"></i>
                                    <label for="clave_actual">Clave actual</label>   
                                    <input id="clave_actual" type="password" name="clave_actual" class="validate form-control" required/>
                                    
                            </div>
                            <br>
                            <div class="center-align">
                                <label>CLAVE NUEVA</label>
                            </div>
                            <br>
                            <div class="form-group">
                                
                                    <i class="fas fa-shield-alt"></i>
                                    <label for="clave_nueva_1">Clave</label>
                                    <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate form-control" required/>
                                    
                                    
                            </div>
                            <br>
                            
                            <div class="form-group">
                                    <i class="fas fa-shield-alt"></i>
                                    <label for="clave_nueva_2">Confirmar clave</label>   
                                    <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate form-control" required/>
                                    
                            </div>        
                        </div>  
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> ');
          
      } else {
          header('location: main.php');
      }
  }
} else {
      if ($filename != 'index.php') {
          header('location: index.php ');
      } else {
          print('
              <header>
              <div class="container-fluid">
                  <div class="row ">
                      <nav class="navbar">
                          <!-- Columna Logo -->
                          <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
                              <img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt="">
                          </div>
                      <!-- Imagen en Mobile -->
                          <div class="col-12 d-none d-lg-block " id="SeccionImagen">
                              <img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt="">
                          </div>
                        </nav>
                  </div>
              </div>
          </header>
          <main>    
          ');
      }
  }
}
    
    /*
    

    *   Método para imprimir la plantilla del pie.
    *
    *   Parámetros: $controller (nombre del archivo que sirve como controlador de la página web).
    *
    *   Retorno: ninguno.
    */
    public static function footerTemplate($controller)
    {
        // Se comprueba si existe una sesión de administrador para imprimir el pie respectivo del documento.
        if (isset($_SESSION['id_empleado'])) {
            $scripts = '
           

            <!-- Script de Fontawesome -->
            <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
            <!-- Script de Bootstrap -->
            <script type="text/javascript" src="../../resources/js/autocomplete.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            
            <script type="text/javascript" src="../../resources/js/vanilla-dataTables.min.js"></script>
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="../../app/helpers/components.js"></script>
            <script type="text/javascript" src="../../app/controllers/account.js"></script>
            <script type="text/javascript" src="../../app/controllers/' . $controller . '"></script>
            ';
        } else {
            $scripts = '
            <!-- Script de Fontawesome -->
            <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
            <script type="text/javascript" src="../../resources/js/vanilla-dataTables.min.js"></script>
            <script type="text/javascript" src="../../resources/js/autocomplete.js"></script>
            <!-- Script de Bootstrap -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="../../app/helpers/components.js"></script>
            <script type="text/javascript" src="../../app/controllers/' . $controller . '"></script>

            ';
        }
        print('
        <footer>
            <!-- Derechos Reservados -->
            <div class="text-center p-3" id="ptDerechos">
            © 2021 <b id="fontmen">Derechos reservados |</b>
                <a class="text-blue" href="http://www.megafrio.com/" id="fontmen"><u>MegaFrío </u></a>
            </div>
        </footer>
        <!-- Agregamos SCRIPTS -->
                    ' . $scripts . '
            </body>
        </html>
        ');
    }    
}
?> 