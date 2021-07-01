<?php
//Se incluye la clase con las plantillas del documento
include("../../app/helpers/plantillaHeader.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
plantillaHeader::headerTemplate('Gestión País');
?>

              <section>
                <div  class="container">
                <br>
                  <div class="row">
                      <div class="col-12 text-center" id="Titulo1">
                          <h1>Gestión País</h1>
                      </div>
                  </div>
                  <br>
                    
                    <!-- Creacion del buscador -->
                    <div class="mx-auto" class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-1">
                      <div class="row">
                      <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3" >
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>

          

                    <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#ModalAgregarPais">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
                            viewBox="0 0 16 16">
                              <path
                              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg>
                            Agregar
                        </button>


                    <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
                    <div id="ModalAgregarPais" class="modal fade">
            <div class="container-fluid">
            <form method="post" id="save-form">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Agregar pais</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!--Aquí comenzamos con el body del modal -->
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <form>
                        <div class="form-group ">
                          <label for="nombre_pais">Nombre pais:</label>
                          <input type="text" class="form-control" id="nombre_pais" name="nombre_pais" placeholder="Pais">
                        </div>
                        <div class="form-group">
                          <label for="codigo_postal">Codigo postal:</label>
                          <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="codigo postal">
                        </div>
                      <br>

                <!--Aquí arrancamos con el footer del modal -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type ="submit" class="btn btn-success">Guardar</button><br>
                  <hr>
                 <br>
                  <hr>
                  
                  </div>
                    </div>
                </div>
                </div>
                </form>
                  </div>
                </div>
              </div>
            </div>
                        
                    </div>

                </div>
            </nav>

            <!-- Creacion de la tabla -->
                      </div>
                      <br>
                      <div class="row">
                        <div class="col scroll">
                          <table  class="table table-bordered text-center">
                            <thead class="table-info">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre_pais</th>
                                <th scope="col">Codigo_postal</th>
                                <th scope="col">Controladores</th>
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
                </section>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
plantillaHeader::footerTemplate('pais.js');
?>