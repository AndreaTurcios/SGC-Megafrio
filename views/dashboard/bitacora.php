<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>

<body>
    <div id="contenedor-bit">
        <div id="box" class="row">
            <div class="col-12 text-center" id="titlebt">
                <h1 id="titleBt">Gestión de bitácora</h1>
            </div>   
        </div>
        <div class="row">
            <nav class="navbar navbar-light bg-light">
                <div id ="header" class="container-fluid">
                    <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 col-xxl-8 p-3" >
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                            <button id="buscar" class="btn btn-outline-success" type="submit">Buscar</button>
                        </form>
                    </div>
                    <button id="buttonIng" type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#bitacoraModal" data-bs-whatever="@mdo"><i class="fas fa-plus"></i>Agregar</button>
                </div>
                <div class="modal fade" id="bitacoraModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva bitácora</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Selecciona un cliente:</label>
                        <select class="form-control" id="cli-select">
                            <option disabled selected>Seleccionar un cliente</option>
                            <option value="1">Zachery C. Horton</option>
                            <option value="2">Naomi J. Fitzpatrick</option>
                            <option value="3">Mariko Z. Casey</option>
                            <option value="4">Timon K. Macias</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Selecciona un empleado:</label>
                        <select id="emp-select" class="form-control">
                            <option disabled selected>Seleccionar un empleado</option>
                            <option value="1">Gregory H. Maxwell</option>
                            <option value="2">Ramona I. Woodk</option>
                            <option value="3">Teagan I. Grimes</option>
                            <option value="4">Duncan X. Fitzgerald</option>
                            <option value="5">Deborah S. Pearson</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Fecha:</label>
                        <!-- Campo de entrada de fecha -->
                        
                        <input type="date" name="fecha" class="form-control" min="2000-01-01" max="2023-12-31" step="2" />
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Hora:</label>
                        
                        <input type="time" name="hora" class="form-control" min="18:00" max="21:00" step="3600" />
                    </div>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Acción realizada:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Agregar</button>
                </div>
                </div>
            </div>
            </div>  
        </div>
           
            </nav>
            <div class="col-12 p-text-center">
            <div id="tbBitacora" class="table-responsive">
                <table class="table table-secondary table-striped">
                <thead>

                    <tr>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        
                        <th scope="col">Núm. bitácora</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Empleado</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Acción</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>

                    </thead>

                    <tbody>

                    <tr class="table-light">
                        <th scope="row">1</th>
                        <td>Emmanuel E. Harper</td>
                        <td>Deborah S. Pearson</td>
                        <td>2021-08-24</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo"><i class="fas fa-edit"></i></button></td>
                        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Nueva bitácora</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Selecciona un cliente:</label>
                                    <select class="form-control" id="cli-select">
                                        <option disabled selected>Seleccionar un cliente</option>
                                        <option value="1">Zachery C. Horton</option>
                                        <option value="2">Naomi J. Fitzpatrick</option>
                                        <option value="3">Mariko Z. Casey</option>
                                        <option value="4">Timon K. Macias</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Selecciona un empleado:</label>
                                    <select id="emp-select" class="form-control">
                                        <option disabled selected>Seleccionar un empleado</option>
                                        <option value="1">Gregory H. Maxwell</option>
                                        <option value="2">Ramona I. Woodk</option>
                                        <option value="3">Teagan I. Grimes</option>
                                        <option value="4">Duncan X. Fitzgerald</option>
                                        <option value="5">Deborah S. Pearson</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Fecha:</label>
                                    <!-- Campo de entrada de fecha -->
                                    
                                    <input type="date" name="fecha" class="form-control" min="2000-01-01" max="2023-12-31" step="2" />
                                </div>
                                <div class="mb-3">
                                    <label for="message-text" class="col-form-label">Hora:</label>
                                    
                                    <input type="time" name="hora" class="form-control" min="18:00" max="21:00" step="3600" />
                                </div>
                                <div class="mb-3">
                                    <label for="recipient-name" class="col-form-label">Acción realizada:</label>
                                    <input type="text" class="form-control" id="recipient-name">
                                </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="button" class="btn btn-primary">Guardar cambios</button>
                            </div>
                            </div>
                        </div>
                        </div>  
                    </div>
                        <td><button type="button" class="btn btn-primary" ><i class="fas fa-trash"></i></button></td>
                    </tr>

                    <tr class="table-light">
                    <th scope="row">2</th>
                        <td>Mufutau M. Townsend</td>
                        <td>Teagan I. Grimes</td>
                        <td>2020-08-11</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo"><i class="fas fa-edit"></i></button></td>
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nueva bitácora</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Selecciona un cliente:</label>
                                        <select class="form-control" id="cli-select">
                                            <option disabled selected>Seleccionar un cliente</option>
                                            <option value="1">Zachery C. Horton</option>
                                            <option value="2">Naomi J. Fitzpatrick</option>
                                            <option value="3">Mariko Z. Casey</option>
                                            <option value="4">Timon K. Macias</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Selecciona un empleado:</label>
                                        <select id="emp-select" class="form-control">
                                            <option disabled selected>Seleccionar un empleado</option>
                                            <option value="1">Gregory H. Maxwell</option>
                                            <option value="2">Ramona I. Woodk</option>
                                            <option value="3">Teagan I. Grimes</option>
                                            <option value="4">Duncan X. Fitzgerald</option>
                                            <option value="5">Deborah S. Pearson</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Fecha:</label>
                                        <!-- Campo de entrada de fecha -->
                                        
                                        <input type="date" name="fecha" class="form-control" min="2000-01-01" max="2023-12-31" step="2" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Hora:</label>
                                        
                                        <input type="time" name="hora" class="form-control" min="18:00" max="21:00" step="3600" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Acción realizada:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                                </div>
                                </div>
                            </div>
                            </div>  
                        </div>
                        <td><button type="button" class="btn btn-primary" ><i class="fas fa-trash"></i></button></td>
                    </tr>

                    <tr class="table-light">
                        <th scope="row">3</th>
                        <td>Zachery V. Ramirez</td>
                        <td>Dean Q. Fitzgerald</td>
                        <td>2022-01-16</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal" data-bs-whatever="@mdo"><i class="fas fa-edit"></i></button></td>
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Nueva bitácora</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Selecciona un cliente:</label>
                                        <select class="form-control" id="cli-select">
                                            <option disabled selected>Seleccionar un cliente</option>
                                            <option value="1">Zachery C. Horton</option>
                                            <option value="2">Naomi J. Fitzpatrick</option>
                                            <option value="3">Mariko Z. Casey</option>
                                            <option value="4">Timon K. Macias</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Selecciona un empleado:</label>
                                        <select id="emp-select" class="form-control">
                                            <option disabled selected>Seleccionar un empleado</option>
                                            <option value="1">Gregory H. Maxwell</option>
                                            <option value="2">Ramona I. Woodk</option>
                                            <option value="3">Teagan I. Grimes</option>
                                            <option value="4">Duncan X. Fitzgerald</option>
                                            <option value="5">Deborah S. Pearson</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Fecha:</label>
                                        <!-- Campo de entrada de fecha -->
                                        
                                        <input type="date" name="fecha" class="form-control" min="2000-01-01" max="2023-12-31" step="2" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="message-text" class="col-form-label">Hora:</label>
                                        
                                        <input type="time" name="hora" class="form-control" min="18:00" max="21:00" step="3600" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Acción realizada:</label>
                                        <input type="text" class="form-control" id="recipient-name">
                                    </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="button" class="btn btn-primary">Guardar cambios</button>
                                </div>
                                </div>
                            </div>
                            </div>  
                        </div>
                        <td><button type="button" class="btn btn-primary" ><i class="fas fa-trash"></i></button></td>
                    </tr>

                    <tr class="table-light">
                        <th scope="row">4</th>
                        <td>Eleanor T. Golden</td>
                        <td>Madison Y. Winters</td>
                        <td>2020-11-25</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-whatever="@mdo"><i class="fas fa-edit"></i></button></td>
                        <td><button type="button" class="btn btn-primary" ><i class="fas fa-trash"></i></button></td>
                    </tr>

                    <tr class="table-light">
                        <th scope="row">5</th>
                        <td>Clark E. Hawkins</td>
                        <td>Nola P. Clemons</td>
                        <td>2021-10-15</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-whatever="@mdo"><i class="fas fa-edit"></i></button></td>
                        <td><button type="button" class="btn btn-primary" ><i class="fas fa-trash"></i></button></td>
                    </tr>
                    </tbody>

                </table>    
            </div>    
        </div>    
        </div> 
          
    </div>
    <script src="../../resources/js/bitacora.js"></script>
</body>
       
<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>
