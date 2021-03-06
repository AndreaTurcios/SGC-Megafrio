<?php
// Se incluye la clase con las plantillas del documento.
require_once("../../app/helpers/dashboard_page.php");
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Reportes');
?>

<div class="container">
    <br>
    <div class="row">
        <div class="col-12 text-center" id="Titulo1">
            <h1>Generar Reportes</h1>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="row">
            <div class="col-12">
                <!-- Agregamos los cuadritos -->
                <div class="row">
                    <!-- Proveedores -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-3 col-xxl-6 text-center">
                        <a href="../../app/reports/proveedoresg.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/proveedoress.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Proveedores</h4>
                                </div>
                            </div>
                        </a>
                    </div>  
                    <!-- Equipo -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-3 col-xxl-6 text-center">
                        <a href="../../app/reports/equiposg.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/equipos.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Equipos</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Clientes -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-3 col-xxl-6 text-center">
                        <a href="../../app/reports/clientesg.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/clientes.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Clientes</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Empleados -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 p-3 col-xxl-6 text-center">
                        <a href="../../app/reports/empleadosg.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/proveedores.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Empleados</h4>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>


<?php
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::footerTemplate('ignoreme.js');
?>>