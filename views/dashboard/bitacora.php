<?php
//Se incluye la clase con las plantillas del documento
require_once('../../app/helpers/dashboard_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Bitácora');
?>


<div class="container">
    <div class="row">
        <div class="col-12 text-center" id="Titulo1">
            <h1>Bitácora</h1>
        </div>
    </div>

    <div class="row">
        <nav class="navbar navbar-light bg-light">

            <div class="container-fluid">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
                    <form class="d-flex" method="post" id="search-form">
                        <input class="form-control me-2" id="search" name="search" type="date" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>


                <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center"
                    id="MuestraBTN">
                    
                </div>


                <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 "
                    id="MuestraBTN">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#AgregarBitacora">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor"
                            class="bi bi-plus" viewBox="0 0 16 16">
                            <path
                                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg>
                        Agregar
                    </button>

                    <!-- Modal -->
                    <form id="save-form" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="AgregarBitacora" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Agregar bitácora</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Fecha</label>
                                        <input type="date" class="form-control " placeholder=""  aria-describedby="basic-addon1" id="fecha" name="fecha"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Hora</label>
                                        <input type="time" class="form-control " placeholder="" aria-describedby="basic-addon1" id="hora" name="hora"/>
                                    </div>

                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Ubicacion</label>
                                        <input type="text" class="form-control " placeholder=""   aria-describedby="basic-addon1" id="ubicacion" name="ubicacion" type="text"/>
                                    </div>
                                        <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Cliente</label>
                                        <select id="cliente" name="cliente"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Empleado</label>
                                        <select id="empleado" name="empleado"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Tipo de Servicio</label>
                                        <select id="tipo_servicio" name="tipo_servicio"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Equipo</label>
                                        <select id="equipo" name="equipo"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Estado del Equipo</label>
                                        <select id="estado_equipo" name="estado_equipo"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Tipo de Pago</label>
                                        <select id="tipo_pago" name="tipo_pago"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Archivo</label>
                                            <input id="archivo"type="file"name="archivo"accept=".pdf"/><br>
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type ="submit" class="btn waves-effect blue tooltipped"data-tooltip="Guardar" >Guardar</button><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>



                    <form id="update-form" method="post" enctype="multipart/form-data">
                    <div class="modal fade" id="ActualizarBitacora" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Actualizar Bitácora</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="id_bitacora">ID</label>
                                        <input type="text" class="form-control d-none" placeholder=""
                                            aria-describedby="basic-addon1" id="id_bitacora" name="id_bitacora"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Fecha</label>
                                        <input type="date" class="form-control " placeholder=""
                                            aria-describedby="basic-addon1" id="fecha2" name="fecha2" />
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Hora</label>
                                        <input type="time" class="form-control " placeholder=""
                                            aria-describedby="basic-addon1" id="hora2" name="hora2" />
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Ubicacion</label>
                                        <input class="form-control " placeholder=""
                                            aria-describedby="basic-addon1" id="ubicacion2" name="ubicacion2" type="text"/>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Cliente</label>
                                        <select id="cliente2" name="cliente2"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Empleado</label>
                                        <select id="empleado2" name="empleado2"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Tipo de Servicio</label>
                                        <select id="tipo_servicio2" name="tipo_servicio2"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Equipo</label>
                                        <select id="equipo2" name="equipo2"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Estado del Equipo</label>
                                        <select id="estado_equipo2" name="estado_equipo2"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Tipo de Pago</label>
                                        <select id="tipo_pago2" name="tipo_pago2"></select>
                                    </div>
                                    <br>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Archivo</label>
                                            <input id="archivo2"type="file"name="archivo2"accept=".pdf" />
                                    </div>
                                    
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                        <button type ="submit" class="btn waves-effect blue tooltipped"data-tooltip="Guardar" >Guardar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
        </nav>

    </div>

    <div class="row">

        <div class="table-responsive" class="col scroll">
            <table class="table table-bordered">
                <thead class="table-info">
                    <tr>
                        <th scope="col">Cliente</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Tipo de Servicio</th>
                        <th scope="col">Equipo</th>
                        <th scope="col">Estado Equipo</th>
                        <th scope="col">Tipo de Pago</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Archivo</th>
                        <th scope="col">Controladores</th>
                    </tr>
                </thead>
                <tbody id="tbody-rows">

                </tbody>
            </table>
        </div>



    </div>
</div>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('bitacora.js');
?>