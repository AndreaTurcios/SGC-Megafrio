<?php
//Clase para definir las plantillas de las páginas web del sitio público
class Public_Page {
    //Método para imprimir el encabezado y establecer el titulo del documento
    public static function headerTemplate($title) {
        print('
        <!DOCTYPE html>
        <html lang="es">
        
        <head>
            <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0" />
            <title>FarmaStuff Index - '.$title.'</title>
            <!-- CSS  -->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <link href="../../resources/css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection" />
            <link href="../../resources/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
            <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        </head>
        
        <body>
            <nav class="rgb(202, 104, 104)" role="navigation">
                <div class="nav-wrapper container nav">
                    <a class="navbar-brand" href="index.html">
                        <a href="#" data-target="nav-mobile" class="sidenav-trigger left"><i class="material-icons">menu</i></a>
                        <img src="../../resources/img/logoconpng.png" width="95" height="70" class="left">
                        <a id="logo-container" href="#" class="brand-logo left-align">
                            <i class="material-icons" style="font-style: oblique;"></i>
                            <a href="" class="right-align"> 
                            <font color="#fff9c4" size="5" face="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg">FarmaStuff</font>
                            </a>
                        </a>
        
                        
        
                        <ul class="right hide-on-med-and-down">
                            <li><a href="#">Conócenos</a></li>
                            <li><a href="#">Sucursales</a></li>
                            <li><a href="#" class="btn white black-text waves-effect waves-blue-grey lighten-1">Iniciar sesión</a></li>
                        </ul>
        
                        <ul id="nav-mobile" class="sidenav">
                            <li><a href="#">Conócenos</a></li>
                            <li><a href="#">Sucursales</a></li>
                            <li><a href="#" class="btn red black-text waves-effect waves-blue-grey lighten-1">Iniciar sesión</a></li>
                            <hr>
                            <li><a href="#">Promociones</a></li>
                            <li><a href="#">Compra con receta</a></li>
                            <li><a href="#">Compra con seguro</a></li>
                            <li><a href="#">Cesta</a></li>
                            <hr>
                            <ul id="dropdown1" class="dropdown-content">
                                <li><a href="#!">Medicinal</a></li>
                                <li><a href="#!">Conveniencia</a></li>
                                <li class="divider"></li>
                                <li><a href="#!">Ofertas</a></li>
                            </ul>
                            <li>
                                <!-- Dropdown Trigger -->
                                <li><a class="dropdown-trigger btn disabled" href="#!" data-target="dropdown1">Categorías<i class="material-icons right">arrow_drop_down</i></a></li>
                            </li>
                            <li><a href="#" style="color:black;">Promociones</a></li>
                            <li><a href="#" style="color:black;">Compra con receta</a></li>
                            <li><a href="#" style="color:black;">Compra con seguro</a></li>
                        </ul>
                </div>
            </nav>
            <div class="navbars">
            </div>
            <div class="navbarsecond">
            </div>
        
            <nav class="red lighten-5" role="navigation">
                <div class="nav-wrapper container nav">
                    <center>
                        <ul class="right hide-on-med-and-down">
                            <!-- Dropdown Structure -->
                            <ul id="dropdown1" class="dropdown-content">
                                <li><a href="#!">Medicinal</a></li>
                                <li><a href="#!">Conveniencia</a></li>
                                <li class="divider"></li>
                                <li><a href="#!">Ofertas</a></li>
                            </ul>
                            <li>
                                <!-- Dropdown Trigger -->
                                <li><a class="dropdown-trigger btn red lighten-2" href="#!" data-target="dropdown1">Categorías<i class="material-icons right">arrow_drop_down</i></a></li>
                            </li>
                            <li><a href="#" style="color:black;">Promociones</a></li>
                            <li><a href="#" style="color:black;">Compra con receta</a></li>
                            <li><a href="#" style="color:black;">Compra con seguro</a></li>
                            <a href="#" class="red lighten-2 waves-effect waves-light red btn btn-floating btn btn-danger "><i class="material-icons" style="font-style: unset;">add_shopping_cart</i></a>
                        </ul>
        
                        <ul id="nav-mobile" class="sidenav">
                            <li><a href="#" style="color:black;">Promociones</a></li>
                            <li><a href="#" style="color:black;">Compra con receta</a></li>
                            <li><a href="#" style="color:black;">Compra con seguro</a></li>
                        </ul>
                    </center>
                </div>
            </nav>
        
        
            <section class="slider">
                <ul class="slides">
                    <li>
                        <img src="../../resources/img/img1.jpg">
                        <div class="caption center-align">
                            <h1>La mejor farmacia</h3>
                                <h5 class="light grey-text text-lighten-3">FarmaStuff es la página en línea de productos farmaceuticos más popular.</h5>
                                <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
                        </div>
                    </li>
                    <li>
                        <img src="../../resources/img/img3.png">
                        <div class="caption left-align">
                            <h3>Con millones de proovedores alrededor del mundo</h3>
                            <h5 class="light grey-text text-lighten-3">FarmaStuff cuenta con proveedores extranjeros y a nivel nacional, por lo que se encuentra una variedad de productos extensa.</h5>
                            <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
                        </div>
                    </li>
                    <li>
                        <img src="../../resources/img/img2.png">
                        <div class="caption right-align">
                            <h3>Con una extensa variedad de productos</h3>
                            <h5 class="light grey-text text-lighten-3">Más de 3 mil productos de millones de proveedores, ya sea internacionales, o nacionales.</h5>
                            <a href="#" class="btn btn-large white black-text waves-effect waves-grey">Más información</a>
                        </div>
                    </li>
        
                </ul>
            </section>
        
            <main>        
        ');
    }

    //Método para imprimir el pie y establecer el controlador del documento
    public static function footerTemplate($controller) {
        print('
        </main>
     <footer class="page-footer #e57373">
        </div>
            </div>
                <br>
                    <center>
                    <button type="submit" style="background-color: #ef9a9a " class="btn btn-primary btn-xs">Contacto</button>
                    <button type="submit" style="background-color: #ef9a9a" class="btn btn-primary btn-xs">Enlaces</button>
                    <button type="submit" style="background-color: #ef9a9a" class="btn btn-primary btn-xs">Proveedores</button>
                    <button type="submit" style="background-color: #ef9a9a" class="btn btn-primary btn-xs">Red de médicos</button>
                    <button type="submit" style="background-color: #ef9a9a" class="btn btn-primary btn-xs">Términos y condiciones</button>
                    </center>
                            <div class="row pb-3">
                                <div class="col-md-12">
                                    <br>
                                    <center>
                                    <div class="aside">
                                        <a title="Facebook" href="https://es-la.facebook.com/"><img src="../../resources/img/facebook_icon-icons.com_53612.png" width="50" height="50"></a>
                                        <a title="Instagram" href="https://www.instagram.com/Farma_Stuff"><img src="../../resources/img/Instagram_icon-icons.com_66804.png" width="50" height="50"></a>
                                        <a title="Twitter" href="https://twitter.com/?lang=es"><img src="../../resources/img/5294-twitter-i_102511.png" width="50" height="50"></a>
                                    </div>
                                </center>
                                </div>
                            </div>
                        </div>
        
        <!--  En esta zona va el copyright de la página-->
        <div class="footer-copyright">
            <div class="container center footer-text">
                &copf; FarmaStuff - 2021
                </div>
            </div>
        </footer>
        <!--  Scripts-->
        <script src="https://kit.fontawesome.com/35db202371.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script src="../../resources/js/materialize.js"></script>
        <script src="../../resources/js/init.js"></script>
        <script src="../../app/controllers/public/'.$controller.'"></script>


        </body>
        </html>      
    ');
    }
}
?>