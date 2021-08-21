<?php
    require('../../app/helpers/report.php');
    require('../../app/models/estado_pago.php');
 // Se instancia la clase para crear el reporte.
$pdf = new Report;
// Se inicia el reporte con el encabezado del documento.
$pdf->startReports('Reporte de datos de clientes por estado pago');
// Se instancia el módelo Categorías para obtener los datos.
    $clientes = new Estado_pago;
    if ($dataClientes = $clientes->readAll()) {// leer todos los registros de estado pago
        foreach ($dataClientes as $rowClientes) {
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->SetFillColor(225);
            $pdf->Cell(253, 10, utf8_decode('Estado pago: '.$rowClientes['estado_pago']), 1, 1, 'C', 1);
            if ($clientes->setEstado($rowClientes['id_estado_pago'])) {
                // Se dataClientes si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
                if ($dataClientes = $clientes->readCliente()) {
                    $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados, en este caso del reporte de clientes
                $pdf->Cell(40, 10, utf8_decode('Cliente'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Teléfono'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('DUI'), 1, 0, 'C', 1);
                $pdf->Cell(39, 10, utf8_decode('NIT'), 1, 0, 'C', 1);
                $pdf->Cell(69, 10, utf8_decode('Dirección'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de agenda
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($dataClientes as $rowClientes) {
                    $pdf->Cell(40, 10, utf8_decode($rowClientes['nombre_cli']), 1, 0);
                    $pdf->Cell(30, 10, utf8_decode($rowClientes['telefono_cli']), 1, 0);
                    $pdf->Cell(25, 10, utf8_decode($rowClientes['dui_cli']), 1, 0);
                    $pdf->Cell(39, 10, utf8_decode($rowClientes['nit_cli']), 1, 0);
                    $pdf->Cell(69, 10, utf8_decode($rowClientes['direccion_cli']), 1, 0);
                    $pdf->Cell(50, 10, utf8_decode($rowClientes['correo_cli']), 1, 0);
                    $pdf->Ln();        
                }   
            } else {
                $pdf->SetFont('Arial', '', 11);
                $pdf->Cell(253, 20, utf8_decode('                                    '.'                                     '.' No hay clientes registrados para este estado'), 1, 1);
            }
            }
}
} else {
$pdf->Cell(0, 10, utf8_decode('No hay clientes para mostrar'), 1, 1);
}

// Se envía el documento al navegador y se llama al método Footer()
$pdf->Output();
?>