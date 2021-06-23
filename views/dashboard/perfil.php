<?php
//Se incluye la clase con las plantillas del documento
include("../../app/helpers/plantillaHeader.php");
//Se imprime la plantilla del encabezado y se envía el titulo para la página web
plantillaHeader::headerTemplate('Perfil');
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
            <div class="row">
                <div class="col-4  ">
                    <h4>Nombres:</h4>
                </div>
                <div class="col-6">
                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario">
                </div>
                <div class="col-2 p-1">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4  ">
                    <h4>Apellidos:</h4>
                </div>
                <div class="col-6">
                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario">
                </div>
                <div class="col-2 p-1">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4  ">
                    <h4>Telefono:</h4>
                </div>
                <div class="col-6">
                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario">
                </div>
                <div class="col-2 p-1">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-4  ">
                    <h4>Direccion:</h4>
                </div>
                <div class="col-6">
                    <input class="form-control me-2" type="text" placeholder="" aria-label="Usuario">
                </div>
                <div class="col-2 p-1">
                    <i class="fas fa-edit"></i>
                </div>
            </div>
            <br>
            <br>
            <!-- Boton de guardar cambios -->
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn ">
                        Guardar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
//Se incluye la plantilla del encabezado para la página web
include("../../app/helpers/plantillaFooter.php");
?>