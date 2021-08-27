<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    require('../../app/helpers/report.php');
    require('../../app/models/agenda.php');
    // Se instancia el modelo en este caso productos para procesar los datos.
    $agenda = new Agenda;

    if ($agenda->setId($_GET['id'])) {
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowAgenda = $agenda->readOne()) {//leer un solo empleado
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReports('Reporte de datos de agenda');
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($agendaa = $agenda->readReport()) {// leer todos los registros
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(0, 188, 209);
                // Se establece la fuente para los encabezados.
                $pdf->Ln();  
                $pdf->SetFont('Arial', 'B', 11);
                $pdf->SetFillColor(0, 188, 209);
                // Se imprimen las celdas con los encabezados, en este caso del reporte de agenda
                $pdf->Cell(35, 10, utf8_decode('Cliente'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Usuario'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Fecha'), 1, 0, 'C', 1);
                $pdf->Cell(15, 10, utf8_decode('Hora'), 1, 0, 'C', 1);
                $pdf->Cell(38, 10, utf8_decode('Fecha provisional'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('h. provisional'), 1, 0, 'C', 1);
                $pdf->Cell(25, 10, utf8_decode('Tarea'), 1, 0, 'C', 1);
                $pdf->Cell(22, 10, utf8_decode('Estado'), 1, 0, 'C', 1);
                $pdf->Cell(35, 10, utf8_decode('Observaciones'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de agenda
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($agendaa as $rows) {
                    // Se imprimen las celdas con los datos de los productos.                    
                    if(isset($rows['nombre_cli'])){
                        $pdf->Cell(35, 10, utf8_decode($rows['nombre_cli']), 1, 0);
                    }
                    if(isset($rows['nombre_usuario'])){
                        $pdf->Cell(30, 10, utf8_decode($rows['nombre_usuario']), 1, 0);
                    }                    
                    if(isset($rows['fecha_programacion'])){
                        $pdf->Cell(25, 10, utf8_decode($rows['fecha_programacion']), 1, 0);
                    }
                    if(isset($rows['hora_programacion'])){
                        $pdf->Cell(15, 10, utf8_decode($rows['hora_programacion']), 1, 0);
                    }   
                    if(isset($rows['fecha_provisional'])){
                        $pdf->Cell(38, 10, utf8_decode($rows['fecha_provisional']), 1, 0);
                    }   
                    if(isset($rows['hora_provisional'])){
                        $pdf->Cell(30, 10, utf8_decode($rows['hora_provisional']), 1, 0);
                    }   
                    if(isset($rows['tarea'])){
                        $pdf->Cell(25, 10, utf8_decode($rows['tarea']), 1, 0);
                    }   
                    $l = '';
                    if(isset($rows['estado_tarea'])){
                        if($rows['estado_tarea']=="true")
                        {
                            $l='Activo';
                        } 
                        else{
                            $l='Bloqueado';
                        }
                        $pdf->Cell(22, 10, $l, 1, 0);
                    }    
                    if(isset($rows['observaciones'])){
                        $pdf->Cell(35, 10, $rows['observaciones'], 1, 0);
                    }                  
                }
                    } else {
                    $pdf->Cell(0, 10, utf8_decode('No hay tareas asociadas'), 1, 1);
                }
            
            // Se envía el documento al navegador y se llama al método Footer()  
            $pdf->Output();
        } else {
            header('location: ../../views/dashboard/agenda.php');
        }
    } else {
        header('location: ../../views/dashboard/agenda.php');
    }
} else {
    header('location: ../../views/dashboard/agenda.php');
}

?>