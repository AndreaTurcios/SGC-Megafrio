<?php
    require('../../app/helpers/report.php');
    require('../../app/models/empleados.php');
    // Se instancia el modelo en este caso productos para procesar los datos.
    $empleados = new Empleados;
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReport('Reporte de datos de empleados');
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($empleadoss = $empleados->readAll()) {// leer todos los registros
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(225);
                // Se establece la fuente para los encabezados.
                $pdf->Ln();  
                $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(40, 10, utf8_decode('Nombres'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->Cell(40, 10, utf8_decode('Apellidos'), 1, 0, 'C', 1);
                $pdf->Cell(28, 10, utf8_decode('Usuario'), 1, 0, 'C', 1);
                $pdf->Cell(40, 10, utf8_decode('Teléfono'), 1, 0, 'C', 1);
                $pdf->Cell(40, 10, utf8_decode('Tipo empleado'), 1, 0, 'C', 1);
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($empleadoss as $rows) {
                    // Se imprimen las celdas con los datos de los productos.                    
                    if(isset($rows['nombre_emp'])){
                        $pdf->Cell(40, 10, utf8_decode($rows['nombre_emp']), 1, 0);
                    }
                    if(isset($rows['apellido_emp'])){
                        $pdf->Cell(40, 10, utf8_decode($rows['apellido_emp']), 1, 0);
                    }                    
                    if(isset($rows['nombre_usuario'])){
                        $pdf->Cell(28, 10, utf8_decode($rows['nombre_usuario']), 1, 0);
                    }
                    if(isset($rows['telefono_emp'])){
                        $pdf->Cell(40, 10, utf8_decode($rows['telefono_emp']), 1, 0);
                    }                    
                    if(isset($rows['tipoemp'])){
                        $pdf->Cell(40, 10, $rows['tipoemp'], 1, 0);
                    }        
                    $pdf->Ln();             
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay empleados asociados'), 1, 1);
            }
            
            // Se envía el documento al navegador y se llama al método Footer()  
            $pdf->Output();

?>