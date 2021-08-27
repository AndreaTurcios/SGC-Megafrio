<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    require('../../app/helpers/report.php');
    require('../../app/models/pais.php');
    // Se instancia el modelo en este caso productos para procesar los datos.
    $pais = new Pais;
    if ($pais->setId($_GET['id'])) {
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowPais = $pais->readOne()) {//leer un solo empleado
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReport('Reporte de países');
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($paiss = $pais->readReport()) {// leer todos los registros
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(174, 232, 251);
                // Se establece la fuente para los encabezados.
                $pdf->Ln();  
                $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(100, 10, utf8_decode('País'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->Cell(100, 10, utf8_decode('Código postal'), 1, 0, 'C', 1);
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($paiss as $rows) {
                    // Se imprimen las celdas con los datos de los productos.                    
                    if(isset($rows['nombre_pais'])){
                        $pdf->Cell(100, 10, utf8_decode($rows['nombre_pais']), 1, 0);
                    }
                    if(isset($rows['codigo_postal'])){
                        $pdf->Cell(100, 10, utf8_decode($rows['codigo_postal']), 1, 0);
                    }                    
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay países asociados'), 1, 1);
            }
            
            // Se envía el documento al navegador y se llama al método Footer()  
            $pdf->Output();
        } else {
            header('location: ../../views/dashboard/Pais.php');
        }
    } else {
        header('location: ../../views/dashboard/Pais.php');
    }
} else {
    header('location: ../../views/dashboard/Pais.php');
}

?>