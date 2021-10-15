<?php
    require('../../app/helpers/report.php');
    require('../../app/models/equipos.php');
    require('../../app/models/tipo_equipo.php');
    // Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReports('Reporte de datos de equipo por tipo equipo');
// Se instancia el módelo Equipos para obtener los datos.
$equipo = new Equipos;
$tipoEquipo = new tipoequipo;
// Se verifica si existen registros (equipos) para mostrar, de lo contrario se imprime un mensaje.
if ($dataEquipos = $tipoEquipo->readAll()) {
    // Se recorren los registros ($dataEquipos) fila por fila ($rowEquipos).
    foreach ($dataEquipos as $rowEquipos) {
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->SetFillColor(174, 232, 251);
                $pdf->Cell(255, 10, utf8_decode('Tipo equipo: '.$rowEquipos['tipo_equipo']), 1, 1, 'C', 1);
        if ($equipo->setIdTipoEqui($rowEquipos['id_tipo_equipo'])) {
            if ($dataEquipos = $equipo->readEquipo()) {
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(174, 232, 251);
                // Se establece la fuente para los encabezados.
                $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(50, 10, utf8_decode('Equipo'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de los equipos.
                $pdf->Cell(80, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                $pdf->Cell(20, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
                $pdf->Cell(20, 10, utf8_decode('Modelo'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Voltaje'), 1, 0, 'C', 1);
                $pdf->Cell(20, 10, utf8_decode('Serie'), 1, 0, 'C', 1);
                $pdf->Cell(35, 10, utf8_decode('Proveedor'), 1, 0, 'C', 1);
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($dataEquipos as $rowEquipos) {
                    // Se imprimen las celdas con los datos de los equipos.                    
                    $pdf->Cell(50, 10, utf8_decode($rowEquipos['nombre_equipo']), 1, 0);
                    $pdf->Cell(80, 10, utf8_decode($rowEquipos['descripcion_equipo']), 1, 0);
                    $pdf->Cell(20, 10, utf8_decode($rowEquipos['precio_equipo']), 1, 0);
                    $pdf->Cell(20, 10, utf8_decode($rowEquipos['modelo']), 1, 0);
                    $pdf->Cell(30, 10, utf8_decode($rowEquipos['voltaje']), 1, 0);
                    $pdf->Cell(20, 10, utf8_decode($rowEquipos['serie']), 1, 0);
                    $pdf->Cell(35, 10, $rowEquipos['nombre_compania'], 1, 0);
                    $pdf->Ln(); 
                }   
            } else {
                $pdf->SetFont('Arial', '', 11);
                $pdf->Cell(255, 20, utf8_decode('                                                         '.'                            '.' No hay equipos registrados para este tipo'), 1, 1);
            }
            }
}
} else {
$pdf->Cell(0, 10, utf8_decode('No hay equipos para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>