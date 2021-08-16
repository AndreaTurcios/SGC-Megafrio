<?php
    require('../../app/helpers/report.php');
    require('../../app/models/clientes.php');
    // Se instancia el modelo en este caso productos para procesar los datos.
    $clientes = new Clientes;
        
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReports('Reporte de datos de clientes');
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($clientess = $clientes->readAll()) {// leer todos los registros
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->Ln();  
                $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados, en este caso del reporte de agenda
                $pdf->Cell(40, 10, utf8_decode('Cliente'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Teléfono'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('DUI'), 1, 0, 'C', 1);
                $pdf->Cell(35, 10, utf8_decode('NIT'), 1, 0, 'C', 1);
                $pdf->Cell(48, 10, utf8_decode('Dirección'), 1, 0, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Correo'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Estado pago'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de agenda
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($clientess as $rows) {
                    // Se imprimen las celdas con los datos de los productos.                    
                    if(isset($rows['nombre_cli'])){
                        $pdf->Cell(40, 10, utf8_decode($rows['nombre_cli']), 1, 0);
                    }
                    if(isset($rows['telefono_cli'])){
                        $pdf->Cell(30, 10, utf8_decode($rows['telefono_cli']), 1, 0);
                    }                    
                    if(isset($rows['dui_cli'])){
                        $pdf->Cell(25, 10, utf8_decode($rows['dui_cli']), 1, 0);
                    }
                    if(isset($rows['nit_cli'])){
                        $pdf->Cell(35, 10, utf8_decode($rows['nit_cli']), 1, 0);
                    }   
                    if(isset($rows['direccion_cli'])){
                        $pdf->Cell(48, 10, utf8_decode($rows['direccion_cli']), 1, 0);
                    }   
                    if(isset($rows['correo_cli'])){
                        $pdf->Cell(50, 10, utf8_decode($rows['correo_cli']), 1, 0);
                    }   
                    if(isset($rows['estado_pago'])){
                        $pdf->Cell(25, 10, utf8_decode($rows['estado_pago']), 1, 0);
                    }          
                    $pdf->Ln();        
                }
                    } else {
                    $pdf->Cell(0, 10, utf8_decode('No hay tareas asociadas'), 1, 1);
                }
            
            // Se envía el documento al navegador y se llama al método Footer()  
            $pdf->Output();
        
?>