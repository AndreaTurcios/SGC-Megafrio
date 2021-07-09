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
                <!-- Agregamos LibroCSS -->
                <link rel="stylesheet" href="../../resources/css/Estilos/style.css">
                <link rel="stylesheet" href="../../resources/css/Estilos/login.css">
                
                <title>SGC Mega Frio</title>
            </head>
            <body>          
        ');
        // Se obtiene el nombre del archivo de la página web actual.
        $filename = basename($_SERVER['PHP_SELF']);
        // Se comprueba si existe una sesión de administrador para mostrar el menú de opciones, de lo contrario se muestra un menú vacío.
        if (isset($_SESSION['id_empleado'])) {
            if(isset($_SESSION['id_tipo_emp']) === 6) {
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
                        <a href="perfil.php"><button class="btn btn-primary ">
                          <i class="far fa-user"></i>
                        </button></a>
                        
                      </div>
                      <!-- Columna para perfil pero en usuarios de pantalla grande -->
                      <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
                        <button class="btn btnperfill"><a href="#" onclick="openProfileDialog()"data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white"><i class="far fa-user"></i> Perfil</a></button>
                        <button class="btn btncerrar" id="cerrar">
                          <i href="#" onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</i>
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
                              <button type="button" class="btn botonAnim"><i class="fas fa-user"></i><a href="gestion_empleados.php"> EMPLEADOS</a></button> 
                            </li>
                            <li class="nav-item p-1">
                              <button type="button" class="btn botonAnim"><i class="fas fa-shopping-basket"></i><a href="gestion_clientes.php"> CLIENTES</a></button> 
                            </li>
                            <li class="nav-item p-1">
                              <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/aire.svg" class="text-center" style="max-width:20%;width:20px;height:auto;"><a href="gestion_equipo.php"> EQUIPO</a></button>
                            </li>
                            <li class="nav-item p-1">
                              <button type="button" class="btn botonAnim"><i class="fas fa-truck-moving"></i><a href="gestion_proveedores.php"> PROVEEDORES</a></button>
                            </li>
                            <li class="nav-item p-1">
                              <button type="button" class="btn botonAnim"><i class="far fa-flag"></i><a href="Pais.php"> PAÍSES</a></button> 
                            </li>
                            <li class="nav-item p-1">
                              <button type="button" class="btn botonAnim"><i class="far fa-clipboard"></i><a href="bitacora.php"> BITÁCORA</a></button> 
                            </li>
                            <li class="nav-item p-1">
                              <button type="button" class="btn botonAnim"><i class="far fa-calendar-alt"></i><a href="agenda.php"> AGENDA</a></button> 
                            </li>
                            <li class="nav-item p-1">
                              <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/reportes.svg" class="text-center" style="max-width:20%;width:13px;height:auto;"><a href="Reportes.php"> REPORTES</a></button> 
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
                    </div>');
                  
              } else {
                  header('location: main.php');
              }
            } else{
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
                <a href="perfil.php"><button class="btn btn-primary ">
                  <i class="far fa-user"></i>
                </button></a>
                
              </div>
              <!-- Columna para perfil pero en usuarios de pantalla grande -->
              <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
                <button class="btn btnperfill"><a href="#" onclick="openProfileDialog()"data-tooltip="profile" data-bs-toggle="modal" data-bs-target="#profile" class="text-white"><i class="far fa-user"></i> Perfil</a></button>
                <button class="btn btncerrar" id="cerrar">
                  <i href="#" onclick="logOut()"><i class="fas fa-sign-out-alt"></i> Cerrar sesión</i>
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
                      <button type="button" class="btn botonAnim"><i class="fas fa-user"></i><a href="gestion_empleados.php"> EMPLEADOS</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="fas fa-shopping-basket"></i><a href="gestion_clientes.php"> CLIENTES</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/aire.svg" class="text-center" style="max-width:20%;width:20px;height:auto;"><a href="gestion_equipo.php"> EQUIPO</a></button>
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="fas fa-truck-moving"></i><a href="gestion_proveedores.php"> PROVEEDORES</a></button>
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-flag"></i><a href="Pais.php"> PAÍSES</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-clipboard"></i><a href="bitacora.php"> BITÁCORA</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><i class="far fa-calendar-alt"></i><a href="agenda.php"> AGENDA</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn botonAnim"><img src="../../resources/img/logos/reportes.svg" class="text-center" style="max-width:20%;width:13px;height:auto;"><a href="Reportes.php"> REPORTES</a></button> 
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
            </div>');
                
            } else {
                header('location: main.php');
            }
            }
            
        } else {
            // 
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
            <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="../../app/helpers/components.js"></script>
            <script type="text/javascript" src="../../app/controllers/account.js"></script>
            <script type="text/javascript" src="../../app/controllers/' . $controller . '"></script>
            ';
        } else {
            $scripts = '
            <!-- Script de Fontawesome -->
            <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
            <!-- Script de Bootstrap -->
            <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
            <script type="text/javascript" src="../../resources/js/sweetalert.min.js"></script>
            <script type="text/javascript" src="../../app/helpers/components.js"></script>
            <script type="text/javascript" src="../../app/controllers/' . $controller . '"></script>
            ';
        }
        print('
        <footer>
            <!-- Derechos Reservados -->
            <div class="text-center p-3" id="ptDerechos">
            © 2021 <b>Derechos reservados |</b>
                <a class="text-blue" href="http://www.megafrio.com/"><u>MegaFrío </u></a>
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