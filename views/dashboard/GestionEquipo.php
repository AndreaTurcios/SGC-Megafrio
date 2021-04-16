<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>
<body>
                <div  class="container">  
                <br>
                  <div class="row">
                      <div class="col-12 text-center" id="Titulo1">
                          <h1>Gestión Equipos</h1>
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
                                        <h5 class="modal-title" id="exampleModalLabel">Agregar Equipo</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">

                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Nombre Equipo</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Tipo Entorno</h6>
                                                </div>
                                                <div class="col-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected></option>
                                                    <option value="1">Campo</option>
                                                    <option value="2">Residencial</option>
                                                    <option value="3">Centro Comercial</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Estado Equipo</h6>
                                                </div>
                                                <div class="col-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected></option>
                                                    <option value="1">Dañado</option>
                                                    <option value="2">Funcional</option>
                                                    <option value="3">En reparacion</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Proveedor</h6>
                                                </div>
                                                <div class="col-9">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected></option>
                                                    <option value="1">AIREAIRE</option>
                                                    <option value="2">COLDAIR</option>
                                                    <option value="3">AIR FRESH</option>
                                                </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Imagen</h6>
                                                </div>
                                                <div class="col-9">
                                                  <input type="image" class="form-control" id="FotoEquipo">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Descripcion Equipo</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Precio Equipo</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="number" placeholder="" aria-label="Search">
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
                      <br>

                      <!-- Creacion de la tabla -->
                      <div class="row">
                        <div class="table-responsive" class="col scroll">
                          <table border="1"  class="table table-bordered" >
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