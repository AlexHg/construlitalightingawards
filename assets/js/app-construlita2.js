
Dropzone.options.profile = {
    autoProcessQueue: true,
    uploadMultiple: false,
    maxFilesize: 8,
    maxFiles: 1,
    parallelUploads: 1,
    dictRemoveFile: "Eliminar archivo",
    dictInvalidFileType: "No es posible subir archivos de ese tipo",
    dictDefaultMessage: "Arrastra los archivos aquí o haz click dentro del recuadro para subir imágenes.",
    dictCancelUpload: 'Cancelar carga',
    url: "upload-profile-ajax",
    paramName: "file",
    acceptedFiles: "image/jpeg,image/png,image/gif",
    addRemoveLinks: false,

    init: function () {


        this.on('sending', function (file, xhr, formData) {
            $(".glyphicon-refresh-animate").show();
            $('button').prop("disabled",true);
            $('#upload-img-profile').empty();
            $("#upload-img-profile").text("Espera un momento estamos procesando tu imagen de perfil");
            $('#message-processing').show();
        });

        this.on('success', function (file, response) {

            console.log("****success****");
            console.log(file);
            console.log(response);
            console.log("****success****");
            this.removeFile(file);
            $('.tbody-profile').html("");
            respon = JSON.parse(response);
            console.log(respon);
            console.log(respon.status);
            if(respon.status == 'success'){
                updateUploadsProfile(respon.name);
                $('input[name=img-profile-user]').val("");
                $('input[name=img-profile-user]').val(respon.name);
            }else{
                swal(
                  '',
                  'Lo sentimos no pudimos procesar esta imagen, intenta nuevamente.',
                  'error'
                )        
            }
            $(".glyphicon-refresh-animate").hide();
			$('#message-processing').hide();
            $('#upload-img-profile').empty();
            $('button').prop("disabled",false);
        });
		this.on('error', function(file, response) {
		    $(file.previewElement).find('.dz-error-message').text(response);
		});

        this.on("addedfile", function (file) {
            var _this = this;
            //document.querySelector("#errorFileImg").innerText = "";
            if ($.inArray(file.type, ['image/jpeg','image/png','image/gif']) == -1) {
                _this.removeFile(file);
                document.querySelector("#errorFileImg").innerHTML += 'El archivo que intento subir no esta permitido.<br>';
                //alert('El archivo que intento subir no esta permitido.')
            }
            if( document.querySelectorAll("#added-articles tbody tr").length >= 5){
                _this.removeFile(file);
                document.querySelector("#errorFileImg").innerHTML += "Solo se permiten hasta 5 imagenes<br>";
                //alert("Solo se permiten hasta 5 imagenes"); 
            }
            setTimeout(function(){
				document.querySelector("#errorFileImg").innerText = "";
			},5000);
        });

    }
};

$('body').on('click','.change-orient',function(){

    var orientation = $(this).data('orientation');
    var imagen = $(this).parent().parent().find('td:nth-child(2)').text();
    $.post("rotate-profile", { orientation: orientation, name:imagen } ,function(data, status){
        updateUploadsProfile(imagen);
    }); 

});


function updateUploadsProfile(name) {
    
    $('.tbody-profile').html("");

    var hash = Date.now();
    // console.log(file.url);
    //var imagen = file.url.replace("public/projects/", "");
    $('.tbody-profile').append(
            '<tr><td>'
            + '<img src="public/img-profiles/' + name +  '?hash='+hash+'" width="100px">' + '</td><td>'
            + name + '</td>'
            + '<td onclick="deleteImagenTemp(\''+name+'\')"><a>Eliminar</a></td>'
            + '<td class="text-center"><i class="fa change-orient fa-undo" data-orientation="left" aria-hidden="true"></i> <i class="fa change-orient fa-repeat" data-orientation="right" aria-hidden="true"></i></td></tr>'
            );
       

   
}

function deleteImagenTemp(name){
    $('.tbody-profile').html("");
    $('input[name=img-profile-user]').val("");
    // $.post("delete-img-ajax-temp", { id: id } ,function(data, status){
    //     if(data == 1){
    //         var id_project = $("input[name=project").val();
    //         updateUploads(id_project);
    //     }
    // });
}