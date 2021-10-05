<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Iniciar sesión');
?>

<div class="animated bounceInUp">
<div class="container">

    <br>

    <div class="container" id="ContainerLogin">
        <!-- Caja de la IMAGEN -->
        <div class="row text-center">
            <div class="col-6 text-center d-none d-lg-block" id="CajaImagen">
                <br>
                <br>
                <br>
                <br>
                <br>
                <img src="../../resources/img/materiales/equipo.png" class="img-fluid" alt="">
            </div>

            <!-- Caja de los Datos -->
        
            <div class="col-12 col-lg-6" id="CajaDatos">
                <div class="container">

                    <br>
                    <form method="post" id="session-form">
                    <!-- Titulo de iniciar Sesion -->
                    <div class="row" id="RowTitulo">
                        <div class="col-12" id="TituloLogin">
                            <h3>- Iniciar sesión -</h3>
                        </div>
                    </div>

                    <br>
                    <!-- Usuario y Su Imput -->
                    <div class="row">
                        <div class="col-4   p-1 d-flex flex-row">
                            <h4>Usuario:</h4>
                        </div>
                        <div class="col-8">
                            <input class="form-control me-2" type="text" placeholder="Ingrese su nombre de usuario" aria-label="Usuario" name="username" class="validate" autocomplete="off" required>
                        </div>
                    </div>
                    <br>

                    <!-- Contraseña y su input -->
                    <div class="row">
                        <div class="col-4 p-1 d-flex flex-row">
                            <h4>Contraseña:</h4>
                        </div>
                        <div class="col-8">
                            <input class="form-control me-2" type="password" placeholder="Ingrese su contraseña" aria-label="Usuario" name="clave" class="validate" autocomplete="off" required>
                        </div>
                    </div>
                    <br>
                    <!-- Espacio en blanco para separar -->
                    <div class="row" id="EspacioBlanco">

                    </div>
                    <!-- Espacio para boton -->
                    <div class="row">
                        <div class="col-12 text-center">
                            <button class="btn btniniciar" class="tooltipped" data-tooltip="Ingresar" id='login'>Ingresar</button>
                        </div>
                    </div>
                    <br>
                    <!-- Espacio para solicitar nueva contra -->
                    <div class="row">
                        <div class="col-12" id="SolicitarContra">
                            <a href="recuperacion.php">He olvidado mi contraseña</a>
                        </div>
                    </div>
                    <br>
                    <!-- EspacioBlanco para separar -->
                    <div class="row" id="EspacioBlanco2">

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

    <form method="post" id="confirmar-form">
                <!-- Modal -->
                <div class="modal fade" id="confirmar-modal" tabindex="-1" aria-labelledby="confirmar-modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresa el codigo de confirmacion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <input type="text" class="form-select" id="codigo" autocomplete="off" name="codigo">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Salir</button>
                            <button  type="submit" class="btn btn-primary">Confirmar</button>
                        </div>
                        </div>
                    </div>
                </div>
    </form>




</div>


<?php
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::footerTemplate('login.js');
?>