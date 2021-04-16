<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>

<body>
                <div  class="container">
                  <div class="row">
                    <div class="col-12 text-center" id="Titulo1">
                        <h1>Gestión de Tipo entorno</h1>
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
                              <a class="dropdown-item" href="#">Entorno</a>
                            </div>
                          </div>
                        </div>


                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-3 MenuSec" >
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">Agregar</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Tipo entorno</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form>
                                  <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Tipo Entorno:</label>
                                    <input type="text" class="form-control" id="TipoEntorno">
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
                          <table border="1"  class="table table-bordered">
                            <thead class="table-info">
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">Entorno</th>
                                <th scope="col">Controladores</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                               <th>1</th>
                                <td>Residencial</td>
                                <td>
                                  <button class="btn info">Editar</button>
                                  <button class="btn danger">Eliminar</button>
                                </td>
                              </tr>
                              <tr>
                                <th>2</th>
                                <td>Campos</td>
                                <td>
                                  <button class="btn info">Editar</button>
                                  <button class="btn danger">Eliminar</button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">3</th>
                                <td>Centros Comerciales</td>
                                <td>
                                  <button class="btn info">Editar</button>
                                  <button class="btn danger">Eliminar</button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">4</th>
                                <td>Oficinas</td>
                                <td>
                                  <button class="btn info">Editar</button>
                                  <button class="btn danger">Eliminar</button>
                                </td>
                              </tr>
                              <tr>
                                <th scope="row">5</th>
                                <td>Apartamentos</td>
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