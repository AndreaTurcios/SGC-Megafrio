<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaHeader.php");
?>

<body>
    <div id="contenedor-bit">
        <div id="box">
            <div id="header">
                <h1 id="titleBt">Gestión de bitácora</h1>
                
                <button id="buttonIng" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"><i class="fas fa-plus"></i>Agregar</button>
            </div>
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                    <div class="mb-3">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="text" class="form-control" id="recipient-name">
                    </div>
                    <div class="mb-3">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" id="message-text"></textarea>
                    </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
                </div>
            </div>
            </div>  
        </div>
        <div class="col-12 p-text-center">
            <div class="table-responsive">
                <table class="table table-dark table-striped">
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
                        <td><a href=""><i class="fas fa-edit"></i></a></td>
                        <td><a href=""><i class="fas fa-trash"></i></a></td>
                    </tr>

                    <tr class="table-light">
                    <th scope="row">2</th>
                        <td>Mufutau M. Townsend</td>
                        <td>Teagan I. Grimes</td>
                        <td>2020-08-11</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><a href=""><i class="fas fa-edit"></i></a></td>
                        <td><a href=""><i class="fas fa-trash"></i></a></td>
                    </tr>

                    <tr class="table-light">
                        <th scope="row">3</th>
                        <td>Zachery V. Ramirez</td>
                        <td>Dean Q. Fitzgerald</td>
                        <td>2022-01-16</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><a href=""><i class="fas fa-edit"></i></a></td>
                        <td><a href=""><i class="fas fa-trash"></i></a></td>
                    </tr>

                    <tr class="table-light">
                        <th scope="row">4</th>
                        <td>Eleanor T. Golden</td>
                        <td>Madison Y. Winters</td>
                        <td>2020-11-25</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><a href=""><i class="fas fa-edit"></i></a></td>
                        <td><a href=""><i class="fas fa-trash"></i></a></td>
                    </tr>

                    <tr class="table-light">
                        <th scope="row">5</th>
                        <td>Clark E. Hawkins</td>
                        <td>Nola P. Clemons</td>
                        <td>2021-10-15</td>
                        <td>04:05:00</td>
                        <td>Compra</td>
                        <td><a href=""><i class="fas fa-edit"></i></a></td>
                        <td><a href=""><i class="fas fa-trash"></i></a></td>
                    </tr>
                    </tbody>

                </table>    
            </div>    
        </div>    
    </div>
    <script src="../../resources/js/bitacora.js"></script>
</body>
       
<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>
