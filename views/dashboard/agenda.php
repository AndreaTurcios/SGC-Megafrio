<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Agenda');
?>

<br>
<section>

            <div class="container">
                <div class="row">

                    <div class="modal fade" id="ModalCreate" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modal-title">Actualizar Empleados</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="update-form" method="post" enctype="multipart/form-data">
                                <div class="form-group d-none">
                                    <label for="formGroupExampleInput">ID:</label>
                                    <input type="text" class="form-control " placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="id_empleado" type="text"
                                        name="id_empleado" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">Nombres:</label>
                                    <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="nombres_emp2" type="text"
                                        name="nombres_emp2" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">Apellidos:</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ej: MalteHC..." aria-label="Buscar"
                                        aria-describedby="basic-addon1" id="apellidos_emp2" type="text"
                                        name="apellidos_emp2" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">correo:</label>
                                    <input type="text" class="form-control"
                                        placeholder="Ej: fulanito@gmail.com..." aria-label="Buscar"
                                        aria-describedby="basic-addon1" id="correo_emp2" type="text"
                                        name="correo_emp2" class="validate" required>
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput3">Alias:</label>
                                    <input type="text" class="form-control" placeholder="Ej: MalteHC..."
                                        aria-label="Buscar" aria-describedby="basic-addon1" id="alias_emp2" type="text"
                                        name="alias_emp2" class="validate" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="tipo_empleado2">Tipo empleado:</label>
                                    <select class="form-select" aria-label="Select" id="tipo_empleado2" name="tipo_empleado2">
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="estado_emp2">estado empleado:</label>
                                    <select class="form-select" aria-label="Select" id="estado_emp2" name="estado_emp2">
                                    </select>
                                </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Guardar Cambios</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>



            
                    <div class="col-12 text-center">
            
                        <div class="row">
                            <div class="col-12 text-center" id="Titulo1">
                                <h1>Agenda para este dia</h1>
                            </div>
                            <nav class="navbar navbar-light bg-light">
                                <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
                                    <form class="d-flex" method="post" id="search-form">
                                        <input id = "search" placeholder="Ingrese el nombre del cliente" class="form-control me-2" type="text" name ="search" required/>
                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                            aria-describedby="basic-addon1" id="fecha_nac_cli"
                                            name="fecha_nac_cli" class="validate" required>
                                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                                    </form>
                                    </div>
                                    
                                
                                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#Modalcreate">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
                                        viewBox="0 0 16 16">
                                        <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                    </svg>
                                    Agregar
                                    </button>
                                
                                </div>
                            </nav>
            
                            <div class="col-12 p- text-center">
                                <div class="table-responsive">
                                    <table class="table table-dark table-striped" id="tabla_emp">
                                        <thead>
            
                                            <tr>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Apellidos</th>
                                                <th scope="col">Correo</th>
                                                <th scope="col">Alias</th>
                                                <th scope="col">Tipo emp</th>
                                                <th scope="col">Estado_emp</th>
                                                <th class="actions-column">Acciones</th>
                                            </tr>
                                        </thead>

                                        <tbody id="tbody-rows">
                                        </tbody>
                                    </table>
                                </div>
            
            
                            </div>
                        </div>
            
                    </div>
                </div>
            </div>
            </section>






<?php
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::footerTemplate('agenda.js');
?>