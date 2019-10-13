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
        <h2><strong>Perfil del jurado</strong></h2>
        
        <!--<a href="editar-perfil-jurado" data-toggle="tooltip" title="" class="componentRoute btn btn-default" data-original-title="Editar información del participante" style="margin:.5rem;"><i class="fa fa-pencil"></i></a>-->
    </div>
    <!-- END Customer Info Title -->

    <!-- Customer Info -->
    <div class="block-section text-center">
        <a href="javascript:void(0)" style="display:none;">
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
            <!--<tr>
                <td class="text-right"><strong>Telefono</strong></td>
                <td><?php echo $info['phone']; ?></td>
            </tr>
            <tr>
            <tr>
                <td class="text-right"><strong>Ciudad de residencia</strong></td>
                <td><?php echo $info['municipio']; ?></td>
            </tr>
            <tr>
                <td class="text-right"><strong>País</strong></td>
                <td><?php echo $info['country']; ?></td>
            </tr>-->
        </tbody>
    </table>
    <!-- END Customer Info -->
</div>
<!-- END Customer Info Block -->




