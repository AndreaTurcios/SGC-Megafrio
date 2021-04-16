<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>
<!--Aquí comenzamos abriendo la sección -->
<section>
  <br>
  <div class="container">
    <div class="row">
      <!--Container con su respectivo título de pestaña, en este caso, proveedores -->
      <div class="col-12 text-center" id="Titulo1">
        <h1 class="center">Gestión de empleados
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor"
            class="bi bi-person-lines-fill" viewBox="0 0 16 16">
            <path
              d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z" />
          </svg>
        </h1>
      </div>
    </div>
    <br>
    <div class="row">
      <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
          <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
            <form class="d-flex">
              <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Buscar</button>
            </form>
          </div>
          <!--Aquí en el botón de los filtros creamos un dropdown para poner las respectivas opciones -->
          <div class="form-group">
                          <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuLink3"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Filtros de búsqueda
                            </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                <a class="dropdown-item" href="#">Nombre</a>
                                <a class="dropdown-item" href="#">Apellido</a>
                                <a class="dropdown-item" href="#">Usuario</a>
                                <a class="dropdown-item" href="#">Tipo empleado</a>
                              </div>
                            </div>
                          </div>
          <!--Aquí arrancamos con el botón agregar para abrir el modal -->
          <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
            <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAgregarEmpleado">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus"
                viewBox="0 0 16 16">
                <path
                  d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
              </svg>
              Agregar
            </button>
            <!--Colocamos el div para el modal -->
            <div class="modal fade" id="ModalAgregarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingrese los siguientes datos:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <form>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Nombre empleado:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Nombre empleado">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Apellido empleado:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="Apellido empleado">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Teléfono:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Teléfono">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Usuario:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Clave:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Clave">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Dirección:</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Dirección"
                            rows="3"></textarea>
                        </div>
                        <!--Colocamos los divs para el dropdown del filtro de búsqueda -->
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Tipo empleado:</label>
                          <div class="form-group">
                          <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuLink3"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Filtros de búsqueda
                            </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                <a class="dropdown-item" href="#">Admin</a>
                                <a class="dropdown-item" href="#">Auxiliar</a>
                                <a class="dropdown-item" href="#">Técnico</a>
                                <a class="dropdown-item" href="#">Supervisor</a>
                              </div>
                            </div>
                          </div>
                            <br>
                            <br>
                      </form>
                    </div>
                    <!--Colocamos el div del footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                      <button class="btn btn-success">Guardar</button><br>
                      <hr>
                      <button type="button" class="btn btn-primary">Modificar</button>
                      <button class="btn btn-danger">Eliminar</button><br>
                      <hr>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </nav>
      <br>
      <!--Colocamos la tabla -->
      <div class="row">
        <div class="col scroll">
          <table class="table table-hover">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Usuario</th>
                <th scope="col">Dirección</th>
                <th scope="col">Tipo empleado</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Pedro Josué</td>
                <td>Enrique</td>
                <td>7474-7474</td>
                <td>Pedro</td>
                <td>Colonia Los Robles</td>
                <td>Administrador</td>
              </tr>
              <tr>
                <th scope="row">2</th>
                <td>Alberto Escobar</td>
                <td>Flores</td>
                <td>7474-7474</td>
                <td>Alberto</td>
                <td>Colonia La Rabida</td>
                <td>Auxiliar</td>
              </tr>
              <tr>
                <th scope="row">3</th>
                <td>María de Dolores</td>
                <td>Aguilar</td>
                <td>7474-7474</td>
                <td>María</td>
                <td>Cumbres de Cuscatlán</td>
                <td>Técnico</td>
              </tr>
              <tr>
                <th scope="row">4</th>
                <td>Ashley María</td>
                <td>Antonieta</td>
                <td>7474-7474</td>
                <td>AshleyM</td>
                <td>Santa Elena</td>
                <td>Supervisor</td>
              </tr>
              <tr>
                <th scope="row">5</th>
                <td>Juan Alberto</td>
                <td>Enrique</td>
                <td>7474-7474</td>
                <td>Juan</td>
                <td>Colonia Maquilishuat</td>
                <td>Auxiliar</td>
              </tr>
              <tr>
                <th scope="row">6</th>
                <td>Adriana Marcela</td>
                <td>Hernández</td>
                <td>7474-7474</td>
                <td>Pedro</td>
                <td>Colonia San Benito</td>
                <td>Auxiliar</td>
              </tr>
              <tr>
                <th scope="row">7</th>
                <td>Francis Aguirre</td>
                <td>Alcocer</td>
                <td>7474-7474</td>
                <td>Pedro</td>
                <td>Residencial Palmira</td>
                <td>Supervisor</td>
              </tr>
              <tr>
                <th scope="row">8</th>
                <td>Josefina María</td>
                <td>Alberú</td>
                <td>7474-7474</td>
                <td>Pedro</td>
                <td>Colonia Escalón</td>
                <td>Técnico</td>
              </tr>
              <tr>
                <th scope="row">9</th>
                <td>Jorge Héctor</td>
                <td>Cruz</td>
                <td>7474-7474</td>
                <td>JorgeHe</td>
                <td>Residencial las Piletas</td>
                <td>Auxiliar</td>
              </tr>
              <tr>
                <th scope="row">10</th>
                <td>Luis Felipe</td>
                <td>Alcántar</td>
                <td>7474-7474</td>
                <td>LuisFe</td>
                <td>La Montaña</td>
                <td>Supervisor</td>
              </tr>
              <tr>
                <th scope="row">11</th>
                <td>Héctor Gerardo</td>
                <td>Alonso</td>
                <td>7474-7474</td>
                <td>Pedro</td>
                <td>Gerardo</td>
                <td>Técnico</td>
              </tr>
              <tr>
                <th scope="row">12</th>
                <td>Jesús Carlos</td>
                <td>Calderón</td>
                <td>7474-7474</td>
                <td>Calderón</td>
                <td>Lomas de San Francisco</td>
                <td>Supervisor</td>
              </tr>
              <tr>
                <th scope="row">13</th>
                <td>Víctor Hugo</td>
                <td>Enrique</td>
                <td>7474-7474</td>
                <td>Hugo</td>
                <td>Constitución</td>
                <td>Auxiliar</td>
              </tr>
              <tr>
                <th scope="row">14</th>
                <td>Juan Manuel</td>
                <td>Calleja</td>
                <td>7474-7474</td>
                <td>JuanM</td>
                <td>Santa Tecla</td>
                <td>Auxiliar</td>
              </tr>
              <tr>
                <th scope="row">15</th>
                <td>Juan Eberto</td>
                <td>Briones</td>
                <td>7474-7474</td>
                <td>JuanE</td>
                <td>San Jacinto</td>
                <td>Supervisor</td>
              </tr>
              <tr>
                <th scope="row">16</th>
                <td>Eduardo</td>
                <td>Burgos</td>
                <td>7474-7474</td>
                <td>Burgos</td>
                <td>La Libertad</td>
                <td>Técnico</td>
              </tr>
            </tbody>
          </table>
          <!--Cerramos la tabla -->
        </div>
      </div>
    </div>
  </div>
  </div>

  
  <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
</section>

<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>