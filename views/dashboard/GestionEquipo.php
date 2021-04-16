<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>

<body>
  <div class="container">
    <br>
    <div class="row">
      <div class="col-12 text-center" id="Titulo1">
        <h1>Gestión de Equipos</h1>
      </div>

      <div class="mx-auto" class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-1">
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
                <a class="dropdown-item" href="#">Agregar Equipo</a>
              </div>
            </div>
          </div>


          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 MenuSec">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal"
              data-bs-whatever="@getbootstrap">Agregar</button>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <form>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Nombre del equipo:</label>
                        <input type="text" class="form-control" id="TipoEntorno">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Tipo Entorno:</label>
                        <select class="form-select" aria-label="Default select example">
                          <option selected></option>
                          <option value="1">Campo</option>
                          <option value="2">Residencial</option>
                          <option value="3">Centro Comercial</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Estado Equipo:</label>
                        <select class="form-select" aria-label="Default select example">
                          <option selected></option>
                          <option value="1">Dañado</option>
                          <option value="2">Funcional</option>
                          <option value="3">Reparacion</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Proveedor:</label>
                        <select class="form-select" aria-label="Default select example">
                          <option selected></option>
                          <option value="1">FRIO&FRIO</option>
                          <option value="2">Bluecold</option>
                          <option value="3">Cleanair</option>
                        </select>
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Foto Equipo:</label>
                        <input type="image" class="form-control" id="FotoEquipo">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Descripcion del equipo:</label>
                        <input type="text" class="form-control" id="DescripcionEquipo">
                      </div>
                      <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Precio del equipo:</label>
                        <input type="number" class="form-control" id="TipoEntorno">
                      </div>
                    </form>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-primary">Guardar</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="row">
          <div class="col scroll">
            <table border="1" class="table table-bordered">
              <thead class="table-info">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nombre Equipo</th>
                  <th scope="col">Entorno</th>
                  <th scope="col">Estado Equipo</th>
                  <th scope="col">Proveedor</th>
                  <th scope="col">Foto equipo</th>
                  <th scope="col">Descripcion</th>
                  <th scope="col">Precio</th>
                  <th scope="col">Controladores</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th>1</th>
                  <td>SAAS-44</td>
                  <td>Residencial</td>
                  <td>Funcional</td>
                  <td>Cleanair</td>
                  <td><img src="../../resources/img/Aire.jpg" class="img-fluid" alt=""></td>
                  <td>Aire Frio</td>
                  <td>75</td>
                  <td>
                    <button class="btn info">Editar</button>
                    <button class="btn danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <th>2</th>
                  <td>SAAS-72</td>
                  <td>Oficinas</td>
                  <td>Funcional</td>
                  <td>COLDAIR</td>
                  <td><img src="../../resources/img/Aire.jpg" class="img-fluid" alt=""></td>
                  <td>Aire Frio</td>
                  <td>45</td>
                  <td>
                    <button class="btn info">Editar</button>
                    <button class="btn danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>SAAS-12</td>
                  <td>Residencial</td>
                  <td>Funcional</td>
                  <td>AIR&AIR</td>
                  <td><img src="../../resources/img/Aire.jpg" class="img-fluid" alt=""></td>
                  <td>Aire Frio</td>
                  <td>67</td>
                  <td>
                    <button class="btn info">Editar</button>
                    <button class="btn danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">4</th>
                  <td>SAAS-52</td>
                  <td>Oficinas</td>
                  <td>En Reparacion</td>
                  <td>AIR&AIR</td>
                  <td><img src="../../resources/img/Aire.jpg" class="img-fluid" alt=""></td>
                  <td>Aire Frio</td>
                  <td>90</td>
                  <td>
                    <button class="btn info">Editar</button>
                    <button class="btn danger">Eliminar</button>
                  </td>
                </tr>
                <tr>
                  <th scope="row">5</th>
                  <td>SAAS-09</td>
                  <td>Centro Comercial</td>
                  <td>Dañado</td>
                  <td>Cleanair</td>
                  <td><img src="../../resources/img/Aire.jpg" class="img-fluid" alt=""></td>
                  <td>Aire Frio</td>
                  <td>57</td>
                  <td>
                    <button class="btn info">Editar</button>
                    <button class="btn danger">Eliminar</button>
                  </td>
                </tr>

            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>