<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>

<body>
<br>
  <center>
    <h1 class="center">Gestión de empleados
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-file-earmark-person" viewBox="0 0 16 16">
      <path d="M11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
      <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2v9.255S12 12 8 12s-5 1.755-5 1.755V2a1 1 0 0 1 1-1h5.5v2z"/>
    </svg>
    </h1>
    <center>
    <hr>
    <br><br>
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 form-izquierda">
          <form>
            <div class="form-group">
              <label for="formGroupExampleInput">Nombre empleado:</label>
              <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Nombre empleado">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Apellido empleado:</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Apellido empleado">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput2">Teléfono:</label>
              <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Telefono">
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
              <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Direccion"
                rows="3"></textarea>
            </div>
            <div class="form-group">
              <label for="exampleFormControlTextarea1">Tipo empleado:</label>
              <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  Tipo empleado
                </a>

                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                  <a class="dropdown-item" href="#">Auxiliar</a>
                  <a class="dropdown-item" href="#">Técnico</a>
                  <a class="dropdown-item" href="#">Supervisor</a>
                </div>
              </div>
            </div>
            <br>

          </form>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-1 form-derecha">
          <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-9">
              <form class="form-inline my-2 my-lg-0">
                <div class="row">
                  <div class="col-9">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                  </div>
                  <div class="col-3">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
              <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Filtro de búsqueda
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                  <a class="dropdown-item" href="#">filtro 1</a>
                  <a class="dropdown-item" href="#">filtro 2</a>
                  <a class="dropdown-item" href="#">filtro 3</a>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col scroll">
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Direccion</th>
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
            </div>
          </div>
        </div>
      </div>
    </div>

  <script src="../../resources/js/bootstrap/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
</body>

<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>