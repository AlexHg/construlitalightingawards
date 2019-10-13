
<ol class="breadcrumb">
    <li><a href="participante"><i class="fa fa-home"></i></a></li>
    <li>Editar perfil</li>
</ol>
<!-- Customer Addresses Block -->
<div class="block" id="editarInfo">
    <!-- Customer Addresses Title -->
    <div class="block-title">
        <h2><img src="resources/admin/img/cla/icons/proyecto-nuevo.png" style="width:20px;" alt=""> Editar información de usuario</h2>
    </div>
    <!-- END Customer Addresses Title -->

    <!-- Customer Addresses Content -->

    <form action="update" method="POST" class="row" id="update" enctype="multipart/form-data">
        <div class="form-group col-lg-4">
            <label for="einombre">Nombre <span class="label label-danger"></span></label>
            <input type="text" 
                required
                name="name" 
                value="<?php echo $user['name']; ?>" 
                id="einombre" 
                class="form-control" 
                placeholder="Introduzca su nombre"
            />
        
        </div>
        <div class="form-group col-lg-4">
            <label for="eiapellido">Apellido <span class="label label-danger"></label>
            <input type="text" required
                name="lastname"  
                value="<?php echo $user['lastname']; ?>" 
                id="eiapellido" 
                class="form-control" 
                placeholder="Introduzca sus apellidos"
            />
        </div>
        <div class="form-group col-lg-4">
            <label for="eitel">Teléfono <span class="label label-danger"></label>
            <input type="tel" required 
                value="<?php echo $user['phone']; ?>" 
                id="eitel" 
                name="telefono" 
                class="form-control" 
                placeholder="Número de contacto personal"
            />
        </div>
        <div class="form-group col-lg-4">
            <label for="eipais">País <span class="label label-danger"></label>
            <input type="text" required
                value="<?php echo $user['country']; ?>" 
                id="eipais" name="pais" 
                class="form-control" placeholder="País"
            />
        </div>
        <!--<div class="form-group col-lg-4">
            <label for="eiest">Estado</label>
            <input type="text" 
                value="<?php echo $user['estado']; ?>" 
                id="eiest" name="estado" 
                class="form-control" placeholder="Estado"
            />
        </div> -->
        <div class="form-group col-lg-4">
            <label for="eiciudad">Ciudad de residencia <span class="label label-danger"></label>
            <input type="text" required
                value="<?php echo $user['municipio']; ?>" 
                id="eiciudad" name="municipio" 
                class="form-control" placeholder="Ciudad de residencia"
            />
        </div>
        <div class="form-group col-lg-4">
            <label for="eiest">¿Cuál es tu perfil de LinkedIn?</label>
            <input type="text"
                value="<?php echo $user['estado']; ?>" 
                id="eiest" name="estado" 
                class="form-control" placeholder="Ej. mx.linkedin.com/in/usuario"
            />
        </div>
        <!--<div class="form-group col-lg-4">
            <label for="eicolonia">Colonia</label>
            <input type="text" 
                value="<?php echo $user['municipio']; ?>" 
                id="eicolonia" name="municipio" 
                class="form-control" 
                placeholder="Colonia"
            />
        </div> -->
        <!--<div class="form-group col-lg-4">
            <label for="eicalle">Calle y número</label>
            <input type="text" 
                value="<?php echo $user['street_number']; ?>" 
                id="eicalle" name="calle" 
                class="form-control" placeholder="Calle y número"
            />
        </div> -->
        <div class="form-group col-lg-12">
            <hr>
        </div>
        <div class="form-group col-lg-4">
            <label for="eiprofesion">Profesión <span class="label label-danger"></label>
            <select name="estudios"  required
                id="eiprofesion" class="form-control" 
                placeholder="Introduzca su profesión">
                <option <?php echo $user['profession']=="Arquitecto"?'selected':''; ?>>Arquitecto</option>
                <option <?php echo $user['profession']=="Diseñador de Iluminación"?'selected':''; ?>>Diseñador de iluminación</option>
                <option <?php echo $user['profession']=="Interiorista"?'selected':''; ?>>Interiorista</option>
                <option <?php echo $user['profession']=="Ingeniero"?'selected':''; ?>>Ingeniero</option>
                <option <?php echo $user['profession']=="Paisajista"?'selected':''; ?>>Paisajista</option>
                <option <?php echo $user['profession']=="Urbanista"?'selected':''; ?>>Urbanista</option>
                <option <?php echo $user['profession']=="Desarrollador inmobiliario"?'selected':''; ?>>Desarrollador inmobiliario</option>
                <option <?php echo $user['profession']=="Otro"?'selected':''; ?>>Otro</option>
            </select>
            <input type="text" 
                id="eiprofesiono" 
                name="otro" 
                class="form-control" 
                placeholder="Otro:"
                value="<?php echo ($user['profession'] != "Arquitecto" && $user['profession'] != "Diseñador de Iluminación" && $user['profession'] != "Interiorista" && $user['profession'] != "Ingeniero" && $user['profession'] != "Paisajista" && $user['profession'] != "Desarrollador inmobiliario" && $user['profession'] != "Urbanista" )?$user['profession']:''; ?>"
            >
        </div>
        <div class="form-group col-lg-4">
            <label for="eiactividad">Actividad <span class="label label-danger"></label>
            <select name="situacion" id="eiactividad" class="form-control" required>
                <option <?php echo $user['labor_situation']=="independiente"?'selected':''; ?> value="independiente">Diseñador independiente</option>
                <option <?php echo $user['labor_situation']=="empleado"?'selected':''; ?> value="empleado">Empleado o colaborador</option>
                <option <?php echo $user['labor_situation']=="estudiante"?'selected':''; ?> value="estudiante">Estudiante</option>
            </select>
        </div>
                <div class="form-group col-lg-4">
            <label for="eiempresa">Empresa o institución</label>
            <input type="text" id="eiempresa" 
                name="business" class="form-control" 
                value="<?php echo $user['business']; ?>" 
                placeholder=""
            />
        </div>
        <!--<div class="form-group col-lg-4">
            <label for="eicolaboradores">Colaboradores</label>
            <input type="text" id="eicolaboradores" 
                name="group" class="form-control"
                value="<?php echo $user['members']; ?>" 
                placeholder=""
            />
        </div>-->

        <div class="form-group col-lg-12">
            <hr>
        </div>
        <div class="form-group col-lg-4">
            <label for="eicorreo">Correo electrónico</label>
            <input type="mail" id="eicorreo" name="correo" class="form-control" placeholder="Introduzca su correo electrónico">
        </div>
        <div class="form-group col-lg-4">
            <label for="eicontra">Contraseña</label>
            <input type="password" id="eicontra" name="contra" class="form-control" placeholder="Introduzca su contraseña">
        </div>
        
        <div class="form-group col-lg-12">
            <hr>
        </div>
        <div class="form-group col-lg-12">

            <label>Fotografía de perfil <span class="label label-danger"></label><br>
            <img id="output"  style="max-width: 200px;margin-top: 1rem;display: inline; margin-right:1rem;"/><br>
            <input type="file"  name="avatar" onchange="loadFile(event)" style="display:inline;" required>
            
            <script>
                var loadFile = function(event) {
                    var output = document.getElementById('output');
                    output.src = URL.createObjectURL(event.target.files[0]);
                };
            </script>
        </div>
        <!--<input type="hidden" name="img-profile-user" value="<?php echo $user['path_image']; ?>">-->
        
    </form>
    <!--<div class="form-group col-lg-12"">
        <div class="col-lg-4">
            <style>
                #profile span{font-size:15px;}
                .dz-default.dz-message{margin:0;}
            </style>
            <form action="upload-img-ajax" class="dropzone" id="profile">
                <div class="fallback">
                    <input name="file" type="file" multiple />
                </div>
            </form>
        </div>

        <div class="col-sm-5">
            <table class="table table-bordered table-hover" id="added-articles">
                <thead>
                    <tr>
                        <td>MUESTRA</td>
                        <td>NOMBRE DE ARCHIVO</td>
                        <td>ACCIÓN</td>
                        <td>ROTAR</td>
                    </tr>
                </thead>
                <tbody class="tbody-profile">
                    <?php 
                    if( $user['path_image'] != "" ){
                    $imagen = $user['path_image'];
                    $random = rand(0,70);
                    $replace = str_replace("public/img-profiles/","",$imagen);
                    ?>
                    <tr>
                        <td><img src="<?php echo $imagen; ?>?hash=<?php echo $random; ?>" width="100px"></td>
                        <td><?php echo $replace; ?></td>
                        <td onclick="deleteImagenTemp(10)"><a>Eliminar</a></td>
                        <td class="text-center">
                            <i class="fa change-orient fa-undo" data-orientation="left" aria-hidden="true"></i> 
                            <i class="fa change-orient fa-repeat" data-orientation="right" aria-hidden="true"></i>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>-->
    <div class="row" >
        <div class="col-lg-10 col-lg-offset-1 text-center">
                <br><p id="upload-img-profile"></p>												
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 ">
            <button type="button" class="btn btn-sm btn-warning p-top-9 " onclick="check()">
                <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="display:none"></span>
                GUARDAR
            </button><br><br>
        </div>
    </div>


    <!-- END Customer Addresses Content -->
</div>
<!-- END Customer Addresses Block -->
<script>
    function check(){
        var inputRequired = document.querySelectorAll("form input[required]");
        var flag = true;
        for(var i = 0; i < inputRequired.length; i++){
            inputr = inputRequired[i];
            if(inputr.value==""){
                console.log(inputr.parentNode.querySelector("span.label.label-danger"));
                inputr.parentNode.querySelector("span.label.label-danger").innerText = "Campo requerido";
                flag = false;
                $('body, html, form').scrollTop(0);
            }else {
                inputr.parentNode.querySelector("span.label.label-danger").innerText = "";
            }
        }
        if(flag) document.querySelector("form").submit();
    }
</script>
