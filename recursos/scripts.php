<script>

function ocultar_registros(){
    document.getElementById("todos_registros").style.display = "none";
    document.getElementById("form_registros").style.display = "block";   
}

$(document).ready(function() {
    $('select').material_select();
});
    
function actualizar(){
    document.getElementById("todos_registros").style.display = "block";
    document.getElementById("form_registros").style.display = "none";
    $.post("recursos/registros.php", function(data){
        $("#registros").html(data);
    }); 
}
    
</script>
