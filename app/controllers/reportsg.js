function ReportGenerate(dataset) {
    let content = '';
    // Se recorre el conjunto de registros (dataset) fila por fila a través del objeto row.
    dataset.map(function (row) {  
        // Se crean y concatenan las filas de la tabla con los datos de cada registro.
        content += `
            <a href="../../app/reports/proveedoresg.php" class="btn" data-tooltip="Reporte">Reporte</a>
        `;
    });
    // Se agregan las filas al cuerpo de la tabla mediante su id para mostrar los registros.
    document.getElementById('BoxInferior').innerHTML = content;
}