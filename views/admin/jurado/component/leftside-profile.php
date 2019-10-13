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
        
        <!-- Botón para Editar Perfil -->
       <!-- <a href="editar-perfil-jurado" data-toggle="tooltip" title="" class="componentRoute btn btn-default" data-original-title="Editar información del participante" style="margin:.5rem;"><i class="fa fa-pencil"></i></a> -->
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
           
        </tbody>
    </table>
    <!-- END Customer Info -->
</div>
<!-- END Customer Info Block -->



<!-- Navigation Tabs -->
<div class="block full">
    <!-- Navigation Tabs Title -->
    <div class="block-title">
        <ul class="nav nav-tabs" data-toggle="tabs">
            <li class="active"><a href="#courses-categories">Categorías</a></li>
            <!--<li><a href="#courses-tools">Tools</a></li> -->
        </ul>
    </div>
    <!-- END Navigation Tabs Title -->
    <!-- Navigation Tabs Content -->
    <div class="tab-content">
        <div class="tab-pane active" id="courses-categories">
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="http://www.construlitalighting.com/cla/proyectos-sin-calificar?cat=1" ><img src="resources/admin/img/cla/categoria/espacios-de-vivienda.png" height="22px"></i> <span>ESPACIOS DE VIVIENDA</span></a>
                </li>
                <li>
                    <a href="http://www.construlitalighting.com/cla/proyectos-sin-calificar?cat=2"><img src="resources/admin/img/cla/categoria/espacios-comerciales.png" height="22px"></i> <span>ESPACIOS COMERCIALES</span></a>
                </li>
                <li>
                    <a href="http://www.construlitalighting.com/cla/proyectos-sin-calificar?cat=6"><img src="resources/admin/img/cla/categoria/espacios-de-hospitalidad.png" height="22px"></i> <span>ESPACIOS DE HOSPITALIDAD</span></a>
                </li>
                <li>
                    <a href="http://www.construlitalighting.com/cla/proyectos-sin-calificar?cat=3" ><img src="resources/admin/img/cla/categoria/espacios-de-trabajo.png" height="22px"></i> <span>ESPACIOS DE TRABAJO</span></a>
                </li>
                <li>
                    <a href="http://www.construlitalighting.com/cla/proyectos-sin-calificar?cat=4" ><img src="resources/admin/img/cla/categoria/espacios-publicos.png" height="22px"></i> <span>ESPACIOS PÚBLICOS</span></a>
                </li>
                <li>
                    <a href="http://www.construlitalighting.com/cla/proyectos-sin-calificar?cat=5" ><img src="resources/admin/img/cla/categoria/instalacion-artistica.png" height="22px"></i> <span>INSTALACIÓN ARTÍSTICA</span></a>
                </li>
                <li>
                    <a href="http://www.construlitalighting.com/cla/proyectos-sin-calificar" ><i class="fa fa-search" aria-hidden="true"></i> <span>TODOS</span></a>
                </li>
            </ul>
        </div>        
    </div>
    <!-- END Navigation Tabs Content -->

</div>
<!-- END Navigation Tabs -->

