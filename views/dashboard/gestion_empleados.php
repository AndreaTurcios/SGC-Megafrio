<?php
//Se incluye la clase con las plantillas del documento
include("../../app/helpers/plantillaHeader.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
plantillaHeader::headerTemplate('Empleados');
?>

<!--Aquí comenzamos abriendo la sección -->
<section>
  <br>
  
  <div class="container">
    <div class="row">
      <!--Container con su respectivo título de pestaña, en este caso, proveedores -->
      <div class="col-12 text-center" id="Titulo1">
        <h1 class="center">Gestión de empleados</h1>
      </div>
    </div>
    
    <br>
    
    
    <div class="row">
    <nav class="navbar navbar-light bg-light">
      <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
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
                                <a class="dropdown-item" href="#">Nombre</a>
                                <a class="dropdown-item" href="#">Apellido</a>
                                <a class="dropdown-item" href="#">Usuario</a>
                                <a class="dropdown-item" href="#">Tipo empleado</a>
                              </div>
                            </div>
                          </div>
          </div>
          
      <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center">
        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#ModalAgregarEmpleado">
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
    
    <div class="row">
      <nav>
        <div class="container-fluid">
          <!--Aquí arrancamos con el botón agregar para abrir el modal -->
          <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
            <!--Colocamos el div para el modal -->
            <div class="modal fade" id="ModalAgregarEmpleado" tabindex="-1" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingrese los siguientes datos:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="container">
                      <form>
                        <div class="form-group">
                          <label for="formGroupExampleInput">Nombre empleado:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput"
                            placeholder="Nombre empleado">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Apellido empleado:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2"
                            placeholder="Apellido empleado">
                        </div>
                        <div class="form-group">
                          <label for="formGroupExampleInput2">Teléfono:</label>
                          <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Teléfono">
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
                          <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Dirección"
                            rows="3"></textarea>
                        </div>
                        <!--Colocamos los divs para el dropdown del filtro de búsqueda -->
                        <div class="form-group">
                          <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuLink3"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Filtros de búsqueda
                            </button>
                              <div class="dropdown-menu" aria-labelledby="dropdownMenuLink3">
                                <a class="dropdown-item" href="#">Admin</a>
                                <a class="dropdown-item" href="#">Auxiliar</a>
                                <a class="dropdown-item" href="#">Técnico</a>
                                <a class="dropdown-item" href="#">Supervisor</a>
                              </div>
                            </div>
                          </div>
                            <br>
                            <br>
                      </form>
                    </div>
                    <!--Colocamos el div del footer -->
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
      </nav>
      <br>
      <!--Colocamos la tabla -->
      <div class="row">
        <div class="table-responsive" class="col scroll">
          <table border="1"  class="table table-bordered" >
              <thead class="table-info">
              
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Usuario</th>
                <th scope="col">Dirección</th>
                <th scope="col">Tipo empleado</th>
              </tr>
            </thead>
            <tbody id="tbody-rows">
            </tbody>
          </table>
          </div>
          <!--Cerramos la tabla -->
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
  
  <script src="https://kit.fontawesome.com/592eb2e9e3.js" crossorigin="anonymous"></script>
</section>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
plantillaHeader::footerTemplate('empleados.js');
?>