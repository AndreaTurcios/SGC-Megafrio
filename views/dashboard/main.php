<?php
// Se incluye la clase con las plantillas del documento.
require_once('../../app/helpers/dashboard_page.php');
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::headerTemplate('Página principal');
?>

<div class="col-12 text-center" id="Titulo2">
    <a id="fontmain">BIENVENID@</a>    
</div>

<Section>
<div class="row">   
<div class="animated bounceInRight">
    <div class="col-6 col-xs-6 col-xxl-2 p-3 text-center">
            <!-- Se muestra una gráfica de pastel con el porcentaje de usuarios activos e inactivos -->
            <canvas id="empleadosR"></canvas>
            <div class="col-20 col-xs-6 col-xxl-2 p-3 text-right">
            <!-- Se muestra una gráfica de líneas con la cantidad de proveedores por país -->
            <canvas id="ProveedoreG"></canvas>
    </div>
    </div>
    
    
</div>
</div>
</Section>

<!-- Importación del archivo para generar gráficas en tiempo real. Para más información https://www.chartjs.org/ -->
<script type="text/javascript" src="../../resources/js/chart.js"></script>
<script type="text/javascript" src="../../app/controllers/index.js"></script>
    
<?php
// Se imprime la plantilla del encabezado enviando el título de la página web.
Dashboard_Page::footerTemplate('account.js');
?>