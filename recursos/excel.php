<?php
require('conexion.php');
if(isset($_POST["excel"])){   
    header('Content-Type: text/csv; charset=utf-8');  
    header('Content-Disposition: attachment; filename=registros.csv');  
    $output = fopen("php://output", "w");  
    fputcsv($output, array('id','Nombre de propietario/gerente', 'Nombre de encargado de operación', 'Correo electronico', 'Número de camiones', 'Número de placa','Celular','Teléfono','Costo'));  
    $query = "SELECT * from allregisters";  
    $result = mysqli_query($conexion, $query);  
    while($row = mysqli_fetch_assoc($result))  {  
        fputcsv($output, $row);
    }
    fclose($output);
}
?>