<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeaderLogin.php");

?>

    
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
                        
                            <!-- Titulo de iniciar Sesion -->
                            <div class="row" id="RowTitulo">
                                <div class="col-12" id="TituloLogin">
                                    <h3>Iniciar Sesion</h3>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-4   p-1 d-flex flex-row">
                                    <h4>Usuario:</h4>
                                </div>
                                <div class="col-8">
                                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-4 p-1 d-flex flex-row">
                                    <h4>Contraseña:</h4>
                                </div>
                                <div class="col-8">
                                    <input class="form-control me-2" type="password" placeholder="" aria-label="Usuario">
                                </div>
                            </div>
                            <br>
                            <div class="row" id="EspacioBlanco">

                            </div>
                            <div class="row" id="CajaBoton" >
                                <div class="col-12 text-center">
                                        <a href="#">Ingresar</a>
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-12" id="SolicitarContra">
                                    <a href="#">Solicitar una nueva contraseña</a>
                                </div>
                            </div>
                            <br>
                            
                            <div class="row" id="EspacioBlanco2">

                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>



      

    </div>
    
    
    <?php
    //Se incluye la plantilla del encabezado para la página web
    include("../../app/helpers/plantillaFooter.php");
    ?>