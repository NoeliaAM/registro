<?php
require ('conexion.php');

$query = mysqli_query($conexion, "SELECT * FROM allregisters");
    
?>

<table class="highlight responsive-table">
    <thead>
        <tr>
            <th>Nombre de propietario/gerente</th>
            <th>Nombre de encargado de operación</th>
            <th>Correo electronico</th>
            <th>No. de camiones</th>
            <th>No. de placa</th>
            <th>Celular</th>
            <th>Teléfono</th>
            <th>Costo</th>
        </tr>
    </thead>
    <tbody>
    
<?php
        while($row = mysqli_fetch_array($query)){
            echo 
            '<tr>
                <td>' .$row['nom_prop'].'</td>
                <td>'. $row['nom_enc'].'</td>
                <td>'. $row['email'].'</td>
                <td>'. $row['no_cam'].'</td>
                <td>'. $row['no_placas'].'</td>
                <td>'. $row['no_cel'].'</td>
                <td>'. $row['no_tel'].'</td>
                <td>'. $row['costo'].'</td>
            </tr>';        
        }
?>
    </tbody>
</table>    
<br>

<div class="col s12">
    <center>
        <form method="post" action="recursos/excel.php">
            <button class="btn-large green lighten-1" type="submit" name="excel" id="excel">
                Generar archivo .xlsx<i class="material-icons right">attach_file</i>
            </button>
        </form>
    </center>
</div>