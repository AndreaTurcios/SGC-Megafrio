<?php
//Se incluye la clase con las plantillas del documento
include("../../app/helpers/dashboard_page.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Gestión Capacidades');
?>

<section>
  <div class="container">
    <br>
    <div class="row">
      <div class="col-12 text-center" id="Titulo1">
        <h1>Gestión Capacidades</h1>
      </div>
    </div>
    <br>

    <div class="row">
      <nav class="navbar navbar-light bg-light">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
          <form class="d-flex" method="post" id="search-form">
            <input id="search" class="form-control me-2" type="text" name="search" required />
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
        </div>

        <!--Aquí en el botón de los filtros creamos un dropdown para poner las respectivas opciones -->
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN1">
          
        </div>
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" text-center">
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAgregarCapacidad">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
              viewBox="0 0 16 16">
              <path
                d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
            </svg>
            Agregar
          </button>
        </div>
    </div>
    </nav>

    <!-- Creacion del buscador -->
    <div class="mx-auto" class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-1">
      <div class="row">

        <div class="container-fluid">


          <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">

            <div id="ModalAgregarCapacidad" class="modal fade">
              <div class="container-fluid">
                <form method="post" id="save-form">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Agregar capacidad</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <!--Aquí comenzamos con el body del modal -->
                      <div class="modal-body">
                        <div class="container">
                          <div class="row">
                            <form>
                              <div class="form-group ">
                                <label for="Capacidad">Capacidad:</label>
                                <input type="text" class="form-control" id="capacidad" name="capacidad"
                                  placeholder="EJ: 18,000 ">
                              </div>
                              <br>
                              <!--Aquí arrancamos con el footer del modal -->
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                  data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn waves-effect blue tooltipped"
                                  data-tooltip="Guardar">Guardar</button><br>
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

  </div>
  </nav>

  <!-- Creacion de la tabla -->
  </div>
  <br>
  <div class="row">
    <div class="col scroll">
      <table id="data-table" class="table table-bordered text-center">
        <thead class="table-info">
          <tr>
            <th scope="col">Capacidad</th>
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

  <!--Modal fade -->
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Actualizar capacidad</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="update-form" method="post" enctype="multipart/form-data">
          <div class="form-group d-none">
            <label for="formGroupExampleInput">ID:</label>
            <input type="text" class="form-control " placeholder="" aria-label="Buscar" aria-describedby="basic-addon1"
              id="id_capacidad2" type="text" name="id_capacidad2" class="validate" required>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="Capacidad2">Capacidad:</label>
              <input type="text" class="form-control" id="capacidad2" name="capacidad2" placeholder="capacidad"
                 required minlength="3" maxlength="50" />
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" data-tooltip="Actualizar" class="btn btn-primary">Guardar Cambios</button>
          </div>
        </form>

      </div>
    </div>
  </div>

</section>


<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('capacidades.js');
?>