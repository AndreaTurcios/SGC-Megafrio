<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>

<section>

    <div class="container" id="ContainerClientes">
        <br>
        <!-- Titulo -->
        <div class="row">
            <div class="col-12 text-center" id="Titulo1">
                <h1>Gestion de Clientes</h1>
            </div>
        </div>
        <br>
        <!-- Navbar para los elementos de filtrado y agregar -->
        <div class="row">
            <nav class="navbar navbar-light bg-light">
                <div class="container-fluid">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3" >
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>


                    <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              Filtrar Genero
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="#">Masculino</a></li>
                              <li><a class="dropdown-item" href="#">Femenino</a></li>
                              
                            </ul>
                          </div>
                    </div>


                    <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn" data-bs-toggle="modal"
                            data-bs-target="#ModalAgregarCliente">
                            Agregar+
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="ModalAgregarCliente" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Ingrese los datos</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!-- Partes del modal para hacer insert -->
                                    <div class="modal-body">
                                        <div class="container">

                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Nombre</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Telefono</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Dui</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Direccion</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">
                                                    
                                                    <h6>Correo</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" aria-label="Search">
                                                    </form>
                                                </div>
                                            </div>


                                            
                                        </div>
                                    </div>
                                    <!-- Botones de Control -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </nav>
        </div>
        <br>
        <div class="row">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-info">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Dui</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Controlador</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Fernando José Aquino Valle</td>
                            <td>6307-2771</td>
                            <td>12345678-9</td>
                            <td>Final Segundo Pasaje Regalado Finca San Felipe, Mejicanos</td>
                            <td>20190068@ricaldone.edu.sv</td>
                            <td><a href="#">Editar</a>/<a href="#">Eliminar</a></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Fernando José Aquino Valle</td>
                            <td>6307-2771</td>
                            <td>12345678-9</td>
                            <td>Final Segundo Pasaje Regalado Finca San Felipe, Mejicanos</td>
                            <td>20190068@ricaldone.edu.sv</td>
                            <td><a href="#">Editar</a>/<a href="#">Eliminar</a></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Fernando José Aquino Valle</td>
                            <td>6307-2771</td>
                            <td>12345678-9</td>
                            <td>Final Segundo Pasaje Regalado Finca San Felipe, Mejicanos</td>
                            <td>20190068@ricaldone.edu.sv</td>
                            <td><a href="#">Editar</a>/<a href="#">Eliminar</a></td>
                        </tr>
                        <tr>
                            <th scope="row">1</th>
                            <td>Fernando José Aquino Valle</td>
                            <td>6307-2771</td>
                            <td>12345678-9</td>
                            <td>Final Segundo Pasaje Regalado Finca San Felipe, Mejicanos</td>
                            <td>20190068@ricaldone.edu.sv</td>
                            <td><a href="#">Editar</a>/<a href="#">Eliminar</a></td>
                        </tr>


                    </tbody>
                </table>
            </div>

        </div>
    </div>

</section>


<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>