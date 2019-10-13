<?php 
    $user = new User();
    $info = $user->getInfoUSer($_SESSION['token_session']);
    // $galery = new Galery();
    // $imagen_profile = $galery->getFiles($info["path_image"]);      
?>
<ol class="breadcrumb">
    <li><a href="participante"><i class="fa fa-home"></i></a></li>
    <li>Proyectos postulados</li>
</ol>
<!-- Orders Block -->
<div class="block action-component active" id="postulados">
    <!-- Orders Title -->
    <div class="block-title">
        <h2><img src="resources/admin/img/cla/icons/proyecto-pendiente.png" style="width:20px;" alt=""> Proyectos <strong>postulados</strong></h2>
    </div>
    <!-- END Orders Title -->
    <!-- Orders Content -->
    <table class="table table-bordered table-striped table-vcenter">
        <thead>
            <tr style="text-transform: uppercase"> 
                <th></th>
                <th style="font-size:1.3rem;">ID</th>
                <th style="font-size:1.3rem;">Nombre del proyecto</th>
                <th style="font-size:1.3rem;">Categoría</th>
                <th style="font-size:1.3rem;">Fecha</th>
                <th style="font-size:1.3rem;">Acción</th>
            </tr>
        </thead>
        <tbody>
        <?php
        function category_name($id) {
            switch ($id) {
                case 1:
                    $proyect = "ESPACIOS DE VIVIENDA";
                    break;
                case 2:
                    $proyect = "ESPACIOS COMERCIALES";
                    break;
                case 3:
                    $proyect = "ESPACIOS DE TRABAJO";
                    break;
                case 4:
                    $proyect = "ESPACIOS PÚBLICOS";
                    break;
                case 5:
                    $proyect = "INSTALACIÓN ARTÍSTICA";
                    break;
                case 6:
                    $proyect = "ESPACIOS DE HOSPITALIDAD";
                    break;
                default;
                    break;
            } 
            echo $proyect;
        }
        ?>
        <?php
        foreach($projects as $key => $project){ 
            $galery = new User();	
            $images = $galery->getImages($project["id_project"]);
            if( $project["status"] == 1 ){ 	
        ?>
            <tr>
                <td style="width:73px;">
                <img src="<?php echo $images[0]['url']; ?>" class="media-object" style="width:73px;">
                </td>
                <td style="width: 100px;">
                    <strong><?php echo $project["id_project"];  ?></strong>
                </td>
                <td class="hidden-xs" >
                    <?php echo $project["name"];  ?>
                </td>
                <td class="hidden-xs" >
                    <?php category_name($project["category"]); ?>
                </td>
                <td>
                    <?php echo $project["end"];  ?>
                </td>
                
                <td class="text-center" style="width: 70px;">
                    <div class="btn-group btn-group-xs">
                        <a href="proyecto?id=<?php echo $project["id_project"]; ?> data-toggle="tooltip" title="" class="btn btn-default" data-original-title="View"><i class="fa fa-eye"></i></a>
                    </div>
                </td>
            </tr>
        <?php 
            }
        } 
        ?>
        </tbody>
    </table>
    <!-- END Orders Content -->
</div>
<!-- END Orders Block -->

