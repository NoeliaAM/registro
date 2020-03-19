<?php
    require('recursos/conexion.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina principal</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link type="text/css" rel="stylesheet" href="css/mycss.css"  media="screen,projection"/>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
<?php include('recursos/scripts.php'); ?>
   
    <nav>
        <div class="nav-wrapper light-blue darken-3">
            <a class="brand-logo center"><img src="images/LogoUtcm.png"></a>
        </div>
    </nav>
    
    <div class="container"><br>
    <div id="form_registros">
        <div class="row valign-wrapper">
            <div class="col s12 m6 l6"><blockquote><h4>Registro de transportista</h4></blockquote></div>
            <div class="col s12 m6 l6" id="btn_registros"><a class="btn-large light-blue darken-4" onclick="actualizar()">Ver registros<i class="material-icons right">list</i></a></div>
        </div>
        <div id="registro" class="card-panel">
            <div class="row">
                <form class="col s12" name="datos" method="post" action="index.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="nom_prop" name="nom_prop" type="text" class="validate">
                            <label for="nom_prop">Nombre de propietario/gerente</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="nom_enc" name="nom_enc" type="text" class="validate">
                            <label for="nom_enc">Nombre del encargado de operación</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input id="email" name="email" type="email" class="validate">
                            <label for="email">Correo electronico</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix">local_shipping</i>
                            <input id="no_cam" name="no_cam" type="number" class="validate">
                            <label for="no_cam">Número de camiones</label>
                        </div>
                        <div class="input-field col s12 m6 l6">
                            <i class="material-icons prefix">local_shipping</i>
                            <input id="no_placas" name="no_placas" type="text" class="validate">
                            <label for="no_placas">Número de placa</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix">smartphone</i>
                            <input id="no_cel" name="no_cel" type="number" class="validate">
                            <label for="no_cel">Celular</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                            <i class="material-icons prefix">local_phone</i>
                            <input id="no_tel" name="no_tel" type="number" class="validate">
                            <label for="no_tel">Teléfono</label>
                        </div>
                        <div class="input-field col s12 m4 l4">
                           <i class="material-icons prefix">attach_money</i>
                            <select name="costo" id="costo">
                                <option value="" disabled selected>Costo</option>
                                <option value="100">100</option>
                                <option value="200">200</option>
                                <option value="300">300</option>
                            </select>
                        </div>                        
                    </div>
                <div class="row">
                    <div class="col s6" id="btn_cancelar">                   
                        <button class="btn-large red lighten-1" type="reset" name="guardar">
                            Cancelar <i class="material-icons right">cancel</i>
                        </button>
                    </div>
                    <div class="col s6" id="btn_guardar">
                        <button class="btn-large green lighten-1" type="submit" name="guardar">
                            Guardar <i class="material-icons right">check</i>
                        </button>
                    </div>
                </div>
                </form>
            </div> 
        </div>
    </div>
    <div id="todos_registros">
        <div class="row valign-wrapper">
            <div class="col s12 m5 l5"><a class="btn-large light-blue darken-4" onclick="ocultar_registros()"><i class="material-icons left">arrow_back</i>Volver a registros</a></div>
            <div class="col s12 m7 l7"><blockquote><h4>Todos los registros</h4></blockquote></div>
        </div>
          <div id="registros"></div>
    </div>
    </div>
</body>
</html>

<?php
    if(isset($_POST['guardar'])){
        if($_POST['nom_prop'] != "" && $_POST['nom_enc'] != "" && $_POST['email'] != "" && $_POST['no_cam'] != "" && $_POST['no_placas'] != "" && $_POST['no_cel'] != "" && $_POST['no_tel'] != "" && $_POST['costo'] != ""){
            
            $nom_prop = $_POST['nom_prop'];
            $nom_enc = $_POST['nom_enc'];
            $email = $_POST['email'];
            $no_cam = $_POST['no_cam'];
            $no_placas = $_POST['no_placas'];
            $no_cel = $_POST['no_cel'];
            $no_tel = $_POST['no_tel'];
            $costo = $_POST['costo'];
            
            $datos = "INSERT INTO allregisters (nom_prop,nom_enc,email,no_cam,no_placas,no_cel,no_tel,costo)VALUES('$nom_prop','$nom_enc','$email','$no_cam','$no_placas','$no_cel','$no_tel','$costo')";
            $result = mysqli_query($conexion, $datos);	
            echo '<script>swal("Datos agregados", "Los datos se han ingresado con exito", "success");</script>';   
        }else{
            echo '<script>swal("Campos vacios", "Por favor llena todos los campos antes de guardar los datos", "error");</script>'; 
        }
    }
?>