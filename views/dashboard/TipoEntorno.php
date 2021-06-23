<?php
//Se incluye la clase con las plantillas del documento
include("../../app/helpers/plantillaHeader.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
plantillaHeader::headerTemplate('Gestión Entornos');
?>

<body>
                <div  class="container">
                <br>
                  <div class="row">
                      <div class="col-12 text-center" id="Titulo1">
                          <h1>Gestión Entornos</h1>
                      </div>
                  </div>
                  <br>
                    
                    <!-- Creacion del buscador -->
                  <div class="mx-auto" class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-1">
                      <div class="row">
                      <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3" >
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>

                    <!-- Creacion del filtro -->
                    <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Filtrar
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="#">Entorno</a></li>
                              
                            </ul>
                          </div>
                    </div>


                    <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
                        
                        <!-- Creacion del modal -->
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#ModalAgregarCliente">
                            Agregar
                        </button>
                        <div class="modal fade" id="ModalAgregarCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Agregar Entorno</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">

                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Entorno</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary">Guardar</button>
                              </div>           
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
                          <table  class="table table-bordered text-center" >
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