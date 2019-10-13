<?php 
    $user = new User();
    $info = $user->getInfoUSer($_SESSION['token_session']);
    // $galery = new Galery();
    // $imagen_profile = $galery->getFiles($info["path_image"]);      
?>

<div class="content-header">
    <div class="welcome-text">
        <h2>Bienvenido, <b><?php echo $info['name']; ?></b></h2>
        <h2>Gracias por ser parte de esta edición.</h2>
    </div>
    <ul class="nav-horizontal text-center" id="navbtns">
        <li>
            <a href="proyectos-sin-calificar" class="componentRoute"><i class="gi gi-pencil"></i> Proyectos<br>sin calificar</a>
        </li>
        <li>
            <a href="proyectos-calificados" class="componentRoute"><i class="fa fa-archive"></i> Proyectos<br>calificados</a>
        </li>
        
        <li class="active">
            <a><i class="gi"><b id="days">109</b></i> <small>DÍAS RESTANTES PARA<br>CIERRE DE CONVOCATORIA</small></a>
        </li>
    </ul>
</div>

<script>

function countdown(){
    var fecha=new Date('2019','9','11','00','00','00') //fecha cierre 0=Enero 11=Diciembre
    var hoy=new Date()
    var dias=0
    var horas=0
    var minutos=0
    var segundos=0

    if (fecha>hoy){
        var diferencia=(fecha.getTime()-hoy.getTime())/1000
        dias=Math.floor(diferencia/86400)
        diferencia=diferencia-(86400*dias)
        horas=Math.floor(diferencia/3600)
        diferencia=diferencia-(3600*horas)
        minutos=Math.floor(diferencia/60)
        diferencia=diferencia-(60*minutos)
        segundos=Math.floor(diferencia)

        //document.getElementById(id).innerHTML= dias 
        /*if (dias>0 || horas>0 || minutos>0 || segundos>0){
            setTimeout("countdown(\"" + id + "\")",1000)
        }*/
    }
    else{
       // document.getElementById('restante').innerHTML= dias
    }
    document.getElementById('days').innerHTML= dias 
    console.log(dias, fecha, hoy);
}
countdown();
</script>

<script>
        //ocultar nuevo proyecto si ya no es posible agregar uno
         if(parseInt(document.getElementById('days').innerText) <= 0){
             document.querySelector("#nuevoproy").style="display:none;"
         } 
</script>
