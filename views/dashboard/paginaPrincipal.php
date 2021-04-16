<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");

?>

<Section>

    <div class="container">
        <br>
        <div class="row">

            <div class="col-12 text-center" id="Titulo1">
                <h1>Administración</h1>

            </div>

        </div>
        <br>
        <div class="row">
            <div class="col-12">
                <!-- Agregamos los cuadritos -->
                <div class="row">
                    <!-- Proveedores -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 p-3 col-xxl-3 text-center">
                        <a href="gestion_proveedores.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/proveedores.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Proveedores</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Equipo -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 p-3 col-xxl-3 text-center">
                        <a href="GestionEquipo.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/proveedores.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Equipo</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Clientes -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 p-3 col-xxl-3 text-center">
                        <a href="gestion_clientes.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/proveedores.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Clientes</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Empleados -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-3 col-xl-3 p-3 col-xxl-3 text-center">
                        <a href="gestion_empleados.php">
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
        <br>
        <!-- Row para titulo de Visualizar -->
        <div class="row">

            <div class="col-12 text-center" id="Titulo1">
                <h1>Visualizar</h1>

            </div>

        </div>

        <div class="row">
            <div class="col-12">
                <!-- Agregamos los cuadritos -->
                <div class="row">
                    <!-- Agenda -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-3 p-3 col-xxl-6 text-center">
                        <a href="agenda.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/proveedores.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Agenda</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <!-- Bitacora -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-6 col-lg-6 col-xl-3 p-3 col-xxl-6 text-center">
                        <a href="bitacora.php">
                            <div class="row">
                                <div class="col-12" id="BoxSuperior">
                                    <img src="../../resources/img/materiales/proveedores.png" alt="" class="img-fluid">
                                </div>
                                <div class="col-12" id="BoxInferior">
                                    <h4>Bítacora</h4>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <br>
    </div>



</Section>


<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>