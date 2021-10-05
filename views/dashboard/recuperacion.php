<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Primer registro');
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
                                            <input id="codigo_recu" type="password" name="codigo_recu" class="validate form-control" required/>
                                            
                                        
                                    </div>
                                    
                                    <div class="center-align">
                                        <label>CLAVE NUEVA</label>
                                    </div>
                                    
                                    <div class="form-group">
                                        
                                            
                                            <label for="clave_nueva_1"><i class="fas fa-shield-alt"></i> Contraseña</label>
                                            <input id="clave_nueva_1" type="password" name="clave_nueva_1" class="validate form-control" required/>
                                            
                                            
                                    </div>
                                    <br>
                                    
                                    <div class="form-group">
                                            
                                            <label for="clave_nueva_2"><i class="fas fa-shield-alt"></i></i> Confirmar contraseña</label>   
                                            <input id="clave_nueva_2" type="password" name="clave_nueva_2" class="validate form-control" required/>
                                            
                                    </div>        
                                </div>  
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