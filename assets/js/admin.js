Dropzone.options.myDropzone = {
    autoProcessQueue: true,
    uploadMultiple: false,
    maxFilesize: 8,
    maxFiles: 12, 
    parallelUploads: 1,
    dictRemoveFile: "Eliminar archivo.",
    dictInvalidFileType: "No es posible subir archivos de ese tipo.",
    dictDefaultMessage: "Subir archivos.",
    dictCancelUpload: 'Cancelar carga.',
    url: "upload-img-ajax",
    paramName: "file",
    acceptedFiles: "image/jpeg,image/png,image/gif",
    addRemoveLinks: false,

    init: function () {


        this.on('sending', function (file, xhr, formData) {
            formData.append("fileName", file.upload.filename);
            var id_project = $("input[name=project]").val();
            formData.append("id_project", id_project);
            
            console.log("sending");
            $('#message-processing').show();
        });

        this.on('success', function (file, response) {

      		console.log("********");
      		console.log(file);
      		console.log(response);
			console.log("********");
			  
            this.removeFile(file);
            var id_project = $("input[name=project]").val();
			updateUploads(id_project);
			$('#message-processing').hide();

			var responseJson = JSON.parse(response);
			//document.querySelector("#errorFileImg").innerText = "";
			if(responseJson["status"] == "errorFileW"){
				document.querySelector("#errorFileImg").innerHTML += "El archivo debe ser mayor a 720px en alto y ancho. Tu archivo actual es de: "+responseJson["width"]+"px, "+responseJson["height"]+"px<br>";
			}
			if(responseJson["status"] == "errorFileSize"){
				document.querySelector("#errorFileImg").innerHTML += "El archivo no puede pesar más de 10MB. Tu archivo actual: "+responseJson["size"]+"<br>";
			}
			setTimeout(function(){
				document.querySelector("#errorFileImg").innerText = "";
			},5000);
			//console.log();
		});
		
		this.on('error', function(file, response) {
			$(file.previewElement).find('.dz-error-message').text(response);

			//alert("error");
		});

        // this.on('removedfile', function (file) {
        // 	console.log("click en remover elemento");
        // 	console.log(this);
        // 	console.log(file.removeLink);
		// });
		
        this.on("addedfile", function (file) {
        	console.log("********");
        	console.log(file);
        	console.log("********");
            var _this = this;
            if ($.inArray(file.type, ['image/jpeg','image/png','image/gif']) == -1)  {
                _this.removeFile(file);
                alert("El archivo que intento subir no esta permitido");
			}
			if( document.querySelectorAll("#added-articles tbody tr").length >= 8){
				_this.removeFile(file);
                alert("Solo se permiten un máximo de 8 imágenes"); 
			}
        });

    }
};

var id_project = $("input[name=project]").val();
updateUploads(id_project);

$('body').on('click','.change-o',function(){

	var orientation = $(this).data('orientation');
	var imagen = $(this).parent().parent().find('td:nth-child(2)').text();
	// console.log(orientation);
	// console.log(imagen);
	$.post("rotate", { orientation: orientation, name:imagen } ,function(data, status){
		// console.log(data);
		// console.log(status);
		var id_project = $("input[name=project]").val();
		updateUploads(id_project);
    });	

});



function updateUploads(id_project) {
    $.get("get-images?id="+id_project ,function (status) {
        $('.tbody-uploads').html("");
        // console.log(status);
        res = JSON.parse(status);
        $.each(res, function (i, file) {
            var c = i + 1;
            var hash = Date.now();
            // console.log(file.url);
            var imagen = file.url.replace("public/projects/", "");
            $('.tbody-uploads').append(
				'<tr><td>'
				+ '<img src="public/projects/' + imagen +  '?hash='+hash+'" width="100px">' + '</td><td>'
				+ imagen + '</td>'
				+ '<td onclick="deleteImagen('+file.id_img+')"><a>Eliminar</a></td>'
				+ '<td class="text-center"><i class="fa change-o fa-undo" data-orientation="left" aria-hidden="true"></i> <i class="fa change-o fa-repeat" data-orientation="right" aria-hidden="true"></i></td></tr>'
            );
        });

    });
}

// Eliminar una imagen
function deleteImagen(id){

	$.post("delete-img-ajax", { id: id } ,function(data, status){
		if(data == 1){
			var id_project = $("input[name=project]").val();
			updateUploads(id_project);
		}
    });
}

$('body').on('click','.dz-preview',function(e){
	e.preventDefault();
	console.log("clic en el preview");
});

// $("#pdf").change(function() {
//      console.log("cambio detectado");
//      var file = $(this)[0].files[0];
//      console.log(file);
//      checkFile(file);
// });

var file_onchange = function () {
  var input = this; 

  if (input.files && input.files[0]) {
  	var file = this.files[0];
    var type = input.files[0].type;
    var id_project = $("input[name=project]").val();
    var size = input.files[0].size;
    var sizeMb = (size / (1024*1024)).toFixed(2);
    console.log(sizeMb);
    if ( type == "application/pdf") {
    	if ( sizeMb <=  3.5 ) {
		    $('#upload-ajax').show();
		    var formData = new FormData();
		    	formData.append( 'ispdf', file );
		    	formData.append( 'id', id_project  );

			    $.ajax({
			        url: 'upload-pdf',
			        type: 'POST',
			        data:  formData,
			        cache: false,
			        contentType: false,
			        processData: false,

			        xhr: function() {
			            var myXhr = $.ajaxSettings.xhr();
			            if (myXhr.upload) {
			                myXhr.upload.addEventListener('progress', function(e) {
			                    if (e.lengthComputable) {
			                        $('progress').attr({
			                            value: e.loaded,
			                            max: e.total,
			                        });
			                    }
			                } , false);
			            }
			            return myXhr;
			        },
			        success: function(data){
			        	console.log("success");
						console.log(data);
						$('#upload-ajax').hide();
			        	$('progress').attr({value: 0,max: 100,});
						if(data["status"] == "errorFileSize"){
							alert("El archivo es demasiado grande, se aceptan maximo 4MB por PDF. Tu archivo: "+data["size"]);
							
						}else{
							document.querySelector("#pdfUpl").innerHTML = `<br>
								<a href="public/pdf/${data}" class="see" target="_blank" style="display:block;max-width:100px;overflow-x:hidden;">
									<img src="https://png.icons8.com/color/1600/pdf-2.png" style="max-width:100px;"><br>
									<small style="display:block;white-space: nowrap;">${data}</small>
								</a>
								<br><a class="delete-pdf" data-name="${data}">Eliminar</a>`;
							document.querySelector("#pdfRef").value=data; 
						}
			        	
			        	
			        },
			        error: function($data){
			        	console.log("Esto es un error");
			        	console.log($data);
			        	$('#upload-ajax').hide();
			        }
			    });
		}else{
			$("#pdf").val("");
			alert('Tamaño no permitido, debe ser menor a 4 MB.');
		}
      //end
    } else {
      $("#pdf").val("");
      alert('Este tipo de archivo no es soportado.');
    }
  }
};

$('#pdf').on('change', file_onchange);
$('#upload-ajax').hide();
$('progress').attr({
            value: 0,
            max: 100,
        });
// $('body').on('change','#pdf',function(e){
// 	e.preventDefault();
// 	console.log("clic en el preview");
// });


//"contador de palabras
$(".count-word").keyup(function(){
	var text = $(this).val();
	console.log(text);
	var word = text.split(' ').length;
	if(word >= 200 ){
		var newText = text.substring(0,text.length-1);
		$(this).val(newText);
	}
	$(this).parent().find('.contador').text(word);
});

// concursar 

// Ocultar pasos inciales
$(".info-2,.info-3,.info-4").hide();

// Avanzar entre distintos pasos 
$('.activate-p').on('click',function(){
	
	// $act = $(this).data("validate");
	$action = $(this).data('action');
	var $show = $(this).data('s');
	var $hide = $(this).data('actual');
	// var $hide = $(this).data('h');
	var $button =  $(this);
		$button.prop('disabled',true);
	var id_project = $("input[name=project]").val();

	if($action == 'prev'){
		steps(`.${$show}`,`.${$hide}`);
		$button.prop('disabled',false);
	}
	if($action == 'next'){
		switch($hide){
			case 'info-1':
				if( one() == true ){
					console.log("paso 1");
					var name = $("input[name=namep]").val();
					var proyectosRealizados = $("input[name=prorealizados]:checked").val();
					$.post("save-project", { step:'one',id_project: id_project, category:proyectosRealizados, name:name } ,function(data, status){
						$("input[name=project]").val(data);
						steps(`.${$show}`,`.${$hide}`);
				    });
				}
				
			break;
			case 'info-2':
				console.log("paso 2");
				if( two() == 'true' ){
					console.log("if");
					var name = $("input[name=namep]").val();
					var descripcion = $("textarea[name=desc_proyecto]").val();
					var uso = $("input[name=usoinmueble]").val();
					var direccion = $("input[name=direccion]").val();
					var tipo = $("input[name=tipobra]:checked").val();
					var final = $("input[name=finalobra]").val();
					var arquitecto = $("input[name=proyectoarq]").val();
					var fotografo = $("input[name=fotografo]").val();
					$.post("save-project", { step:'two',id_project: id_project,descripcion:descripcion,uso:uso,direccion:direccion,tipo:tipo,final:final,arquitecto:arquitecto,fotografo:fotografo, name:name} ,function(data, status){
						if(data == 1){
							steps(`.${$show}`,`.${$hide}`);
						}
				    });
				}
			break;
			case 'info-3':
				console.log("paso 3");
				if( three() == 'true' ){
					var disenador = $("input[name=disenadorilumi]").val();
					var colaborador = $("input[name=colaboradores]").val();
					var alcance = $("textarea[name=alcance]").val();
					var mantenimiento = $("textarea[name=mantenimiento]").val();
					var analisis = $("textarea[name=analisis]").val();
					var iluminacion = $("textarea[name=iluminacion]").val();
					// var pdf = $("input[name=pdf]").val();
					// var formData = new FormData();
					// 	formData.append('step', 'three');
					// 	formData.append('id_project', id_project);
					// 	formData.append('disenador', disenador);
					// 	formData.append('colaborador', colaborador);
					// 	formData.append('alcance', alcance);
					// 	formData.append('mantenimiento', mantenimiento);
					// 	formData.append('analisis', analisis);
					// 	formData.append('iluminacion', iluminacion);
					// 	formData.append('pdf', $('input[name=pdf]')[0].files[0]);
	// console.log("***********");

	// $.ajax({
	//     url: 'save-project',
	//     data: formData,
	//     type: 'POST',
	//     contentType: false,
	//     processData: false,

	// 	    success: function(msg) {
	// 		console.log("corecto");
	// 	    console.log(msg);
		        
	// 	    },

	// 	    error: function(msg) {
	// 			console.log("failed");
	// 			console.log(msg);
	// 	    }
	   
	// })

 //   console.log("***********");
					$.post("save-project", { step:'three',id_project: id_project,disenador:disenador,colaborador:colaborador,alcance:alcance,mantenimiento:mantenimiento,analisis:analisis,iluminacion:iluminacion  } ,function(data, status){
						if(data == 1){
							steps(`.${$show}`,`.${$hide}`);
						}
				    });
				}
				
			break;
			case 'info-4':
				console.log("paso 4");
				var video = $("input[name=video]").val();
				$('#cnf').modal('show');
			break;
		}
		$button.prop('disabled',false);
	}
	//display(`.${$next}`,`.${$actual}`);

	// steps(`.${$show}`,`.${$hide}`);


});

$('body').on('click','.delete-pdf',function(e){
	e.preventDefault();
	var conf = confirm("¿Esta seguro que desea eliminar este archivo?");
	if(conf){
		var id_project = $("input[name=project]").val();
		var name = $(this).data('name');
	    var formData = new FormData();
	    	formData.append( 'name', name );
	    	formData.append( 'id', id_project  );

	    $.ajax({
	        url: 'delete-pdf',
	        type: 'POST',
	        data:  formData,
	        cache: false,
	        contentType: false,
	        processData: false,
	        success: function(data){
				$('#pdfUpl').empty();
				document.querySelector("#pdfUpl").innerHTML = "";
	        },
	        error: function($data){
	        	console.log("Esto es un error");
	        	console.log($data);
	        	$('#upload-ajax').hide();
	        }
	    });
	}
});

function saveAll(){
	var id_project = $("input[name=project]").val();
	var url = $("input[name=video]").val();
	id_video = youtube_parser(url);
	video = id_video != false ?id_video:'';

	$.post("save-project", { step:'four',id_project: id_project, video:video } ,function(data, status){
		if(data == 1){
			steps(`.${$show}`,`.${$hide}`);
			$button.prop('disabled',false);
		}
    });	
}

function steps($show,$hide){

	$($show).show();
	$($hide).hide();

}

function one(){

	$("#info-1").empty();
	var flag = false;
	if( typeof($('input[name=prorealizados]:checked').val()) != "undefined" ){
		flag = true;
	}else{
		flag = false;
		$("#info-1").append("Selecciona una categoría");
	}

	return flag;
}

function two(){

	var cont = 8;
	var name = $("input[name=namep]").val();
	var descripcion = $("textarea[name=desc_proyecto]").val();
	var uso = $("input[name=usoinmueble]").val();
	var direccion = $("input[name=direccion]").val();
	var tipo = $("input[name=tipobra]:checked").val();
	var final = $("input[name=finalobra]").val();
	var arquitecto = $("input[name=proyectoarq]").val();
	var fotografo = $("input[name=fotografo]").val();
	var error = "Campo requerido";
	$("#info-2-name,#info-2-descripcion,#info-2-uso,#info-2-direccion,#info-2-tipo,#info-2-final,#info-2-arquitecto,#info-2-fotografo").empty();
	if( name == "" ){
		$("#info-2-name").append(error);
		cont--;
	}

	if( descripcion == "" ){
		$("#info-2-descripcion").append(error);
		cont--;
	}

	if( uso == "" ){
		$("#info-2-uso").append(error);
		cont--;
	}

	if( direccion == "" ){
		$("#info-2-direccion").append(error);
		cont--;
	}

	if( tipo == "" ){
		$("#info-2-tipo").append(error);
		cont--;
	}

	if( final == ""){
		$("#info-2-final").append(error);
		cont--;
	}

	if( arquitecto == "" ){
		$("#info-2-arquitecto").append(error);
		cont--;
	}

	if( fotografo == "" ){
		$("#info-2-fotografo").append(error);
		cont--;
	}

	status = cont == 8 ?true:false;
	return status;
}

function three(){
	var cont = 7;
	var disenador = $("input[name=disenadorilumi]").val();
	var colaborador = $("input[name=colaboradores]").val();
	var alcance = $("textarea[name=alcance]").val();
	var mantenimiento = $("textarea[name=mantenimiento]").val();
	var analisis = $("textarea[name=analisis]").val();
	// var pdf = $("input[name=pdf]").val();
	var iluminacion = $("textarea[name=iluminacion]").val();
	var flag = false;
	var error = "Campo requerido";

	$("#info-3-disenador,#info-3-colaborador,#info-3-alcance,#info-3-mantenimiento,#info-3-analisis,#info-3-pdf,#info-3-iluminacion").empty();
	if( disenador == "" ){
		flag = false;
		$("#info-3-disenador").append(error);
		cont--;
	}

	if( colaborador == "" ){
		flag = false;
		$("#info-3-colaborador").append(error);
		cont--;
	}

	if( alcance == "" ){
		flag = false;
		$("#info-3-alcance").append(error);
		cont--;
	}

	if( mantenimiento == "" ){
		flag = false;
		$("#info-3-mantenimiento").append(error);
		cont--;
	}

	if( analisis == "" ){
		flag = false;
		$("#info-3-analisis").append(error);
		cont--;
	}

	// if( pdf == "" ){
	// 	flag = false;
	// 	$("#info-3-pdf").append(error);
	// 	cont--;
	// }

	if( iluminacion == ""){
		flag = false;
		$("#info-3-iluminacion").append(error);
		cont--;
	}

	status = cont == 7 ?true:false;
	return status;
}


function checkFile(e) {

    /// get list of files
    var file_list = e.target.files;

    /// go through the list of files
    for (var i = 0, file; file = file_list[i]; i++) {

        var sFileName = file.name;
        var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
        var iFileSize = file.size;
        var iConvert = (file.size / 1048576).toFixed(2);

        /// OR together the accepted extensions and NOT it. Then OR the size cond.
        /// It's easier to see this way, but just a suggestion - no requirement.
        if (!(sFileExtension === "pdf" ||
              sFileExtension === "doc" ||
              sFileExtension === "docx") || iFileSize > 10485760) { /// 10 mb
            txt = "File type : " + sFileExtension + "\n\n";
            txt += "Size: " + iConvert + " MB \n\n";
            txt += "Please make sure your file is in pdf or doc format and less than 10 MB.\n\n";
            alert(txt);
        }
    }
}

function youtube_parser(url){
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/;
    var match = url.match(regExp);
    return (match&&match[7].length==11)? match[7] : false;
}

