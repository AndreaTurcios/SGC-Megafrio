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
            <h1>Primer Usuario</h1>
        </div>
    </div>
    <br>

    <form method="post" id="register-form">
        <div class="row">
            <div class="row  p-3">
                <div class="col-3 text-center">
                    <h6>Nombre</h6>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" placeholder="Ej: Alejandro..." aria-label="Buscar"
                        aria-describedby="basic-addon1" id="nombres" type="text" name="nombres" autocomplete="off" class="validate"
                        required>
                </div>

            </div>
            <div class="row  p-3">
                <div class="col-3 text-center">
                    <h6>Apellidos</h6>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" placeholder="Ej: Martinez..." aria-label="Buscar"
                        aria-describedby="basic-addon1" id="apellidos" type="text" autocomplete="off" name="apellidos" class="validate"
                        required>
                </div>

            </div>
            <div class="row  p-3">
                <div class="col-3 text-center">
                    <h6>Telefono</h6>
                </div>
                <div class="col-9">
                    <input type="tel" class="form-control" placeholder="Ej: 7070-7070..." aria-label="Buscar"
                        aria-describedby="basic-addon1" id="telefono" type="tel" autocomplete="off" name="telefono" class="validate"
                        required>
                </div>

            </div>
            <div class="row  p-3">
                <div class="col-3 text-center">
                    <h6>Correo</h6>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" placeholder="Ej: alfredo567@gmail.com..."
                        aria-label="Buscar" aria-describedby="basic-addon1" autocomplete="off" id="correo" type="text" name="correo"
                        class="validate" required>
                </div>
            </div>
            <div class="row  p-3">
                <div class="col-3 text-center">
                    <h6>Alias</h6>
                </div>
                <div class="col-9">
                    <input type="text" class="form-control" placeholder="Ej: Alejo224..." aria-label="Buscar"
                        aria-describedby="basic-addon1" id="alias" autocomplete="off" type="text" name="alias" class="validate" required>
                </div>
            </div>
            <div class="row  p-3">
                <div class="col-3 text-center">
                    <h6>Clave</h6>
                </div>
                <div class="col-9">
                    <input type="password" class="form-control" aria-label="Buscar" aria-describedby="basic-addon1"
                        id="clave1" type="password" name="clave1" autocomplete="off" class="validate" required>
                </div>
            </div>
            <div class="row  p-3">
                <div class="col-3 text-center">
                    <h6>Confirmar clave</h6>
                </div>
                <div class="col-9">
                    <input type="password" class="form-control" aria-label="Buscar" aria-describedby="basic-addon1"
                        id="clave2" type="password" name="clave2" class="validate" required>
                </div>
            </div>
            
        </div>
        <div class="row center-align">
            <button type="submit" class="btn waves-effect blue tooltipped" data-tooltip="Registrar">Crear
                usuario</button>
        </div>
    </form>
</div>

<?php
//Se imprime la plantilla del pie y se envía el nombre del controlador para la página web
Dashboard_Page::footerTemplate('register.js');
?>