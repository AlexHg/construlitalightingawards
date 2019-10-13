<ol class="breadcrumb">
    <li><a href="participante"><i class="fa fa-home"></i></a></li>
    <li><?php echo $title2 ?></li>
    <!--?php echo ini_get('post_max_size'); ?-->
</ol>

<div class="block action-component active" id="nuevo">
    <!-- Customer Addresses Title -->
    <div class="block-title">
        <h2><img src="resources/admin/img/cla/icons/proyecto-nuevo.png" style="width:20px;" alt=""> <?php echo $title2 ?> </h2>
    </div>

    <!-- END Customer Addresses Title -->
    <div class="container-fluid">
        <?php if(isset($_SESSION['alerta'])){ ?>
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1 p-top-50">
                    <div class="alert alert-success">
                    <strong><?php echo $_SESSION['alerta']["status"]; ?></strong> <?php echo $_SESSION['alerta']["message"]; ?>
                    </div>
                </div>
            </div>
        <?php
                unset($_SESSION['alerta']);
            }
            if( ($category[0]["Total"]+$category[1]["Total"]+$category[2]["Total"]+$category[3]["Total"]+$category[4]["Total"]) <= 9  ){
                $microtime =  microtime(true);
                $md5 = md5($microtime);
        ?>
        <style>
            .input-reg{
                border-color: #e8e8e8;
                background:white;
            }   
            #my-dropzone span{
                font-size:14px!important;
            }
        </style>
        <script>
            // Avanzar entre distintos pasos 
            function json_post(path, params, method = "post") {
                console.log("sending")
                method = method || "post"; // Set method to post by default if not specified.

                // The rest of this code assumes you are not using a library.
                // It can be made less wordy if you use one.
                var form = document.createElement("form");
                form.setAttribute("method", method);
                form.setAttribute("action", path);

                for(var key in params) {
                    if(params.hasOwnProperty(key)) {
                        var hiddenField = document.createElement("input");
                        hiddenField.setAttribute("type", "hidden");
                        hiddenField.setAttribute("name", key);
                        hiddenField.setAttribute("value", params[key]);

                        form.appendChild(hiddenField);
                    }
                }
   
                document.body.appendChild(form);
                form.submit();
            }
            $(document).ready(function(){
                function val_one(){

                    $("#info-1").empty();
                    var flag = false;
                    if( typeof($('input[name=prorealizados]:checked').val()) != "undefined" ){
                        flag = true;
                    }else{
                        flag = false;
                        alert("Selecciona una categoría");
                        $("#info-1").append("Selecciona una categoría");
                    }

                    return flag;
                }

                function val_two(){

                    var status = true;                
                    var error = "Campo requerido";
                    var inputsValidate = document.querySelectorAll(".info-2 [required]");
                    for(var inx = 0; inx < inputsValidate.length; inx++){
                        var input = inputsValidate[inx];
                        
                        if(input.value == ""){
                            input.parentNode.querySelector(".label-danger").innerText = (error);
                            status = false;
                        }else{
                            input.parentNode.querySelector(".label-danger").innerText = "";
                        }
                    };

                    return status;
                }

                function val_three(){
                    var status = true;
                    var error = "Campo requerido";
                    var inputsValidate = document.querySelectorAll(".info-3 [required]");
                    for(var inx = 0; inx < inputsValidate.length; inx++){
                        var input = inputsValidate[inx];
                        
                        if(input.value == ""){
                            input.parentNode.querySelector(".label-danger").innerText = (error);
                            status = false;
                        }else{
                            input.parentNode.querySelector(".label-danger").innerText = "";
                        }
                    };
                    
                    return status;
                }

                $('.activate-p1').on('click',function(){
                    
                    // $act = $(this).data("validate");
                    $action = $(this).data('action');
                    var $show = $(this).data('s');
                    var $hide = $(this).data('actual');
                    // var $hide = $(this).data('h');
                    var $button =  $(this);
                        //$button.prop('disabled',true);
                    var id_project = $("input[name=project]").val();

                    if($action == 'prev'){
                        steps(`.${$show}`,`.${$hide}`);
                        $button.prop('disabled',false);
                    }
                    if($action == 'next'){
                        switch($hide){
                            case 'info-1':
                                if( val_one()  ){
                                    console.log("paso 1");
                                    var name = $("input[name=namep]").val();
                                    var proyectosRealizados = $("input[name=prorealizados]:checked").val();
                                    $.post("save-project", 
                                        { 
                                            step:'one',
                                            id_project: id_project, 
                                            category:proyectosRealizados,
                                            name:name
                                        } ,function(data, status){
                                        $("input[name=project]").val(data);
                                        steps(`.${$show}`,`.${$hide}`);
                                        msgStatus();
                                    });
                                } 
                            break;
                            case 'info-2':
                                console.log("paso 2");
                                if( val_two()  ){
                                    console.log("true")
                                    var id_project = $("input[name=project]").val();
                                    var name = $("input[name=namep]").val();
                                    var pais = $("input[name=pais]").val();
                                    var ciudad = $("input[name=ciudad]").val();
                                    var final = $("input[name=finalobra]").val();
                                    var disil = $("input[name=disil]").val();
                                    var colaboradores = $("input[name=colab]").val();
                                    var arquitecto = $("input[name=arqui]").val();
                                    var descripcion = $("textarea[name=desc_proyecto]").val();
                                    var json = {   
                                            step:'two',
                                            id_project: id_project,
                                            name: name,
                                            pais: pais,
                                            ciudad: ciudad,
                                            final:final,
                                            disil: disil,
                                            colaboradores: colaboradores,
                                            arquitecto:arquitecto,
                                            descripcion:descripcion,
                                        } 
                                    
                                    console.log(json);
                                    $.post("save-project", 
                                        json,
                                        function(data, status){
                                            console.log(data,status);
                                            if(data == 1){
                                                steps(`.${$show}`,`.${$hide}`);
                                                msgStatus();
                                               
                                            }
                                        }
                                    );
                                    
                                    //json_post("save-project",json);
                                }
                            break;
                            case 'info-3':
                                console.log("paso 3");
                                if( val_three()){
                                    var id_project = $("input[name=project]").val();                                   
                                    var fotografo = $("input[name=fotografo").val();
                                    var video = $("input[name=video").val();
                                    var cred_video = $("input[name=creditosvid").val();
                                    
                                    $.post("save-project", 
                                        { 
                                            step:'three',
                                            id_project: id_project,
                                            fotografo:fotografo,
                                            video: video,
                                            cred_video: cred_video
                                        },
                                        function(data, status){
                                            console.log("paso 4");
                                            if(data == 1){
                                                console.log("paso 5"+id_project);
                                                document.querySelector("#postular").disabled="";
                                                msgStatus();
                                                
                                                //$('#cnf').modal('show');
                                                //window.location="proyecto?id="+id_project
                                                //steps(`.${$show}`,`.${$hide}`);
                                            }
                                        }
                                        
                                    );
                                }
                            break;
                            case 'info-4':
                                console.log("paso 4");
                                var video = $("input[name=video").val();
                                $('#cnf').modal('show');
                            break;
                        }
                        $button.prop('disabled',false);
                    }
                    //display(`.${$next}`,`.${$actual}`);

                    // steps(`.${$show}`,`.${$hide}`);


                });
            })
            function msgStatus(){
                document.querySelector("#msgStatus").innerText ="Proyecto guardado. Podrás seguir editándo más tarde.";
                setTimeout(function(){
                    document.querySelector("#msgStatus").innerText = "";
                },2000);
            }
            function postular(){
                if(document.querySelectorAll("#added-articles tbody tr").length < 3){
                    alert("Se requiere un mínimo de 3 imagenes para postular el proyecto.");
                }else if(confirm("¿Estás seguro que deseas postular este proyecto? Los datos ingresados ya no podrán modificarse.")){
                    var id_project = $("input[name=project]").val();
                    window.location = "postular?id="+id_project;
                }                
            }
        </script>
        <style>
            #msgStatus{
                font-size: 2rem;
                text-align:center;
                width:100%;
                display:block;
                color:green;
            }
        </style>
        <div class="row" id="in" data-carpet="<?php echo $md5; ?>">
            <div class="col-lg-12 ">
                <!--<form id="new-project" method="POST" action="upload-complete"> -->
                    <!-- Step one -->
                    <input type="hidden" name="project" <?php echo isset($projects)?'value='.$projects['id_project']:''; ?> >
                    <input type="hidden" name="directory">
                    <div class="info-1">
                        
                        <div class="col-sm-12 situacion"></div>
                        <?php
                            $exist1 = $category[0]['Total'] == 1?'disabled':'';
                            $exist2 = $category[1]['Total'] == 1?'disabled':'';
                            $exist3 = $category[2]['Total'] == 1?'disabled':'';
                            $exist4 = $category[3]['Total'] == 1?'disabled':'';
                            $exist5 = $category[4]['Total'] == 1?'disabled':''; 
                        ?>
                        <div class="row cat-step active">
                            <div class="col-lg-12 selector-step">
                                <label class="active">1. Categoría</label>
                                <label>2. Datos generales del proyecto</label>
                                <label>3. Imágenes y archivos</label>
                            </div>
                            <div class="col-lg-6" id="npcategoria">
                                <div>
                                    <label>
                                        <h4>ESPACIOS<br>
                                        <span>DE VIVIENDA</span></h4>
                                        <input type="radio" name="prorealizados" value="1"
                                            <?php echo $projects['category']==1?'checked ':''; ?>
                                            data-title="Espacios de vivienda" 
                                            data-info="Buscamos proyectos en los que la iluminación mejore la habilidad de cualquier espacio residencial. También se incluyen fraccionamientos y conjuntos habitacionales.">
                                        <img src="resources/admin/img/cla/categoria/espacios-de-vivienda.png" alt="">
                                    </label>
                                    <label>
                                        <h4>ESPACIOS<br>
                                        <span>COMERCIALES</span></h4>
                                        <input type="radio" name="prorealizados" value="2"
                                            <?php echo $projects['category']==2?'checked ':''; ?>
                                            data-title="Espacios comerciales" 
                                            data-info="Buscamos proyectos que potencien la finalidad comercial del espacio y mejoren la exhibición de productos. Esta categoría incluye tiendas minoristas y mayoristas como: tiendas especializadas, departamentales, de autoservicio, agencias vehiculares, fashion malls y otros complejos comerciales.">
                                        <img src="resources/admin/img/cla/categoria/espacios-comerciales.png" alt="">
                                    </label>
                                    <label>
                                        <h4>ESPACIOS<br>
                                        <span>DE HOSPITALIDAD</span></h4>
                                        <input type="radio" name="prorealizados" value="6"
                                            <?php echo $projects['category']==6?'checked ':''; ?>
                                            data-title="Espacios de hospitalidad" 
                                            data-info="Buscamos proyectos cuya iluminación genere atmósferas y ambientes confortables en espacios como: centros turísticos y culturales, museos, centros de convenciones y espectáculos, hoteles, restaurantes, cafeterías, teatros, cines, foros y arenas.">
                                        <img src="resources/admin/img/cla/categoria/espacios-de-hospitalidad.png" alt="">
                                    </label>
                                    <label>
                                        <h4>ESPACIOS<br>
                                        <span >DE TRABAJO</span></h4>
                                        <input type="radio" name="prorealizados" value="3"
                                            <?php echo $projects['category']==3?'checked ':''; ?>
                                            data-title="Espacios de trabajo" 
                                            data-info="Buscamos proyectos en los que la iluminación facilite el desarrollo de actividades orientadas al servicio y la productividad. Esta categoría incluye: oficinas, centros de salud, hospitales, bodegas y naves industriales, plantas manufactureras, parques industriales, planteles educativos, edificios públicos y sucursales bancarias.">
                                        <img src="resources/admin/img/cla/categoria/espacios-de-trabajo.png" alt="">
                                    </label>
                                    <label>
                                        <h4>ESPACIOS<br>
                                        <span >PÚBLICOS</span></h4>
                                        <input type="radio" name="prorealizados" value="4"
                                            <?php echo $projects['category']==4?'checked ':''; ?>
                                            data-title="Espacios públicos" 
                                            data-info="Buscamos espacios exteriores cuya iluminación cubra una necesidad funcional específica, facilite la movilidad en cualquier escala o realce los atributos arquitectónicos y patrimoniales del espacio, inmueble o monumento que ilumina. Esta categoría incluye proyectos de alumbrado público, iluminación de puentes, túneles, estructuras, monumentos y fachadas, así como plazas y jardines públicos.">
                                        <img src="resources/admin/img/cla/categoria/espacios-publicos.png" alt="">
                                    </label>
                                    <label>
                                        <h4>INSTALACIÓN<br>
                                        <span>ARTÍSTICA</span></h4>
                                        <input type="radio" name="prorealizados" value="5"
                                            <?php echo $projects['category']==5?'checked ':''; ?>
                                            data-title="Instalacion artística" 
                                            data-info="Buscamos piezas de iluminación que hayan sido exhibidas durante un periodo acotado de tiempo o formen parte de una colección específica. En esta categoría también se incluyen proyectos de iluminación escénica, iluminación de eventos e intervenciones lumínicas temporales.">
                                        <img src="resources/admin/img/cla/categoria/instalacion-artistica.png" alt="">
                                    </label>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <h3 style="font-weight: 400;">ELIGE UNA CATEGORÍA PARA TU PROYECTO</h3>
                                <h4 id="catTitle" style="font-weight: 400;">Puedes dar clic sobre cada categoría para que puedas leer la descripción de cada una.</h4>
                                <p id="catInfo"></p>
                            </div>
                        </div>
                        
                        <br>
                        
                        <div class="row ">
                            <br>
                            <div class="col-sm-12 text-center">
                                <button class="btn btn-warning p-top-9 activate-p1" data-action="next" data-actual="info-1" data-s="info-2">SIGUIENTE</button>
                            </div>
                        </div>
                    </div>
                    <br>

                    <!-- Step two -->
                    
                    <div class="row info-2">
                        <div class="col-lg-12 selector-step">
                            <label>1. Categoría</label>
                            <label class="active">2. Datos generales del proyecto</label>
                            <label>3. Imágenes y archivos</label>
                        </div>
                        <?php #print_r($projects); ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="namep">Nombre del proyecto <span class="label label-danger"></span></label>
                                <input type="text" name="namep" id="namep" class="form-control input-reg" 
                                    placeholder="Escriba el nombre del proyecto" required
                                    value="<?php echo $projects['name']; ?>"> 
                                
                            </div>
                            <div class="form-group col-md-4"> <!-- FALTA IMP -->
                                <label for="pais">País <span class="label label-danger"></span></label>
                                <input type="text" name="pais" id="pais" required
                                    class="form-control input-reg" 
                                    placeholder="Escriba el país donde se realizó"
                                    value="<?php echo $projects['pais']; ?>">
                                
                            </div>
                            <div class="form-group col-md-4"> <!-- FALTA IMP -->
                                <label for="ciudad">Ciudad <span class="label label-danger"></span></label>
                                <input type="text" name="ciudad" id="ciudad" required
                                    class="form-control input-reg" 
                                    placeholder="Escriba la ciudad donde se realizó"
                                    value="<?php echo $projects['ciudad']; ?>">
                            </div>
                            <div class="form-group col-md-4"> <!-- FALTA IMP -->
                                <label for="finalobra">Fecha de finalización <span class="label label-danger"></span></label>
                                <input class="form-control input-reg" 
                                    placeholder="Escriba la fecha en la que terminó el proyecto"
                                    type="date" name="finalobra" id="finalobra" 
                                    value="<?php echo $projects['end']; ?>" required>
                            </div>
                            <div class="form-group col-md-4"> <!-- FALTA IMP -->
                                <label for="disil">Diseño de iluminación por <span class="label label-danger"></span></label>
                                <input class="form-control input-reg" placeholder="Escriba el nombre"
                                    type="text" name="disil" id="disil" required 
                                    value="<?php echo $projects['disenador']; ?>">
                            </div>
                            <div class="form-group col-md-4"> <!-- FALTA IMP -->
                                <label for="colab">Colaboradores (opcional)</label>
                                <input class="form-control input-reg" placeholder="Escriba los nombres"
                                    type="text" name="colab" id="colab"
                                    value="<?php echo $projects['colaboradores']; ?>">
                            </div>
                            <div class="form-group col-md-4"> <!-- FALTA IMP -->
                                <label for="arqui">Arquitectura por <span class="label label-danger"></span></label>
                                <input class="form-control input-reg" placeholder="Escriba el nombre"
                                    type="text" name="arqui" id="arqui" required
                                    value="<?php echo $projects['arquitecto']; ?>">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="desc_proyecto">Descripción del proyecto <span class="label label-danger"></span></label>
                                <textarea name="desc_proyecto" id="desc_proyecto" required rows="5" maxlength="700" class="form-control input-reg count-word" placeholder="Máximo 700 caracteres"><?php echo $projects['descripcion']; ?></textarea>
                                <!--<span class="contador"></span>-->
                                
                            </div>
                        </div>
                        
                        <div class="row p-top-50">
                            <div class="col-sm-4 col-sm-offset-2 text-center">
                                <button class="btn btn-warning p-top-9 activate-p1" data-action="prev" data-actual="info-2" data-s="info-1">ANTERIOR</button>
                            </div>
                            <div class="col-sm-4  text-center">
                                <button class="btn btn-warning p-top-9 activate-p1" data-action="next" data-actual="info-2" data-s="info-3">SIGUIENTE</button>
                            </div>
                            
                        </div>
                    </div>

                    <!-- Step Four -->
                    <div class="row info-3">
                        <div class="col-lg-12 selector-step">
                            <label >1. Categoría</label>
                            <label>2. Datos generales del proyecto</label>
                            <label class="active">3. Imágenes y archivos</label>
                        </div>
                        <div class="row">
                            <div class=" form-group col-sm-4 ">
                                <label class="v-middle">Créditos de las fotografías (opcional)</label>
                                <input type="text" name="fotografo" value="<?php echo $projects['fotografo']; ?>" class="form-control input-reg">
                            </div>
                            <div class=" form-group col-sm-4">
                                <label class="v-middle">Video URL</label>
                                <input type="url" name="video" value="<?php echo $projects['video']; ?>" class="form-control input-reg">
                            </div>
                            <div class=" form-group col-sm-4 ">
                                <label class="v-middle">Créditos del video (opcional)</label>
                                <input type="text" name="creditosvid" value="<?php echo $projects['cred_video']; ?>" class="form-control input-reg">
                            </div><br>
                            <div class=" form-group col-sm-12 pdf ">
                                <label  class="v-middle">Adjuntar brief del proyecto en PDF. (Peso máximo 4 MB)<a href="/cla/resources/page/images/descargables/ConstrulitaLightingAwards2019_Lineamientos.pdf" target="_blank" class="amarillo font-bold"> Consultar lineamientos y recomendaciones.</a><span class="label label-danger"></span></label>                                
                                <input type="file" name="pdf" id="pdf" class="form-control" >
                                <input type="hidden" id="pdfRef" required value="<?php echo $projects['pdf']; ?>">
                                <div id="pdfUpl">
                                    <?php
                                        if( $projects['pdf']!= "" && $projects['pdf']!= NULL ) { 
                                    ?>
                                        <br>
                                        <a href="public/pdf/<?php echo $projects['pdf'] ?>" class="see" target="_blank" style="display:block;max-width:100px;overflow-x:hidden;">
                                            <img src="https://png.icons8.com/color/1600/pdf-2.png" style="max-width:100px;"><br>
                                            <small style="display:block;white-space: nowrap;"><?php echo $projects['pdf']; ?></small>
                                        </a>
                                        <br><a class="delete-pdf" style="cursor:pointer;text-decoration:underline;" data-name="<?php echo $projects['pdf'] ?>">Eliminar pdf</a>
                                        
                                    <?php
                                    }  
                                    ?>
                                </div>
                                <br>
                                <progress id="upload-ajax"></progress>
                                <span class="contador"></span>
                                <span class="label label-danger" id="info-3-pdf"></span>
                                
                            </div>
                            <div class=" form-group col-sm-12 ">
                                <label class="v-middle">Imágenes <span class="label label-danger"></span></label>
                                    <p>Arrastra los archivos o haz click dentro del recuadro para subir imágenes (PNG, JPG, JPEG), recuerda que el mínimo son 3 y máximo 8. No deben pesar más de 8 MB. </p>
                                    <p id="errorFileImg" style="color:red;"></p>
                                <form action="upload-img-ajax" class="dropzone" id="my-dropzone">
                                    <div class="fallback"> 
                                        <input name="file" type="file" multiple />
                                    </div>
                                </form>
                            </div>
                            
                        </div>

                        <div class="row">
                            <div class="col-sm-8 col-sm-offset-2">
                                <table class="table table-bordered table-hover" id="added-articles">
                                    <thead>
                                        <tr>
                                            <td>VISTA PREVIA</td>
                                            <td>NOMBRE DE ARCHIVO</td>
                                            <td>ACCIÓN</td>
                                            <td>ROTAR</td>
                                        </tr>
                                    </thead>
                                    <tbody class="tbody-uploads"></tbody>
                                </table>
                            </div>
                        </div>
                        <br><br>
                        

                        <div class="row"  id="message-processing" style="display:none;">
                            <div class="col-sm-8 col-sm-offset-2 text-center">
                                <div class="alert alert-warning">
                                    <strong>Se esta procesando la imagen y optmizando, esto puede tomar unos minutos.</strong>
                                </div>
                            </div>
                        </div>

                        <div class="row p-top-50">
                        <div class="col-sm-12 text-center">
                            Para postular, es necesario guardar primero el proyecto.<br>Del mismo modo, te recomendamos guardar antes de salir o, de lo contrario, la información se perderá.<br><br>
                        </div>
                            <div class="col-sm-4  text-center">
                                <button  class="btn btn-warning p-top-9 activate-p1" data-action="prev" data-actual="info-3" data-s="info-2">ANTERIOR</button>
                            </div>
                            <div class="col-sm-4  text-center">
                                <button  class="btn btn-warning p-top-9 activate-p1" data-action="next" data-actual="info-3" data-s="">GUARDAR PROYECTO</button>
                            </div>
                            <div class="col-sm-4  text-center">
                                <?php 
                                    $userr = new User();
                                    $proy = count($userr->completeProjectsId());
                                    
                                    if($proy <= 3){
                                ?>
                                <script>console.log("p: <?php echo $proy ?>");</script>
                                <button  class="btn btn-warning p-top-9 activate-p1" style="DISPLAY:none;" disabled="disabled" id ="postular" onclick="postular()" >POSTULAR</button>

                                <?php 
                                    }else{
                                ?>
                                
                                <b>No puedes postular más de 3 proyectos</b>

                                <?php 
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                    <span id="msgStatus"></span>
                    <br>
                    <br>				
                <!--</form> -->
            </div>
        </div>
        <?php }else{ ?>
            <div class="row" id="in">
                <div class="col-lg-6 col-lg-offset-3 p-top-50">
                    <center>TIENES VARIOS PROYECTOS PENDIENTES.<br> TE RECOMENDAMOS TERMINAR O ELIMINAR ALGUNO.</center>
                </div>
            </div>
        <?php } ?>
    </div>
    <div id="del-imag" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center">
                            <h3>¿Estas seguro que deseas eliminar esta imagen definitivamente?</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 text-center t-top-25">
                            <a href="#" class="del-img text-center btn yellow">Eliminar</a>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        </div>
                        
                    </div>			        	
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>

    </div>

    <!-- Modal content-->
    <div id="cnf" class="modal fade" role="dialog">
        
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1">
                            <h1 class="titles">Condiciones legales:</h1>
                            <br>
                            <div class="row">
                                <div class="col-sm-1">
                                    <input type="checkbox" name="final" value="1" /><br />
                                </div>
                                <div class="col-sm-11">
                                    <h2 class="titles" style="margin-top: 0;">CONDICIONES LEGALES</h2>
                                    <h2 class="titles">DECLARACIÓN DE LIBERACIÓN DE MATERIALES</h2>
                                    <p>En relación a los materiales empleados para el registro de sus proyectos en <b>Construlita Lighting Awards 2018</b>, el participante que suscribe, declara ser el propietario de los derechos de autor (o actuar a nombre de este) del material y otorga a Construlita Lighting International S.A. de C.V., el derecho no exclusivo para utilizar todas las fotografías, renders, videos, audios, datos sobre el proyecto (excepto los datos clasificados como confidenciales) y materiales presentados al momento del registro a través del <a href="http://www.construlitalighting.com/cla/" target="_blank" class="color-a">portal</a>, para fines promocionales, educativos y de difusión. También autoriza a utilizar las imágenes en medios de comunicación de cualquier tipo, en todo el mundo, de forma permanente.</p>
                                    <p>El participante propietario declara que sustenta los derechos de autor sobre los proyectos presentados para la exhibición y distribución de los materiales como parte de la convocatoria de los <b>Construlita Lighting Awards 2018</b>, garantiza y representa que posee todos los derechos o facultades sobre las fotografías, videos y materiales presentados y por este medio declara y mantiene a Construlita Lighting International S.A. de C.V., empresas relacionadas a GrupoConstrulita, licenciatarios, colaboradores y cesionarios de las marcas Construlita y Tecno Lite, miembros del jurado, así como a sus empresas y medios asociados, fuera de cualquier controversia ocasionada por perjuicio, reclamo, daño, responsabilidad legal, costos y gastos que surjan de la utilización de los mencionados materiales. El concursante autoriza en este acto el uso de los materiales antes mencionados y registrados en el expediente del proyecto.</p>
                                    <p>He leído y acepto las presentes bases, términos y condiciones y es mi deseo participar en Construlita Lighting Awards 2018.</p>
                                </div>
                            </div>
                        </div>
                    
                        <div class="row">
                            <div class="col-sm-10 col-sm-offset-1 text-center p-top-50">
                                <a onclick="saveAll()" class="btn btn-warning p-top-9 activate-p1">&emsp;ENVIAR PROYECTO&emsp;</a>
                            </div>
                            
                        </div>
                                                
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    var catRadios = document.querySelectorAll('input[type=radio][name=prorealizados]');
    var title = [];
    var info = [];
    for( var i= 0; i<catRadios.length; i++){
        var thisCatRadios = catRadios[i];
        thisCatRadios.addEventListener('click',function(){
            document.querySelector("#catTitle").innerText = this.dataset.title;
            document.querySelector("#catInfo").innerText = this.dataset.info;
        })
    }

</script>