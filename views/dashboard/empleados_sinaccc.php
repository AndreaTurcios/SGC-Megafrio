<?php
//Se incluye la clase con las plantillas del documento
require_once("../../app/helpers/dashboard_page.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Registro de Empleados');
?>
<!--Aquí comenzamos abriendo la sección -->
<section>  
  <br>
  <div class="container">
    <div class="row">  
      <!--Container con su respectivo título de pestaña, en este caso, proveedores -->
      <div class="col-12 text-center" id="Titulo1">
        <!-- Colocamos el h1 con su respectivo título, este caso la estión de empleados -->
        <h1 class="center">Registro de empleados</h1>
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
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAgregarEmpleado">
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
    <br>
    <!-- Aquí agregamos la tabla la cual será responsive donde se mostrarán los respectivos datos -->
    <div class="row">
      <div class="table-responsive" class="col scroll">
        <table id="data-table" class="table table-bordered">
          <thead class="table-info">
            <div id="bordes">
              <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Estado</th>
                <th scope="col">Tipo empleado</th>
                <th scope="col">Controlador</th>
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
          <div id="ModalAgregarEmpleado" class="modal fade">
            <div class="container-fluid">
              <form method="post" id="save-form">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <!-- Aquí va el título del modal -->
                      <h4 id="modal-title" class="center-align">Agregar empleados</h4>
                      <!-- Quí va el botón para cerrar el modal -->
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Aquí va el div para colocar el cuerpo del modal -->
                    <div class="modal-body">
                      <div class="container">
                        <div class="form-group">
                          <label for="nombre_emp">Nombre empleado:</label>
                          <input type="text" class="form-control" id="nombre_emp" name="nombre_emp"
                            placeholder="Nombre empleado" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" required minlength="3"
                            maxlength="50" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                          <label for="apellido_emp">Apellido empleado:</label>
                          <input class="form-control" id="apellido_emp" type="text" name="apellido_emp"
                            placeholder="Apellido empleado" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" required
                            minlength="3" maxlength="50" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                          <label for="telefono_emp">Teléfono:</label>
                          <!-- Aquí colocamos el input, pero el onkeypress es para no ingresar letras en el 
                          input ya que es del teléfono-->
                          <input type="text" class="form-control" id="telefono_emp" name="telefono_emp" autocomplete="off"
                            placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" required minlength="9"
                            maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        </div>
                        <br>
                        <div class="input-field col s12 m6">
                          <label>Estado: </label>
                          <select class="form-select" id="estado" name="estado">
                            <option selected>Seleccione un estado</option>
                            <option value="1">Activo</option>
                            <option value="0">Bloqueado</option>
                          </select>
                          <br>
                        </div>
                     
                      <!--Colocamos los divs para el dropdown del filtro de búsqueda -->
                      <div class="form-group">
                        <label>Tipo empleado: </label>
                        <select class="form-select" id="tipoemp" name="tipoemp">
                          <option selected></option>
                        </select>
                      </div>
                      <br>
                      </div>
                      <!--Colocamos el div del footer -->
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" id="btnguardar" class="btn waves-effect blue tooltipped"
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
          <h5 class="modal-title" id="modal-title">Actualizar Empleados</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="update-form" method="post" enctype="multipart/form-data">
          <div class="form-group d-none">
            <label for="formGroupExampleInput">ID:</label>
            <input type="text" class="form-control " placeholder="" aria-label="Buscar" aria-describedby="basic-addon1"
              id="id_empleado2" type="text" name="id_empleado2" class="validate" required>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="nombre_emp2">Nombre empleado:</label>
              <input type="text" autocomplete="off" class="form-control" id="nombre_emp2" name="nombre_emp2" placeholder="Nombre empleado"
                pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" required minlength="3" maxlength="50" />
            </div>
            <div class="form-group">
              <label for="apellido_emp2">Apellido empleado</label>
              <input class="form-control" autocomplete="off" id="apellido_emp2" type="text" name="apellido_emp2"
                placeholder="Apellido empleado" pattern="[a-zA-ZñÑáÁéÉíÍóÓúÚ\s]{1,50}" required minlength="3"
                maxlength="50" />
            </div>
            <div class="form-group">
              <label for="telefono_emp2">Teléfono:</label>
              <input type="text" autocomplete="off" class="form-control" id="telefono_emp2" name="telefono_emp2" placeholder="0000-0000"
                pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" required minlength="9" maxlength="9"
                onkeyup="this.value = mascara(this.value)" required minlength="9" maxlength="9"
                onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
            </div>
            <br>
            <div class="form-group">
              <div class="input-field col s12 m6">
                <label>Estado: </label>
                <select class="form-select" id="estado2" name="estado2">
                  <option value="1">Activo</option>
                  <option value="0">Bloqueado</option>
                </select>
              </div>
            </div>
            <br>
            <!--Colocamos los divs para el dropdown del filtro de búsqueda -->
            <div class="input-field col s12 m6">
              <label>Tipo empleado: </label>
              <select class="form-select" id="tipoemp2" name="tipoemp2">
                <option selected></option>
              </select>
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
Dashboard_Page::footerTemplate('empleado_sinacc.js');
?>