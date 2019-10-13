<?php 
    $user = new User();
    $info = $user->getInfoUSer($_SESSION['token_session']);
    // $galery = new Galery();
    // $imagen_profile = $galery->getFiles($info["path_image"]);      
?>

<div class="content-header">
    <div class="welcome-text">
        <h2>Bienvenid@, <b><?php echo $info['name']; ?></b></h2>
        <p >Por favor revisa tus proyectos antes de enviarlos.</p>
    </div>
    <ul class="nav-horizontal text-center" id="navbtns">
<!-- Pruebas de tuto 2 -->
        <li>
            <a href="#" class="componentRoute" data-wow-duration="700ms" data-wow-delay="450ms" data-toggle="modal" data-target="#tutorial2">
                <img src="resources/page/images/video-tutorial-color-60.png" style="margin-bottom:1rem;opacity:0.3;" alt=""><br>
                Completa<br>tus datos
            </a>

            <div class="modal fade" id="tutorial2" tabindex="-1" role="dialog" aria-labelledby="categoria6" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <h5 class="">COMPLETA TUS <b class="amarillo">DATOS</b></h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-12 col-sm-12 p-0">
                                         <iframe src="https://player.vimeo.com/video/308485488" width="100%" height="560" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                      </div>
                                    </div>
                              </div>
                            </div>
                        </div>
        </li>
<!-- Pruebas de tuto 2 -->
<!-- Pruebas de tuto 3 -->
        <li>
            <a href="#" class="componentRoute" data-wow-duration="700ms" data-wow-delay="450ms" data-toggle="modal" data-target="#tutorial3">
                <img src="resources/page/images/video-tutorial-color-60.png" style="margin-bottom:1rem;opacity:0.3;" alt=""><br>
                Cómo postular<br> proyectos
            </a>

            <div class="modal fade" id="tutorial3" tabindex="-1" role="dialog" aria-labelledby="categoria6" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                      <h5 class="">CÓMO POSTULAR <b class="amarillo">PROYECTOS</b></h5>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-lg-12 col-sm-12 p-0">
                                         <iframe src="https://player.vimeo.com/video/308485522" width="100%" height="560" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
                                        </div>
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                      </div>
                                    </div>
                              </div>
                            </div>
                        </div>
        </li>
<!-- Pruebas de tuto 3 -->
        <li>
            <a href="proyecto-nuevo" class="componentRoute" id="nuevoproy">
                <img src="resources/admin/img/cla/icons/proyecto-nuevo.png" style="margin-bottom:1rem;" alt=""><br>
                Proyecto<br>Nuevo
            </a>
        </li>
        <li>
            <a href="proyectos-pendientes" class="componentRoute">
                <img src="resources/admin/img/cla/icons/proyecto-pendiente.png" style="margin-bottom:1rem;" alt=""><br> 
                Proyectos<br>pendientes
            </a>
        </li>
        <li>
            <a href="proyectos-postulados" class="componentRoute">
                <img src="resources/admin/img/cla/icons/proyecto-postulado.png" style="margin-bottom:1rem;" alt=""><br> 
                Proyectos<br>postulados
            </a>
        </li>
        
        <li class="active">
            <a><i class="gi"><b id="days" style="font-family:arial;"></b></i> <small>DÍAS RESTANTES PARA<br>CIERRE DE CONVOCATORIA</small></a>
        </li>
    </ul>
</div>

<script>

function countdown(){
    var fecha=new Date('2019','9','28','00','00','00') //fecha cierre // 0=Enero 11=Diciembre
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
         $("#tutorial2").on('hidden.bs.modal', function (e) {
            $("#tutorial2 iframe").attr("src", $("#tutorial2 iframe").attr("src"));
         });
</script>
<script>
         $("#tutorial3").on('hidden.bs.modal', function (e) {
            $("#tutorial3 iframe").attr("src", $("#tutorial3 iframe").attr("src"));
         });
</script>

<script>
        //ocultar nuevo proyecto si ya no es posible agregar uno
         if(parseInt(document.getElementById('days').innerText) <= 0){
             document.querySelector("#nuevoproy").style="display:none;"
         } 
</script>
