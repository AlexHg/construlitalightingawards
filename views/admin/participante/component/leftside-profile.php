<?php 
    $user = new User();
    $info = $user->getInfoUSer($_SESSION['token_session']);
    // $galery = new Galery();
    // $imagen_profile = $galery->getFiles($info["path_image"]);      
?>

<!-- Customer Info Block -->
<div class="block">
    <!-- Customer Info Title -->
    <div class="block-title" style="display:flex; justify-content: space-between;">
        <h2><strong>Perfil del participante</strong></h2>
        
        <a href="editar-perfil" data-toggle="tooltip" title="" class="componentRoute btn btn-default" data-original-title="Editar información del participante" style="margin:.5rem;"><i class="fa fa-pencil"></i></a>
    </div>
    <!-- END Customer Info Title -->

    <!-- Customer Info -->
    <div class="block-section text-center">
        <a href="javascript:void(0)">
            <div style="width:100px; height:100px; display:inline-block; border-radius: 100%; overflow:hidden; text-align:center;position:relative;">
                <img src="<?php echo $info['path_image']; ?>" alt="avatar" style="height:100%;">
            </div>
        </a>
        <h3>
            <strong><?php echo $info['name'].' '.$info['lastname']; ?></strong><br><small></small>
        </h3>
    </div>
    <table class="table table-borderless table-striped table-vcenter">
        <tbody>
            <tr>
                <td class="text-right" style="width: 50%;"><strong>Correo</strong></td>
                <td><?php echo $info['email']?></td>
            </tr>
            <tr>
                <td class="text-right"><strong>Teléfono</strong></td>
                <td><?php echo $info['phone']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><strong>Ciudad de residencia</strong></td>
                <td><?php echo $info['municipio']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><strong>País</strong></td>
                <td><?php echo $info['country']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><strong>Profesión</strong></td>
                <td><span class="label label-warning"><?php echo ucfirst($info['profession'])?></span></td>
            </tr>
            <tr>
                <td class="text-right"><strong>Actividad</strong></td>
                <td><span class="label label-info"><?php echo ucfirst($info['labor_situation'])?></span></td>
            </tr>
        </tbody>
    </table>
    <!-- END Customer Info -->
</div>
<!-- END Customer Info Block -->

<!-- Quick Stats Block -->
<div class="block">
    <!-- Quick Stats Title -->
    <div class="block-title">
        <h2><strong>Recuerda que...</strong></h2>
    </div>
    <!-- END Quick Stats Title -->

    <!-- Quick Stats Content -->
    <div>
        <p>                                            
            <b>Inicio de convocatoria:</b> 30 de noviembre, 2018 <br><b>Cierre de convocatoria:</b> 1 de febrero, 2019<br> <b>Premiación:</b> 6 de marzo, 2019
            <hr>
            <b>NOTA: Sólo podrás postular un máximo de 3 proyectos, pueden ser de la misma categoría o de diferentes.</b><br><br>
                Descarga la <b><a href="http://www.construlitalighting.com/cla/resources/page/images/descargables/ConstrulitaLightingAwards2019_Convocatoria.pdf" target="_blank">convocatoria completa.</a></b><br>
                Descarga los <b><a href="http://www.construlitalighting.com/cla/resources/page/images/descargables/ConstrulitaLightingAwards2019_Lineamientos.pdf" target="_blank">lineamientos y recomendaciones</a></b> de registro.                                             
            <hr>                                            
                ¿Tienes dudas sobre el proceso de registro? Escríbenos a:<br>
                <b><a href="mailto:organizadores@awards.construlitalighting.com">organizadores@awards.construlitalighting.com</a></b>
                <br><br>
        </p>
    </div>
    <!-- END Quick Stats Content -->
</div>
<!-- END Quick Stats Block -->