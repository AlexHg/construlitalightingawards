<?php 
    $user = new User();
    $info = $user->getInfoUSer($_SESSION['token_session']);
    // $galery = new Galery();
    // $imagen_profile = $galery->getFiles($info["path_image"]);      
?>
<!-- Orders Block -->
<div class="block action-component active" id="pendientes">
    <!-- Orders Title -->
    <div class="block-title">
        <h2><img src="resources/admin/img/cla/icons/proyecto-pendiente.png" style="width:20px;" alt=""> Proyectos <strong>pendientes</strong></h2>
    </div>
    <!-- END Orders Title -->
    <!-- Orders Content -->
    <table class="table table-bordered table-striped table-vcenter">
        <thead>
            <tr style="text-transform: uppercase" style="width:73px;"> 
                <th></th>
                <th style="font-size:1.3rem;">ID</th>
                <th style="font-size:1.3rem;">Nombre del proyecto</th>
                <th style="font-size:1.3rem;">Categoría</th>
                <th style="font-size:1.3rem;">Fecha de creación</th>
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
        $limit_pendientes = 5;
        $counter_pendientes = 0;
        foreach($projects as $key => $project){ 
            $galery = new User();	
            $images = $galery->getImages($project["id_project"]);
            /*echo " ".($images[0]['url']);
            exit();*/
            if( $project["status"] == 0 && $counter_pendientes < $limit_pendientes ){ 	
        ?>
            <tr>
                <td style="width:73px;"><img src="<?php if(isset($images[0])) echo $images[0]['url']; ?>" class="media-object" style="width:73px;"></td>
                <td style="width: 100px;"><strong><?php echo $project["id_project"];  ?></strong></td>
                <td class="hidden-xs" style="width: 25%;"><?php echo $project["name"];  ?></td>
                <td class="hidden-xs" style="width: 25%;"><?php category_name($project["category"]); ?></td>
                <td>
                <?php echo $project["time_save"];  ?>
                </td>
                
                <td class="text-center" style="width: 70px;">
                    <div class="btn-group btn-group-xs">
                        <a href="editar-proyecto?id=<?php echo $project["id_project"]; ?>" class="componentRoute  btn btn-default" data-toggle="tooltip" title="" data-original-title="Editar"><i class="fa fa-pencil"></i></a>
                        <a href="delete?id=<?php echo $project["id_project"]; ?>" data-toggle="tooltip" title=""  onclick="confirm('Esta seguro que deseas eliminar este proyecto')" class="btn btn-xs btn-danger" data-original-title="Eliminar"><i class="fa fa-times"></i></a>
                    </div>
                </td>
            </tr>
        <?php 
                $counter_pendientes++;
            }
        } 
        ?>
        </tbody>
    </table>
    <div class="col-12" style="text-align:right;">
        <a href="proyectos-pendientes" class="btn btn-warning">Ver todos los proyectos pendientes</a><br><br>
    </div>
    


    <!-- END Orders Content -->
</div>
<!-- END Orders Block -->

<!-- Products in Cart Block -->
<div class="block action-component active" id="postulados">
    <!-- Products in Cart Title -->
    <div class="block-title">
        <h2><img src="resources/admin/img/cla/icons/proyecto-postulado.png" style="width:20px;" alt="">  Proyectos <strong>postulados</strong></h2>
    </div>
    <!-- END Products in Cart Title -->

    <!-- Products in Cart Content -->
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
        $limit_postulados = 5;
        $counter_postulados = 0;
        foreach($projects as $key => $project){  
            $galery = new User();	
            $images = $galery->getImages($project["id_project"]);
            if( $project["status"] == 1 && $counter_postulados < $limit_postulados ){ 	
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
                $counter_postulados++;
            }
        } 
        ?>
        </tbody>
    </table>
    <div class="col-12" style="text-align:right;">
        <a href="proyectos-postulados" class="btn btn-warning">Ver todos los proyectos postulados</a><br><br>
    </div>
    <!-- END Products in Cart Content -->
</div>
<!-- END Products in Cart Block -->



