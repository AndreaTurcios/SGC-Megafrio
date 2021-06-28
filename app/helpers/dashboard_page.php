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
            // 
            if ($filename != 'index.php') {
                print('
          <header>
          <div class="container-fluid">
          <div class="row ">
            <nav class="nav">
              <!-- Columna Logo -->
              <div class="col-11 col-xs-11 col-sm-11 d-lg-none text-center">
                <a href="paginaPrincipal.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>
                
              </div>
              <!-- Columna Logo pero para mobile -->
              <div class="col-10 d-none d-lg-block " id="SeccionImagen">

                <a href="paginaPrincipal.php"><img src="../../resources/img/logos/iconPNG.png" class="img-fluid" alt=""></a>

              </div>
              <!-- Columna de Boton usuario pero para Pequeños -->
              <div class="col-1 col-xs-1 col-sm-1 d-lg-none text-left" id="mnSuperiorMobile">
                <a href="perfil.php"><button class="btn btn-primary ">
                  <i class="far fa-user"></i>
                </button></a>
                
              </div>
              <!-- Columna para perfil pero en usuarios de pantalla grande -->
              <div class="col-12 col-xs-12 col-sm-12 col-lg-2 col-xl-2 col-xxl-2 text-center d-none d-lg-block">
              <a href="perfil.php">
                <button class="btn ">
                  <i class="far fa-user"></i> Perfil
                </button>
              </a>
              <button class="btn" id="cerrar">
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
                        <a class="nav-link" href="GestionEquipo.php">EQUIPO</a>
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
                        <a class="nav-link" href="TipoEntorno.php">ENTORNOS</a>
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
                      <button type="button" class="btn btn-info"> <a href="gestion_empleados.php">EMPLEADOS</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn btn-info"> <a href="gestion_clientes.php">CLIENTES</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn btn-info"> <a href="GestionEquipo.php">EQUIPO</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn btn-info"> <a href="gestion_proveedores.php">PROVEEDORES</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn btn-info"> <a href="TipoEntorno.php">ENTORNOS</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn btn-info"> <a href="Pais.php">PAÍSES</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn btn-info"> <a href="bitacora.php">BITÁCORA</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn btn-info"> <a href="agenda.php">AGENDA</a></button> 
                    </li>
                    <li class="nav-item p-1">
                      <button type="button" class="btn btn-info"> <a href="Reportes.php">REPORTES</a></button> 
                    </li>
                  </ul>
                </div>
              </div>
          </div>
          </nav>
        </div>
        </div>
      </header>
      <main>');
                
            } else {
                header('location: paginaPrincipal.php');
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
                @2021 Derechos Reservados:
                <a class="text-white" href="http://www.megafrio.com/">MegaFrio </a>
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