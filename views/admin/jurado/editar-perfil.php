<ol class="breadcrumb">
    <li><a href="/cla/proyectos-sin-calificar"><i class="fa fa-home"></i></a></li>
    <li>Editar perfil</li>
</ol>
<!-- Customer Addresses Block -->
<div class="block" id="editarInfo">
    <!-- Customer Addresses Title -->
    <div class="block-title">
        <h2><img src="resources/admin/img/cla/icons/proyecto-nuevo.png" style="width:20px;" alt=""> Editar información de jurado</h2>
    </div>
    <!-- END Customer Addresses Title -->

    <!-- Customer Addresses Content -->

    <form action="update" method="POST" class="row" id="update" enctype="multipart/form-data">
        <div class="form-group col-lg-4">
            <label for="einombre">Nombre <span class="label label-danger"></span></label>
            <input type="text" 
                name="name" required 
                value="<?php echo $user['name']; ?>" 
                id="einombre" 
                class="form-control" 
                placeholder="Introduzca su nombre"
            />
        
        </div>
        <div class="form-group col-lg-4">
            <label for="eiapellido">Apellido <span class="label label-danger"></span></label>
            <input type="text" 
                name="lastname" required
                value="<?php echo $user['lastname']; ?>" 
                id="eiapellido" 
                class="form-control" 
                placeholder="Introduzca sus apellidos"
            />
        </div>
        <div class="form-group col-lg-4">
            <label for="eitel">Telefono <span class="label label-danger"></span></label>
            <input type="tel" required
                value="<?php echo $user['phone']; ?>" 
                id="eitel" 
                name="telefono" 
                class="form-control" 
                placeholder="Introduzca su número telefónico"
            />
        </div>
        
        
        <div class="form-group col-lg-12">
            <hr>
        </div>
        <div class="form-group col-lg-4">
            <label for="eicorreo">Correo electrónico <span class="label label-danger"></span></label>
            <input type="mail" id="eicorreo" name="correo" class="form-control" required placeholder="Introduzca su correo electrónico">
        </div>
        <div class="form-group col-lg-4">
            <label for="eicontra">Contraseña <span class="label label-danger"></span></label>
            <input type="password" id="eicontra" name="contra" class="form-control" required placeholder="Introduzca su contraseña">
        </div>
        
        <div class="form-group col-lg-12">
            <hr>
        </div>
        <div class="row">
            <div class="col-sm-9 col-sm-offset-1">
                <h3>FOTOGRAFÍA DE PERFIL</h3>
                
            </div>
            <div class="col-sm-9 col-sm-offset-1 text-center file msg-imagen">
                <!--<a href="#" class="form-control input-reg p-top-25 height-auto"><span class="glyphicon glyphicon-arrow-up"></span></a>
                <input type="file" id="avatar" name="avatar"> -->
            </div>
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
    </form>
    <div class="row" >
        <div class="col-lg-10 col-lg-offset-1 text-center">
                <br><p id="upload-img-profile"></p>												
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 ">
            <button type="submit" class="btn btn-sm btn-warning p-top-9 save-inside" onclick="check()">
                <span class="glyphicon glyphicon-refresh glyphicon-refresh-animate" style="display:none"></span>
                Editar información
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