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
        <div class="table-responsive" class="col scroll">
          <table border="1"  class="table table-bordered" >
            <thead class="table-info">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Compañía</th>
                    <th scope="col">Representante</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Dirección</th>
                    <th scope="col">País</th>
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
    
</section>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
plantillaHeader::footerTemplate('proveedor.js');
?>


