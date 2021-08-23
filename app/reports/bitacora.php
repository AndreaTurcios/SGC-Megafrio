<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    require('../../app/helpers/report.php');
    require('../../app/models/bitacora.php');
    // Se instancia el modelo en este caso productos para procesar los datos.
    $bitacora = new Bitacora;

    if ($bitacora->setId($_GET['id'])) {
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowBitacora = $bitacora->readOne()) {//leer un solo empleado
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReports('Reporte de datos de bitácora');
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($bitacoraa = $bitacora->readReport()) {// leer todos los registros
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->Ln();  
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->Cell(229, 10, utf8_decode('Tipo servicio: '.$rowBitacora['tiposervicio']), 1, 0, 'C', 1);
                $pdf->Ln();
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(48, 10, utf8_decode('Cliente'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->Cell(48, 10, utf8_decode('Empleado'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
                $pdf->Cell(18, 10, utf8_decode('Hora'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Equipo'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Estado'), 1, 0, 'C', 1);
                $pdf->Cell(35, 10, utf8_decode('Ubicación'), 1, 0, 'C', 1);
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($bitacoraa as $rows) {
                    // Se imprimen las celdas con los datos de los productos.                    
                    if(isset($rows['nombre_cli'])){
                        $pdf->Cell(48, 10, utf8_decode($rows['nombre_cli']), 1, 0);
                    }
                    if(isset($rows['nombre_emp'])){
                        $pdf->Cell(48, 10, utf8_decode($rows['nombre_emp']), 1, 0);
                    }                    
                    if(isset($rows['fecha'])){
                        $pdf->Cell(25, 10, utf8_decode($rows['fecha']), 1, 0);
                    }
                    if(isset($rows['hora'])){
                        $pdf->Cell(18, 10, utf8_decode($rows['hora']), 1, 0);
                    }   
                    if(isset($rows['nombre_equipo'])){
                        $pdf->Cell(30, 10, utf8_decode($rows['nombre_equipo']), 1, 0);
                    }   
                    if(isset($rows['estado_equipo'])){
                        $pdf->Cell(25, 10, utf8_decode($rows['estado_equipo']), 1, 0);
                    }    
                    if(isset($rows['ubicacion'])){
                        $pdf->Cell(35, 10, $rows['ubicacion'], 1, 0);
                    }                  
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay bitácoras asociadas'), 1, 1);
            }
            
            // Se envía el documento al navegador y se llama al método Footer()  
            $pdf->Output();
        } else {
            header('location: ../../views/dashboard/bitacora.php');
        }
    } else {
        header('location: ../../views/dashboard/bitacora.php');
    }
} else {
    header('location: ../../views/dashboard/bitacora.php');
}

?>