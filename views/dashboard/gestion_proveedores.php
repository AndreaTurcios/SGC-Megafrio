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
        <h1 class="center">Gestión de proveedores
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
            <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
          </svg>
        </h1>
      </div>
    </div>
    <br>
    <div class="row">
      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
      </div>
      <!--Aquí en el botón de los filtros creamos un dropdown para poner las respectivas opciones -->
      <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
        <div class="dropdown">
          <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
            Filtros de búsqueda
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
            <li><a class="dropdown-item" href="#">Representate</a></li>
            <li><a class="dropdown-item" href="#">Compañía</a></li>
            <li><a class="dropdown-item" href="#">Teléfono</a></li>
          </ul>
        </div>
      </div>
      <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAgregarProveedor">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
          </svg>
          Agregar
        </button>
      </div>
    </div>
    <!--Aquí creamos la barra de búsqueda y el botón de los filtros de la misma -->
    <div class="row">
      <div class="container-fluid">


        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">

          <!--Aquí comenzamos agregando un div con el id ModalAgregarProveedor -->
          <div class="modal fade" id="ModalAgregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ingrese los siguientes datos:</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!--Aquí comenzamos con el body del modal -->
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <form>
                        <div class="form-group ">
                          <label for="formGroupExampleInput">Nombre compañía:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre compañía">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Representante de la compañía:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Representante de la compañía">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Teléfono proveedor:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Teléfono proveedor">
                        </div>
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">Dirección:</label>
                          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Dirección" rows="3"></textarea>
                        </div>
                        <!--Aquí colocamos un dropdown para elegir el pais de procedencia del proveedor -->
                        <div class="form-group">
                          <label for="exampleFormControlTextarea1">País:</label>
                          <div class="dropdown">
                          <button class="btn dropdown-toggle" type="button" id="dropdownMenuPais"
                          data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              País
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuPais">
                              <a class="dropdown-item" href="#">Chile</a>
                              <a class="dropdown-item" href="#">Honduras</a>
                              <a class="dropdown-item" href="#">Costa Rica</a>
                              <a class="dropdown-item" href="#">El Salvador</a>
                            </div>
                          </div>
                        </div>
                    </div>
                  </div>
                  
                </div>
                <!--Aquí arrancamos con el footer del modal -->
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
        <br>
        <!--Aquí arrancamos con la tabla -->
        <div class="row">
          <div class="col scroll">
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Compañía</th>
                    <th scope="col">Representante</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">País</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Compañía 1</td>
                    <td>Enrique</td>
                    <td>7474-7474</td>
                    <td>El Dariode Altagracia</td>
                    <td>Honduras</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Compañía 2</td>
                    <td>Flores</td>
                    <td>7474-7474</td>
                    <td>Valle Marinadel Tuy</td>
                    <td>Costa Rica</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Compañía 3</td>
                    <td>Aguilar</td>
                    <td>7474-7474</td>
                    <td>Benítez del Valle</td>
                    <td>Chile</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Compañía 4</td>
                    <td>Antonieta</td>
                    <td>7474-7474</td>
                    <td>Santa Elena</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">5</th>
                    <td>Compañía 5</td>
                    <td>Enrique</td>
                    <td>7474-7474</td>
                    <td>Colonia Maquilishuat</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">6</th>
                    <td>Compañía 6</td>
                    <td>Hernández</td>
                    <td>7474-7474</td>
                    <td>Colonia San Benito</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">7</th>
                    <td>Compañía 7</td>
                    <td>Alcocer</td>
                    <td>7474-7474</td>
                    <td>Residencial Palmira</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">8</th>
                    <td>Compañía 8</td>
                    <td>Alberú</td>
                    <td>7474-7474</td>
                    <td>Colonia Escalón</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">9</th>
                    <td>Compañía 9</td>
                    <td>Cruz</td>
                    <td>7474-7474</td>
                    <td>Residencial las Piletas</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">10</th>
                    <td>Compañía 10</td>
                    <td>Alcántar</td>
                    <td>7474-7474</td>
                    <td>La Montaña</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">11</th>
                    <td>Compañía 11</td>
                    <td>Alonso</td>
                    <td>7474-7474</td>
                    <td>Los Manzanos</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">12</th>
                    <td>Compañía 12</td>
                    <td>Calderón</td>
                    <td>7474-7474</td>
                    <td>Lomas de San Francisco</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">13</th>
                    <td>Compañía 13</td>
                    <td>Enrique</td>
                    <td>7474-7474</td>
                    <td>Constitución</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">14</th>
                    <td>Compañía 14</td>
                    <td>Calleja</td>
                    <td>7474-7474</td>
                    <td>Santa Tecla</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">15</th>
                    <td>Compañía 15</td>
                    <td>Briones</td>
                    <td>7474-7474</td>
                    <td>San Jacinto</td>
                    <td>El Salvador</td>
                  </tr>
                  <tr>
                    <th scope="row">16</th>
                    <td>Compañía 16</td>
                    <td>Burgos</td>
                    <td>7474-7474</td>
                    <td>La Libertad</td>
                    <td>El Salvador</td>
                  </tr>
                </tbody>
                <!--Aquí cerramos la tabla -->
              </table>
            </div>

          </div>
        </div>
      </div>
    </div>
    
</section>
<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>
<!--
<br><br>
<script src="../../resources/js/bootstrap/bootstrap.min.js"></script>-->

<script src="../../resources/css/Estilos/style.css"></script>
<script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>


