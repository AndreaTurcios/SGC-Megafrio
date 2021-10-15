<?php
//Se incluye la clase con las plantillas del documento
require_once('../../app/helpers/dashboard_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Equipo');
?>

<body>
  <div class="container">
    <br>
    <div class="row">
      <div class="col-12 text-center" id="Titulo1">
        <h1>Gestión Equipos</h1>
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
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center">
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAgregarEquipo">
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

            <div id="ModalAgregarEquipo" class="modal fade">
              <div class="container-fluid">
                <form method="post" id="save-form">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">

                        <h5 class="modal-title" id="exampleModalLabel">Agregar equipos</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>

                      <!--Aquí comenzamos con el body del modal -->
                      <div class="modal-body">
                        <div class="container">
                          <div class="row">
                            <form id="save-form" method="post" enctype="multipart/form-data">
                              <div class="form-group ">
                                <label for="nombre_equipo">Nombre equipo:</label>
                                <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" autocomplete="off"
                                  placeholder="Equipo">
                              </div>
                              <div class="form-group">
                                <label for="descripcion_equipo">Descripcion:</label>
                                <input type="text" class="form-control" id="descripcion_equipo" autocomplete="off"
                                  name="descripcion_equipo" placeholder="Descripcion">
                              </div>
                              <div class="form-group">
                                <label for="precio_equipo">Precio:</label>
                                <input type="number" class="form-control" id="precio_equipo" name="precio_equipo" autocomplete="off"
                                  min="100.0" max="999.99">
                              </div>
                              <div class="form-group">
                                <label for="modelo">Modelo:</label>
                                <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label for="voltaje">Voltaje:</label>
                                <input type="text" class="form-control" id="voltaje" name="voltaje" autocomplete="off"
                                  placeholder="voltaje">
                              </div>
                              <div class="form-group">
                                <label for="serie">Serie:</label>
                                <input type="text" class="form-control" id="serie" name="serie" placeholder="Serie" autocomplete="off">
                              </div>
                              <div class="form-group">
                                <label>Proveedor: </label>
                                <select id="nombre_compania" name="nombre_compania" class="form-select">
                                  <option selected></option>
                                </select>
                              </div>

                              <!--<div class="form-group">
                                <label>Tipo equipo: </label>
                                <select id="tipo_equipo" name="tipo_equipo" class="form-select" onchange="cambio()">
                                  <option selected></option>
                                  <option>Otro</option>
                                </select>
                                <input type="hidden" id="equipo_name" name="equipo_name" value="">
                              </div>-->

                              <div class="form-group">
                                <label>Tipo equipo: </label>
                                <select id="tipo_equipo" name="tipo_equipo" class="form-select">
                                  <option selected></option>
                                </select>
                              </div>
                              
                                  <label><input name="chec" type="checkbox" id="chec" onChange="d1(this);"/> Otro</label><br>
                                  <input id="prg1" name='prg1' size='50' placeholder="Específicar..." type='text' class="form-control"/>
                              
                              
                              <div class="form-group">
                                <label>Capacidad: </label>
                                <select id="capacidad" name="capacidad" class="form-select">
                                  <option selected></option>
                                </select>
                              </div>
                              
                              <div class="file-field input-field col s12 m6">
                              <br>
                                <div data-tooltip="Seleccione una imagen de al menos 500x500">
                                  <input id="archivo_producto" type="file" class="form-control" name="archivo_producto"
                                    accept=".gif, .jpg, .png" />
                                </div>
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
  <div class="row">
    <div class="table-responsive" class="col scroll">
      <table id="data-table" class="table table-bordered text-center">
        <thead class="table-info">
          <tr>
            <th scope="col">Nombre equipo</th>
            <th scope="col">Descripción</th>
            <th scope="col">Precio</th>
            <th scope="col">Modelo</th>
            <th scope="col">Voltaje</th>
            <th scope="col">Serie</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Tipo equipo</th>
            <th scope="col">Capacidad</th>
            <th scope="col">Foto</th>
            <th scope="col">Controladores</th>
          </tr>
        </thead>
        <tbody id="tbody-rows">
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
          <h5 class="modal-title" id="modal-title">Actualizar Equipo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="update-form" method="post" enctype="multipart/form-data">
          <div class="form-group d-none">
            <label for="formGroupExampleInput">ID:</label>
            <input type="text" class="form-control " placeholder="" aria-label="Buscar" aria-describedby="basic-addon1"
              id="id_equipo2" type="text" name="id_equipo2" class="validate" required>
          </div>
          <div class="modal-body text-center">

            <div class="form-group">
              <label for="nombre_equipo2">Nombre equipo:</label>
              <input type="text" class="form-control" id="nombre_equipo2" name="nombre_equipo2"
                placeholder="Nombre equipo" required minlength="3" maxlength="50" />
            </div>
            <div class="form-group">
              <label for="descripcion_equipo2">Descripcion:</label>
              <input class="form-control" id="descripcion_equipo2" type="text" name="descripcion_equipo2"
                placeholder="Descripcion" required minlength="3" maxlength="50" />
            </div>
            <div class="form-group">
              <label for="precio_equipo2">Precio:</label>
              <input type="number" class="form-control" id="precio_equipo2" name="precio_equipo2" min="100.0"
                max="999.99">
            </div>
            <div class="form-group">
              <label for="modelo2">Modelo:</label>
              <input type="text" class="form-control" id="modelo2" name="modelo2" placeholder="Modelo">
            </div>
            <div class="form-group">
              <label for="voltaje2">Voltaje:</label>
              <input type="text" class="form-control" id="voltaje2" name="voltaje2" placeholder="voltaje">
            </div>
            <div class="form-group">
              <label for="serie2">Serie:</label>
              <input type="text" class="form-control" id="serie2" name="serie2" placeholder="Serie">
            </div>
            <div class="input-field col s12 m6">
              <label>Proveedor: </label>
              <select id="nombre_compania2" name="nombre_compania2" class="form-select">
                <option selected></option>
              </select>
            </div>
            <div class="input-field col s12 m6">
              <label>Tipo equipo: </label>
              <select id="tipo_equipo2" name="tipo_equipo2" class="form-select">
                <option selected></option>
              </select>
            </div>
            <div class="input-field col s12 m6">
              <label>Capacidad: </label>
              <select id="capacidad2" name="capacidad2" class="form-select">
                <option selected></option>
              </select>
            </div>
            <div class="file-field input-field col s12 m6">
              <br>
              <div data-tooltip="Seleccione una imagen de al menos 500x500">
                <input id="archivo_producto" class="form-control" type="file" name="archivo_producto" accept=".gif, .jpg, .png" />
              </div>
            </div>
            <br>
            <div class="form-group">
              <div class="input-field col s12 m6">

              </div>
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
  <!-- Creación de modal gráficos equipos tanto funcionales como no funcionales-->
  <div class="modal fade" id="graficosEquipo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Gráficas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!--Formulario del gráfico donde se envía el ID -->
        <form action="post" id="send-form">
          <div class="form-group d-none">
            <label for="formGroupExampleInput">ID:</label>
            <input type="number" id="idEquipo" name="idEquipo" required>
          </div>
          <div class="modal-body">
            <!--Gráfico que muestra la cantidad de unidades tanto funcionales y no funcionales del equipo solicitado -->
            <canvas id="chartEquipo"></canvas>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>
  <!-- Creación de modal gráficos equipos por tipo servicio-->
  <div class="modal fade" id="graficosEquip" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Gráficas</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <!--Formulario del gráfico donde se envía el ID -->
        <form action="post" id="send-form">
          <div class="form-group d-none">
            <label for="formGroupExampleInput">ID:</label>
            <input type="number" id="idequi" name="idequi" required>
          </div>
          <div class="modal-body">
            <!--Gráfico que muestra el porcentaje de unidades por el tipo de servicio del equipo solicitado -->
            <canvas id="chartEqui"></canvas>
          </div>
      </div>
    </div>
  </div>
  </div>
  </form>

</body>
<script type="text/javascript" src="../../resources/js/chart.js"></script>
<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('equipo.js');
?>