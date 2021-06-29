<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Perfil');
?>

<div class="container" id="Perfil">
    <br>
    <!-- Titulo de Perfil -->
    <div class="row">
        <div class="col-12 text-center" id="Titulo1">
            <h1>Perfil</h1>
        </div>
    </div>
    <br>
    <br>
    <div class="row">
        <div class="col-12 text-center">
            <!-- Parte de gestion de datos del perfil -->
            <form method="post" id="session-form">
            <div class="row">
                <div class="col-4  ">
                    <h4>Nombres:</h4>
                </div>
                <div class="col-6">
                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" name="nombres" class="validate" required>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-4  ">
                    <h4>Apellidos:</h4>
                </div>
                <div class="col-6">
                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" name="apellidos" class="validate" required>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-4  ">
                    <h4>Telefono:</h4>
                </div>
                <div class="col-6">
                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" name="telefono" class="validate" required>
                </div>
                
            </div>
            <br>
            <div class="row">
                <div class="col-4  ">
                    <h4>Nombre de usuario:</h4>
                </div>
                <div class="col-6">
                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario" name="username" class="validate" required>
                </div>
                
            </div>
            <br>
            <br>
            <!-- Boton de guardar cambios -->
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn ">
                        <i class="fas fa-edit"> Editar</i>
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>

<?php
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::footerTemplate('account.js');
?>