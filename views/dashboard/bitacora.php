<?php
//Se incluye la clase con las plantillas del documento
include("../../app/helpers/plantillaHeader.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
plantillaHeader::headerTemplate('Gestión de bitácora');
?>

<div class="container">
    <div class="row">
        <div class="col-12 text-center" id="Titulo1">
            <h1>Bitacora</h1>
        </div>
    </div>

    <div class="row">
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid">
                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                    </form>
                </div>


                <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center"
                    id="MuestraBTN">
                    <div class="dropdown">
                       
                        
                    </div>
                </div>


                <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center"
                    id="MuestraBTN">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalBitacora">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
                        viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                    </svg>
                        Agregar
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="ModalBitacora" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!-- Partes del modal para hacer insert -->
                                    <div class="modal-body">
                                        <div class="container">

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Nombre</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder=""
                                                            aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>




                                        </div>
                                    </div>
                                    <!-- Botones de Control -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                </div>

            </div>
        </nav>
    </div>
</div>


<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>