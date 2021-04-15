<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>

<body>
    <div class="container">
    <br>
  <center>
    <h1 class="center">Vista - proveedor 
      <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bag-check" viewBox="0 0 16 16">
      <path fill-rule="evenodd" d="M10.854 8.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
      <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
      </svg>
    </h1>
  </center>
  <hr>
    <br><br>

      <div class="row">
        <div class="col form-derecha">
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
                  Filtro de busqueda
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
                    <th scope="col">Compañía</th>
                    <th scope="col">Representante</th>
                    <th scope="col">Tel. Proveedor</th>
                    <th scope="col">Descripción proveedor</th>
                    <th scope="col">País</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Compañía 1</td>
                    <td>María Ramírez</td>
                    <td>7474-7474</td>
                    <td>Direccion del proveedor número 1</td>
                    <td>Chile</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Compañía 2</td>
                    <td>Enrique Álfaro</td>
                    <td>7474-7474</td>
                    <td>Dirección del proveedor número 2</td>
                    <td>Colombia</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td>Compañía 3</td>
                    <td>Carlos Enrique</td>
                    <td>7474-7474</td>
                    <td>Dirección del proveedor número 3</td>
                    <td>Costa Rica</td>
                  </tr>
                  <tr>
                    <th scope="row">4</th>
                    <td>Compañía 4</td>
                    <td>Laura Maldonado</td>
                    <td>7474-7474</td>
                    <td>Dirección del proveedor número 4</td>
                    <td>El Salvador</td>
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