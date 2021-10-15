<?php
//Se incluye la clase con las plantillas del documento
require_once("../../app/helpers/dashboard_page.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Tipo equipo');
?>
<!--Aquí comenzamos abriendo la sección -->
<section>  
  <br>
  <div class="container">
    <div class="row">  
      <!--Container con su respectivo título de pestaña, en este caso, proveedores -->
      <div class="col-12 text-center" id="Titulo1">
        <!-- Colocamos el h1 con su respectivo título, este caso la estión de empleados -->
        <h1 class="center">Gestión de tipo equipo</h1>
      </div>
    </div>
    <br>
    <!-- Aquí colocamos la sección para buscar y agregar -->
    <div class="row">
      <nav class="navbar navbar-light bg-light">
        <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
          <form class="d-flex" method="post" id="search-form">
            <input id="search" class="form-control me-2" type="text" name="search" required />
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
        </div>

        <!--Aquí en el botón para agregar los datos al modal con el respectivo ícono -->
        <!--El div es por cuestión de estética, antes iba el dropdown con los filtros, pero como el buscador lo hace de manera automática se eliminó -->
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
        </div>
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center">
          
          <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
          Gestiones
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#ModalAgregarTipoEquipo" href="#">Agregar tipo equipo</a></li>
          <li><a class="dropdown-item" href="gestion_equipo.php">Gestionar Equipos</a></li>
          <li><a class="dropdown-item" href="capacidades.php">Gestionar Capacidades</a></li>
        </ul>
      </div>
        </div>
    </div>
    </nav>
    <br>
    <!-- Aquí agregamos la tabla la cual será responsive donde se mostrarán los respectivos datos -->
    <div class="row">
      <div class="table-responsive" class="col scroll">
        <table id="data-table" class="table table-bordered">
          <thead class="table-info">
            <div id="bordes">
              <tr>
                <th scope="col">Tipo equipo</th>
                <th scope="col">Mantenimientos</th>
            </div>
            </tr>
          </thead>
          <tbody id="tbody-rows">
          </tbody>
          <!--Cerramos la tabla -->
        </table>
      </div>
    </div>
    <div class="row">
      <nav>
        <!--Aquí arrancamos con el botón agregar para abrir el modal -->
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
          <!--Colocamos el div para el modal -->
          <div id="ModalAgregarTipoEquipo" class="modal fade">
            <div class="container-fluid">
              <form method="post" id="save-form">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!-- Aquí va el título del modal -->
                      <h4 id="modal-title" class="center-align">Agregar tipo equipo</h4>
                      <!-- Quí va el botón para cerrar el modal -->
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Aquí va el div para colocar el cuerpo del modal -->
                    <div class="modal-body">
                      <div class="container">
                        <div class="form-group">
                         <div class="input-field col s12 m6">
                        <label>Tipo equipo: </label>
                        <input type="text" class="form-control" id="tipo_equipo" name="tipo_equipo" placeholder="Tipo equipo" required />
                      </div>
                      <br>
                    </div>
                      <!--Colocamos el div del footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn waves-effect blue tooltipped"
                          data-tooltip="Guardar">Guardar</button><br>
                      </div>
              </form>
            </div>
          </div>
        </div>
    </div>
    </nav>
    <br>
    <!--Modal fade -->
  </div>

  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modal-title">Actualizar tipo equipo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="update-form" method="post" enctype="multipart/form-data">
          <div class="form-group d-none">
            <label for="formGroupExampleInput">ID:</label>
            <input type="text" class="form-control " placeholder="" aria-label="Buscar" aria-describedby="basic-addon1"
              id="id_tipo_equipo2" type="text" name="id_tipo_equipo2" class="validate" required>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="tipo_equipo2">Tipo equipo:</label>
              <input type="text" class="form-control" id="tipo_equipo2" name="tipo_equipo2" placeholder="Nombre empleado"
                pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" required minlength="3" maxlength="50" />
            </div>
          </div>
          <br>
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
Dashboard_Page::footerTemplate('tipo_equipo.js');
?>