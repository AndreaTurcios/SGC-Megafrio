<?php
//Se incluye la clase con las plantillas del documento
require_once('../../app/helpers/dashboard_page.php');
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
Dashboard_Page::headerTemplate('Clientes');
?>

<section>

    <div class="container" id="ContainerClientes">
        <br>
        <!-- Titulo -->
        <div class="row">
            <div class="col-12 text-center" id="Titulo1">
                <h1>Gestión de Clientes</h1>
            </div>
        </div>
        <br>
        <!-- Navbar para los elementos de filtrado y agregar -->
        <div class="row">
        
            <nav class="navbar navbar-light bg-light">
            
                <div class="container-fluid">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>


                    <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center"
                        id="MuestraBTN">
                        <div class="dropdown">
                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton1"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Filtrar Género
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                

                            </ul>
                        </div>
                    </div>


                    <div class="col-6 col-xs-6 col-sm-6 col-md-2 col-lg-2 col-xl-2 col-xxl-2 p-3 text-center" id="MuestraBTN">
                        <!-- Button trigger modal -->

                        <a href="#" onclick="openCreateDialog()"  data-bs-toggle="modal" data-bs-target="#ModalAgregarCliente" class="btn waves-effect indigo tooltipped" data-tooltip="Crear">Agregar</a>
                  

                        <!-- Modal -->
                        
                        <form method="post" id="save-form" enctype="multipart/form-data">
                        <div class="modal fade" id="ModalAgregarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      
                                        <h5 class="modal-title" id="modal-title">Agregar Cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <!-- Partes del modal para hacer insert -->
                                    <div class="modal-body">
                                        <div class="container">

                                        <div class="row">
                                                <div class="col-3 p-2 ">

                                                    <h6>ID</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="id_cliente" name="id_cliente"
                                                            aria-label="Search" class="validate" readonly>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Nombre</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="nombre_cli" name="nombre_cli"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Telefono</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="telefono_cli" name="telefono_cli"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>NIT</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="nit_cli" name="nit_cli"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Dui</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder=""  id="dui_cli" name="dui_cli"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Direccion</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="direccion_cli" name="direccion_cli"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Correo</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="correo_cli" name="correo_cli"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Estado Pago</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                    <select id="estado_pago" name="estado_pago">
                                                    
                                                    </select>
                                                    </form>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <!-- Botones de Control -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                            <button type ="submit" class="btn waves-effect blue tooltipped"data-tooltip="Guardar" >Guardar</button><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>


                    
                        <div class="modal fade" id="ModalActualizarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modal-title">Agregar cliente</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Partes del modal para hacer insert -->
                                    <div class="modal-body">
                                        <div class="container">

                                        <div class="row">
                                                <div class="col-3 p-2 ">
                                                <form id="update-form" method="post" enctype="multipart/form-data">
                                                    <label for="formGroupExampleInput">ID</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="id_cliente" name="id_cliente"
                                                            aria-label="Search" class="validate" readonly>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Nombre</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="nombre_cli2" name="nombre_cli2"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Telefono</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="telefono_cli2" name="telefono_cli2"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>NIT</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="nit_cli2" name="nit_cli2"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Dui</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder=""  id="dui_cli2" name="dui_cli2"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>
                                            

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Direccion</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="direccion_cli2" name="direccion_cli2"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Correo</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                        <input class="form-control me-2" type="text" placeholder="" id="correo_cli2" name="correo_cli2"
                                                            aria-label="Search" class="validate" required>
                                                    </form>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-3 p-2">

                                                    <h6>Estado Pago</h6>
                                                </div>
                                                <div class="col-9">
                                                    <form class="d-flex">
                                                    <select id="estado_pago2" name="estado_pago2">
                                                    
                                                    </select>
                                                    </form>
                                                </div>
                                            </div>



                                        </div>
                                    </div>
                                    <!-- Botones de Control -->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancelar</button>
                                            <button type ="submit" class="btn waves-effect blue tooltipped"data-tooltip="Guardar" >Guardar</button><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>


                    </div>
                    

                </div>
            </nav>
        </div>
        <br>
        <div class="row">
            <div class="table-responsive" class="col scroll">
                <table  class="table table-bordered" >
                    <thead class="table-info">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">NIT</th>
                            <th scope="col">Dui</th>
                            <th scope="col">Direccion</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Estado Pago</th>
                            <th scope="col">Controladores</th>
                        </tr>
                    </thead>
                    <tbody id="tbody-rows">
                        
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</section>


<?php
// Se imprime la plantilla del pie enviando el nombre del controlador para la página web.
Dashboard_Page::footerTemplate('clientes.js');
?>