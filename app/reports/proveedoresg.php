<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.

    require('../../app/helpers/report.php');
    require('../../app/models/proveedor.php');
    
    // Se instancia el modelo en este caso productos para procesar los datos.
    $proveedor = new Proveedor;
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReports('Reporte de datos de proveedores');
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($proveedorr = $proveedor->readAll()) {// leer todos los registros
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->Ln();  
                $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(50, 10, utf8_decode('Compañía'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->Cell(40, 10, utf8_decode('Teléfono'), 1, 0, 'C', 1);
                $pdf->Cell(40, 10, utf8_decode('Dirección'), 1, 0, 'C', 1);
                $pdf->Cell(60, 10, utf8_decode('Info. Tributaria'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('País'), 1, 0, 'C', 1);
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($proveedorr as $rows) {
                    // Se imprimen las celdas con los datos de los productos.                    
                    if(isset($rows['nombre_compania'])){
                        $pdf->Cell(50, 10, utf8_decode($rows['nombre_compania']), 1, 0);
                    }
                    if(isset($rows['telefono_pro'])){
                        $pdf->Cell(40, 10, utf8_decode($rows['telefono_pro']), 1, 0);
                    }                    
                    if(isset($rows['direccion_pro'])){
                        $pdf->Cell(40, 10, utf8_decode($rows['direccion_pro']), 1, 0);
                    }
                    if(isset($rows['info_tributaria'])){
                        $pdf->Cell(60, 10, utf8_decode($rows['info_tributaria']), 1, 0);
                    }                    
                    if(isset($rows['nombre_pais'])){
                        $pdf->Cell(50, 10, $rows['nombre_pais'], 1, 0);
                    }            
                    $pdf->Ln();      
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay proveedores asociados'), 1, 1);
            }
            // Se envía el documento al navegador y se llama al método Footer()  
            $pdf->Output();
     

?>