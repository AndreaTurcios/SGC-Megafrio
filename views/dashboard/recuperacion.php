<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Recuperación de contraseña');
?>

<div class="container">
    <!-- Formulario para registrar al primer usuario del dashboard -->
    <br>
    <div class="row">
        <div class="col-12 text-center" id="Titulo1">
            <h1>Recuperacion Contraseña</h1>
            <form method="post" id="recuperacion-form">
            <!-- Ingresar correo de usuario -->
            <div class="row  p-3">
                <div class="col-3 text-center">
                    <h6>Correo</h6>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" aria-label="Buscar"
                        aria-describedby="basic-addon1" id="correo" type="text" name="correo" class="validate"
                        required>
                </div>
            <div class="row center-align">
                <button type="submit" id class="btn waves-effect tooltipped" data-tooltip="Recuperacion">Enviar mensaje</button>
            </div>
            <span class="text-footer">¿Recordaste la contraseña?
                <a href="index.php">Ingresa</a>
            </span>
            </div>
            </div>

    </form>
    
    <div class="modal" id="recuperacion-modal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modal-title"> Restauración de contraseña</h5>
                                </div>
                                <div class="modal-body">
                                    <form id="restore-form" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                            <label for="clave_actual"><i class="fas fa-key"></i> Introduzca el código enviado:</label>   
                                            <input id="codigo_recu" type="text" name="codigo_recu" class="validate form-control" required/>
                                    </div>
                                    <div class="center">
                                        <label>CLAVE NUEVA</label>
                                    </div>

                                    <div class="form-group">
                                    <label for="clave_emp">Clave:</label>
                                    <input type="password" class="form-control" id="clave_nueva_1" name="clave_nueva_1" autocomplete="off"
                                        placeholder="Clave" required />
                                    <div class="campoCo">
                                        <div class="form-group d-none">
                                        <input type="password" name="password" id="clave_nueva_1">
                                        </div>
                                        <span>MOSTRAR</span>
                                    </div>
                                    </div>
                                    <br>

                                    <div class="form-group">
                                    <label for="clave_nueva_2">Confirmar clave:</label>
                                    <input type="password" class="form-control" id="clave_nueva_2" name="clave_nueva_2" autocomplete="off"
                                        placeholder="Confirmar clave:" required />
                                    <div class="campoConf">
                                        <div class="form-group d-none">
                                        <input type="password" name="password" id="clave_nueva_2">
                                        </div>
                                        <span>MOSTRAR</span>
                                    </div>
                                    </div>
                                    <br>
                                <div class="modal-footer">
                                    <button type="submit" data-tooltip="Actualizar" class="btn btn-primary" >Verificar</button>
                                </div>
                            </form>
                        </div>
                    </div>

        </div>
    </div>
    <br>

</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('recuperacion.js');
?>