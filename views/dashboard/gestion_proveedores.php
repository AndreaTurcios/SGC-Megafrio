<?php
//Se incluye la clase con las plantillas del documento
require_once("../../app/helpers/dashboard_page.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Proveedores');
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
            <input id="search" class="form-control me-2" type="text" name="search" required />
            <button class="btn btn-outline-success" type="submit">Buscar</button>
          </form>
        </div>
        <!--Aquí en el botón de los filtros creamos un dropdown para poner las respectivas opciones -->
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
        </div>
        <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center">
          <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAgregarProveedor">
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
    <br>
    <div class="row">
      <div class="table-responsive" class="col scroll">
        <table class="table table-bordered">
          <thead class="table-info">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Compañía</th>
              <th scope="col">Teléfono</th>
              <th scope="col">Dirección</th>
              <th scope="col">País</th>
              <th scope="col">Código postal</th>
              <th scope="col">Info. Tributaria</th>
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
                      <form id="save-form" method="post" enctype="multipart/form-data">
                        <div class="form-group ">
                          <label for="nombre_compania">Nombre compañía:</label>
                          <input type="text" class="form-control" id="nombre_compania" name="nombre_compania"
                            placeholder="Nombre compañía">
                        </div>
                        <div class="form-group">
                          <label for="telefono_pro">Teléfono proveedor:</label>
                          <input type="text" class="form-control" id="telefono_pro" name="telefono_pro"
                            placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" required minlength="9"
                            maxlength="9"
                            onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                        </div>
                        <div class="form-group">
                          <label for="direccion_pro">Dirección:</label>
                          <textarea class="form-control" id="direccion_pro" name="direccion_pro" placeholder="Dirección"
                            rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="info_tributaria">Informacion tributaria:</label>
                          <textarea class="form-control" id="info_tributaria" name="info_tributaria"
                            placeholder="Informacion tributaria"></textarea>
                        </div>
                        <br>
                        <!--Aquí colocamos un dropdown para elegir el pais de procedencia del proveedor -->
                        <div class="input-field col s12 m6">
                          <label>País </label>
                          <select id="id_pais" name="id_pais">
                            <option selected></option>
                          </select>
                        </div>
                        <br>

                        <!--Aquí arrancamos con el footer del modal -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                          <button type="submit" class="btn btn-success">Guardar</button><br>
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
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">

          <h5 class="modal-title" id="exampleModalLabel">Actualizar proveedores22</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <!--Aquí comenzamos con el body del modal -->
        <form id="update-form" method="post" enctype="multipart/form-data">
          <div class="form-group d-none">
            <label for="formGroupExampleInput">ID:</label>
            <input type="text" class="form-control " placeholder="" aria-label="Buscar" aria-describedby="basic-addon1"
              id="id_proveedor2" type="text" name="id_proveedor2" class="validate" required>
          </div>
          <div class="modal-body">
            <div class="container">
              <div class="row">
                <div class="form-group ">
                  <label for="nombre_compania2">Nombre compañía:</label>
                  <input type="text" class="form-control" id="nombre_compania2" name="nombre_compania2"
                    placeholder="Nombre compañía">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Teléfono proveedor:</label>
                  <input type="text" class="form-control" id="telefono_pro2" name="telefono_pro2"
                    placeholder="0000-0000" pattern="[2,6,7]{1}[0-9]{3}[-][0-9]{4}" required minlength="9" maxlength="9"
                    onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">
                </div>
                <div class="form-group">
                  <label for="direccion_pro2">Dirección:</label>
                  <textarea class="form-control" id="direccion_pro2" name="direccion_pro2" placeholder="Dirección"
                    rows="3"></textarea>
                </div>
                <div class="form-group">
                  <label for="info_tributaria2">Informacion tributaria:</label>
                  <textarea class="form-control" id="info_tributaria2" name="info_tributaria2"
                    placeholder="Informacion tributaria"></textarea>
                </div>
                <br>
                <!--Aquí colocamos un dropdown para elegir el pais de procedencia del proveedor -->
                <div class="input-field col s12 m6">
                  <label>País </label>
                  <select id="id_pais2" name="id_pais2">
                    <option selected></option>
                  </select>
                </div>
                <br>
                <!--Aquí arrancamos con el footer del modal -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                  <button type="submit" class="btn btn-success">Guardar</button><br>
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
</section>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('proveedor.js');
?>