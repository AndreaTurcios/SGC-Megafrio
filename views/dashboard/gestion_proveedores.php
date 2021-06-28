<?php
//Se incluye la clase con las plantillas del documento
include("../../app/helpers/plantillaHeader.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
plantillaHeader::headerTemplate('Proveedores');
?> 
<!--Aquí comenzamos abriendo la sección -->
<section>
  <br>
  <div class="container">
    <div class="row">
      <!--Container con su respectivo título de pestaña, en este caso, proveedores -->
      <div class="col-12 text-center" id="Titulo1">
        <h1 class="center">Gestión de proveedores</h1>
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
    </nav>
    <br>
    <div class="row">
        <div class="table-responsive" class="col scroll">
          <table border="1"  class="table table-bordered" >
            <thead class="table-info">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Compañía</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">País</th>
                    <th scope="col">Código postal</th>
                    <th scope="col">Controlador</th>
                  </tr>
                </thead>
                <tbody id="tbody-rows">
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Aquí creamos la barra de búsqueda y el botón de los filtros de la misma -->
    <div class="row">
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">

          <!--Aquí comenzamos agregando un div con el id ModalAgregarProveedor -->
           <div id="ModalAgregarProveedor" class="modal fade">
            <div class="container-fluid">
            <form method="post" id="save-form">
              <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Agregar proveedores</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!--Aquí comenzamos con el body del modal -->
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <form>
                        <div class="form-group ">
                          <label for="nombre_compania">Nombre compañía:</label>
                          <input type="text" class="form-control" id="nombre_compania" name="nombre_compania" placeholder="Nombre compañía">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Representante de la compañía:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Representante de la compañía">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Teléfono proveedor:</label>
                          <input type="text" class="form-control" id="telefono_pro" name="telefono_pro" placeholder="0000-0000">
                        </div>
                        <div class="form-group">
                          <label for="direccion_pro">Dirección:</label>
                          <textarea class="form-control" id="direccion_pro" name="direccion_pro" placeholder="Dirección" rows="3"></textarea>
                        </div>
                        <!--Aquí colocamos un dropdown para elegir el pais de procedencia del proveedor -->
                        <div class="input-field col s12 m6">
                        <label>País </label>
                            <select id="tipoemp" name="tipoemp">
                              <option selected></option>
                            </select>
                        </div>
                      <br>

                <!--Aquí arrancamos con el footer del modal -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type ="submit" class="btn btn-success">Guardar</button><br>
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
      <br>
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">

                  <h5 class="modal-title" id="exampleModalLabel">Actualizar proveedores</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <!--Aquí comenzamos con el body del modal -->
                <div class="modal-body">
                  <div class="container">
                    <div class="row">
                      <form>
                        <div class="form-group ">
                          <label for="nombre_compania">Nombre compañía:</label>
                          <input type="text" class="form-control" id="nombre_compania" name="nombre_compania" placeholder="Nombre compañía">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Representante de la compañía:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Representante de la compañía">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Teléfono proveedor:</label>
                          <input type="text" class="form-control" id="telefono_pro" name="telefono_pro" placeholder="0000-0000">
                        </div>
                        <div class="form-group">
                          <label for="direccion_pro">Dirección:</label>
                          <textarea class="form-control" id="direccion_pro" name="direccion_pro" placeholder="Dirección" rows="3"></textarea>
                        </div>
                        <!--Aquí colocamos un dropdown para elegir el pais de procedencia del proveedor -->
                        <div class="input-field col s12 m6">
                        <label>País </label>
                            <select id="tipoemp" name="tipoemp">
                              <option selected></option>
                            </select>
                        </div>
                      <br>
                <!--Aquí arrancamos con el footer del modal -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type ="submit" class="btn btn-success">Guardar</button><br>
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
      <br>
        <!--Aquí arrancamos con la tabla -->
        
    
</section>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
plantillaHeader::footerTemplate('proveedor.js');
?>


