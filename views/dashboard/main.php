<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Página principal');
?>
        <!-- Se muestra un saludo de acuerdo con la hora del empleado -->
        <div class="col-12 text-center" id="Titulo2">
            <a id="fontmain"><h4 class="text-center blue-text" id="greeting"></h4></a>    
        </div>
<main>
        <Section>
        <div class="row">   
                        <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                            <!-- Se muestra una gráfica de pastel con el porcentaje de usuarios activos e inactivos -->
                            <canvas id="empleadosR"></canvas>
                        </div>
                        <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                            <!-- Se muestra una gráfica de líneas con la cantidad de proveedores por país -->
                            <canvas id="ProveedoreG"></canvas>
                        </div>
                        <br>
                        <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                            <!-- Se muestra una gráfica de barras con la cantidad de equipos por proveedores -->
                            <canvas id="chartEquipoPro"></canvas>
                        </div>
                        <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                            <!-- Se muestra una gráfica de barras con la cantidad de equipos por proveedores -->
                            <canvas id="chartEquipoTipo"></canvas>
                        </div>

                        <div class="text-center col-12 col-xs-12 col-sm-12 col-lg-6 col-xl-6 p-4 col-xxl-6">
                            <!-- Se muestra una gráfica de barras con el top 5 empleados con mas tareas completadas -->
                            <canvas id="chartTopEmpleados"></canvas>
                        </div>
        </div>
        </Section>
</main>
<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<script type="text/javascript" src="../../resources/js/chart.js"></script>
<script type="text/javascript" src="../../app/controllers/index.js"></script>
    
<?php
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::footerTemplate('account.js');
?>