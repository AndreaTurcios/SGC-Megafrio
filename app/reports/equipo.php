<?php
// Se verifica si existe el parámetro id en la url, de lo contrario se direcciona a la página web de origen.
if (isset($_GET['id'])) {
    require('../../app/helpers/report.php');
    require('../../app/models/equipos.php');
    // Se instancia el modelo en este caso productos para procesar los datos.
    $equipo = new Equipos;

    if ($equipo->setId($_GET['id'])) {
        // Se verifica si la categoría del parametro existe, de lo contrario se direcciona a la página web de origen.
        if ($rowEquipo = $equipo->readOne()) {//leer un solo empleado
            // Se instancia la clase para crear el reporte.
            $pdf = new Report;
            // Se inicia el reporte con el encabezado del documento.
            $pdf->startReports('Reporte de datos de equipo');
            // Se verifica si existen registros (productos) para mostrar, de lo contrario se imprime un mensaje.
            if ($equipoo = $equipo->readReport()) {// leer todos los registros
                // Se establece un color de relleno para los encabezados.
                $pdf->SetFillColor(174, 232, 251);
                // Se establece la fuente para los encabezados.
                $pdf->Ln();  
                $pdf->SetFont('Arial', 'B', 11);
                // Se imprimen las celdas con los encabezados.
                $pdf->Cell(255, 10, utf8_decode('Tipo equipo: '.$rowEquipo['tipo_equipo']), 1, 1, 'C', 1);
                $pdf->Cell(50, 10, utf8_decode('Equipo'), 1, 0, 'C', 1);
                // Se establece la fuente para los datos de los productos.
                $pdf->Cell(80, 10, utf8_decode('Descripción'), 1, 0, 'C', 1);
                $pdf->Cell(20, 10, utf8_decode('Precio'), 1, 0, 'C', 1);
                $pdf->Cell(20, 10, utf8_decode('Modelo'), 1, 0, 'C', 1);
                $pdf->Cell(30, 10, utf8_decode('Voltaje'), 1, 0, 'C', 1);
                $pdf->Cell(20, 10, utf8_decode('Serie'), 1, 0, 'C', 1);
                $pdf->Cell(35, 10, utf8_decode('Proveedor'), 1, 0, 'C', 1);
                $pdf->SetFont('Arial', '', 11);
                $pdf->Ln();
                // Se recorren los registros
                foreach ($equipoo as $rows) {
                    // Se imprimen las celdas con los datos de los productos.                    
                    if(isset($rows['nombre_equipo'])){
                        $pdf->Cell(50, 10, utf8_decode($rows['nombre_equipo']), 1, 0);
                    }             
                    if(isset($rows['descripcion_equipo'])){
                        $pdf->Cell(80, 10, utf8_decode($rows['descripcion_equipo']), 1, 0);
                    }
                    if(isset($rows['precio_equipo'])){
                        $pdf->Cell(20, 10, utf8_decode($rows['precio_equipo']), 1, 0);
                    }   
                    if(isset($rows['modelo'])){
                        $pdf->Cell(20, 10, utf8_decode($rows['modelo']), 1, 0);
                    }   
                    if(isset($rows['voltaje'])){
                        $pdf->Cell(30, 10, utf8_decode($rows['voltaje']), 1, 0);
                    }   
                    if(isset($rows['serie'])){
                        $pdf->Cell(20, 10, utf8_decode($rows['serie']), 1, 0);
                    }                    
                    if(isset($rows['nombre_compania'])){
                        $pdf->Cell(35, 10, $rows['nombre_compania'], 1, 0);
                    }                  
                }
            } else {
                $pdf->Cell(0, 10, utf8_decode('No hay equipos asociados'), 1, 1);
            }
            
            // Se envía el documento al navegador y se llama al método Footer()  
            $pdf->Output();
        } else {
            header('location: ../../views/dashboard/gestion_equipos.php');
        }
    } else {
        header('location: ../../views/dashboard/gestion_equipos.php');
    }
} else {
    header('location: ../../views/dashboard/gestion_equipos.php');
}

?>