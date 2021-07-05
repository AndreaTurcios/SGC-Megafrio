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

                                        <input type="date" class="form-control" placeholder="YYYY-MM-DD"
                                            aria-describedby="basic-addon1" id="fecha_actual"
                                            name="fecha_actual" class="validate" required>    
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
                                                <th scope="col">Nombre de cliente</th>
                                                <th scope="col">Nombre de empleado</th>
                                                <th scope="col">Fecha de programación</th>
                                                <th scope="col">Hora de programación</th>
                                                <th scope="col">Fecha provisional</th>
                                                <th scope="col">Hora provisional</th>
                                                <th scope="col">Tarea</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Observaciones</th>
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
                    <div class="modal fade" id="Modalcreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nueva bitácora</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Selecciona un cliente:</label>
                                            <select class="form-select" aria-label="Select" id="cli-select" name="cli-select">
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Fecha de programación:</label>
                                            <!-- Campo de entrada de fecha -->

                                            <input type="date" id="fecha_pro" name="fecha_pro" class="form-control" min="2000-01-01"
                                                max="2023-12-31" step="2" />
                                        </div>
                                        <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Hora de programación:</label>

                                        <input type="time" id="hora_pro" name="hora_pro" class="form-control" min="18:00" max="21:00"
                                            step="3600" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Fecha de provisional:</label>
                                            <!-- Campo de entrada de fecha -->

                                            <input type="date" id="fecha_nal" name="fecha_nal" class="form-control" min="2000-01-01"
                                                max="2023-12-31" step="2" />
                                        </div>
                                        <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Hora de provisional:</label>

                                        <input type="time" id="hora_nal" name="hora_nal" class="form-control" min="18:00" max="21:00"
                                            step="3600" />
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Tarea:</label>
                                            <input type="text" class="form-control" id="tarea" name="tarea">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Selecciona el estado de la tarea:</label>
                                            <select class="form-select" aria-label="Select" id="tarea-select" name="tarea-select">
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Observaciones:</label>
                                            <p><textarea type="text" name="comentario" rows="5" cols="60":></textarea></p>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guardar cambios</button>
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