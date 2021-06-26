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
                
                
            } else {
                header('location: index.php');
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