<?php
//Se incluye la clase con las plantillas del documento
include("../../app/helpers/plantillaHeader.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
plantillaHeader::headerTemplate('Gestión Equipos');
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





                  <div class="row">
                  <nav class="navbar navbar-light bg-light">
      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
        <form class="d-flex" method="post" id="search-form">
          <input id = "search" class="form-control me-2" type="text" name ="search" required/>
          <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
          </div>
          
          <!--Aquí en el botón de los filtros creamos un dropdown para poner las respectivas opciones -->
          <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN1">
           <div class="form-group">
                          <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuLink4"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Filtros de búsqueda
                            </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink4">
                                <a class="dropdown-item" href="#">Pais</a>
                                <a class="dropdown-item" href="#">Codigo Postal</a>
                              </div>
                            </div>
                          </div>
          </div>
      <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAgregarEquipo">
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
                    
                    <!-- Creacion del buscador -->
                    <div class="mx-auto" class="col-sm-12 col-md-12 col-lg-12 col-xl-8 offset-xl-1">
                      <div class="row">
                    
                          <div class="container-fluid">
                    

                    <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
                    
                    <div id="ModalAgregarEquipo" class="modal fade">
            <div class="container-fluid">
            <form method="post" id="save-form">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Agregar pais</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!--Aquí comenzamos con el body del modal -->
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <form>
                        <div class="form-group ">
                          <label for="nombre_equipo">Nombre equipo:</label>
                          <input type="text" class="form-control" id="nombre_equipo" name="nombre_equipo" placeholder="Equipo">
                        </div>
                        <div class="form-group">
                          <label for="descripcion_equipo">Descripcion:</label>
                          <input type="text" class="form-control" id="descripcion_equipo" name="descripcion_equipo" placeholder="Descripcion">
                        </div>
                        <div class="form-group">
                          <label for="precio_equipo">Precio:</label>
                          <input type="number" class="form-control" id="precio_equipo" name="precio_equipo" max="999.99" min="0.01">
                        </div>
                        <div class="form-group">
                          <label for="modelo">Modelo:</label>
                          <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo">
                        </div>
                        <div class="form-group">
                          <label for="voltaje">Voltaje:</label>
                          <input type="text" class="form-control" id="voltaje" name="voltaje" placeholder="voltaje">
                        </div>
                        <div class="form-group">
                          <label for="serie">Serie:</label>
                          <input type="text" class="form-control" id="serie" name="serie" placeholder="Serie">
                        </div>
                        <div class="input-field col s12 m6">
                        <label>Proveedor: </label>
                            <select id="nombre_compania" name="nombre_compania" class="form-control">
                              <option selected></option>
                            </select>
                        </div>
                        <div class="input-field col s12 m6">
                        <label>Tipo equipo: </label>
                            <select id="tipo_equipo" name="tipo_equipo" class="form-control">
                              <option selected></option>
                            </select>
                        </div>
                        <div class="input-field col s12 m6">
                        <label>Capacidad: </label>
                            <select id="capacidad" name="capacidad" class="form-control">
                              <option selected></option>
                            </select>
                        </div>
                        
                      <br>

                <!--Aquí arrancamos con el footer del modal -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type ="submit" class="btn waves-effect blue tooltipped"data-tooltip="Guardar" >Guardar</button><br>
                  <hr>
                 <br>
                  <hr>
                  
                  </div>
                    </div>
                </div>
                </div>
                </form>
                  </div>
                </div>
              </div>
              </div>
            </div>        
                    </div>

                </div>
            </nav>

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
                            <tbody id="tbody-rows">                          
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </body>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
plantillaHeader::footerTemplate('equipo.js');
?>