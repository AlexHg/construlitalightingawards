
	$(".cn").on("click",function(){
		var id = $(this).parent().data("id");
		$(".rc").attr("href","#");
		$(".rc").attr("data-id",id);
		$(".rc").attr("disabled","disabled");
	});

	$(".close-del").on("click",function(){
		var id = $(this).data("id");
		$(".del-img").attr("data-id",id);
	});

	$(".del-img").on("click",function(e){
		e.preventDefault();
		var id = $(this).data("id");
				$.ajax({
				    url: 'del-img',
				    data: {id:id},
				    type: 'POST',

				    success: function(msg) {

				    	console.log(msg);
				       $("#del-img").modal('hide');
						if(msg == true){
							swal(
							  '',
							  'Tu imagen ha sido borrada correctamente.',
							  'success'
							)
							location.reload();
						}else{
							swal(
							  '',
							  'Lo sentimos en este momento no podemos eliminar esta imagen.',
							  'error'
							)
						}
				        
				    },

				    error: function(msg) {
				    	$("#del-img").modal('hide');
				    	console.log(msg);
						swal(
						  '',
						  'Lo sentimos en este momento no podemos procesar tu solicitud, intenta mas tarde.',
						  'error'
						)
				    }
				   
				})
	});

	$(".eli").on("click",function(){
		var id = $(this).parent().data("id");
		$(".el").attr("href","delete?id="+id);
	});

	$("input[name=final]").on("change",function(){
		if ($('input[name=final]').is(':checked')) {
			var id = $(".rc").data("id");
			$("a").removeAttr('disabled');
			$(".rc").attr("href","finalize?id="+id);
		}else{
			$(".rc").attr("href","#");
			$(".rc").attr("disabled","disabled");

		}
	});
	

	var abc = 0;
 
	$('#add_more').on('click',function() {
		if($("input[type=file]").length<=5){
			$(this).parent().parent().before($("<div/>", {
				class: 'col-sm-8 col-sm-offset-2 text-center'
			}).fadeIn('slow').append($("<input/>", {
					name: 'file[]',
					type: 'file',
					id: 'file'
			}), $("<br/><br/>")));
		}else{
			swal(
			  '',
			  'Solo  puedes subir 6 imagenes máximo.',
			  'error'
			)
		}
	});

	
	$('#add_more_exist').on('click',function() {
		var long = $(".exist").length;
		if( long <= 5){
			console.log(long);

			$(this).parent().before($("<div/>", {
				class: 'col-sm-8 col-sm-offset-2 text-center'
			}).fadeIn('slow').append($("<input/>", {
					name: 'file[]',
					type: 'file',
					class: 'exist',
					id: 'fill'
			}), $("<br/><br/>")));

		}else{
			swal(
			  '',
			  'Solo  puedes subir 6 imagenes máximo.',
			  'error'
			)
		}
	});

	$('body').on('change', '#fill', function() {
		console.log("antes del if");


		var archivo = $(this).val();
		var extensiones = archivo.substring(archivo.lastIndexOf("."));
		console.log(extensiones.toLowerCase());
		if(extensiones.toLowerCase() != ".jpg" && extensiones.toLowerCase() != ".jpeg" && extensiones.toLowerCase() != ".png" && extensiones.toLowerCase() != ".mp4")
		{
			$fileupload = $(this);
			$fileupload.replaceWith($fileupload.clone(true));
			swal(
			  '',
			  'Solo puedes subir formatos .jpg, .png, .mp4.',
			  'error'
			)
		}else{
			if(extensiones.toLowerCase() == ".mp4"){
				var fil = this.files[0];
				if(fil.size < 41943040 ){
					if (this.files && this.files[0]) {

						abc += 1;

						var z = abc - 1;
						var x = $(this).parent().find('#previewimg' + z).remove();
						$(this).before("<div id='abcd" + abc + "' class='close-img'><img class='img-responsive'  id='previewimg" + abc + "' src=''/></div>");
						var reader = new FileReader();
						reader.onload = imageIsLoaded;
						reader.readAsDataURL(this.files[0]);
						$(this).hide();
						$("#abcd" + abc).append($("<img/>", {
						id: 'img',
						width: '40',
						src: 'assets/images/close.png',
						alt: 'delete'
						}).click(function() {
							$(this).parent().parent().remove();
						}));

					}
				}else{
					$fileupload = $(this);
					$fileupload.replaceWith($fileupload.clone(true));
					$(this).empty();
					swal(
					  '',
					  'Tamaño máximo para archivos de video 39 MB.',
					  'error'
					)	
				}
			}else{
				var fil = this.files[0];
				if(fil.size < 6500000 ){
					if (this.files && this.files[0]) {

						abc += 1;

						var z = abc - 1;
						var x = $(this).parent().find('#previewimg' + z).remove();
						$(this).before("<div id='abcd" + abc + "' class='close-img'><img class='img-responsive'  id='previewimg" + abc + "' src=''/></div>");
						var reader = new FileReader();
						reader.onload = imageIsLoaded;
						reader.readAsDataURL(this.files[0]);
						$(this).hide();
						$("#abcd" + abc).append($("<img/>", {
						id: 'img',
						width: '40',
						src: 'assets/images/close.png',
						alt: 'delete'
						}).click(function() {
							$(this).parent().parent().remove();
						}));

					}
				}else{
					$fileupload = $(this);
					$fileupload.replaceWith($fileupload.clone(true));
					$(this).empty();
					swal(
					  '',
					  'Tamaño máximo para imagenes 6 MB.',
					  'error'
					)	
				}
			}
		}
	});

	$('body').on('change', '#file', function() {
		// Test base64

		// end test


		var last = $("div").hasClass('lastimage');
		if($("div").hasClass('lastimage')){
			$(".lastimage").remove();
			swal(
			  '',
			  'Al guardar tu información se sustituira la imagen que has seleccionada como tu foto de perfil. ',
			  'success'
			)
			
		}
		var archivo = $(this).val();
		var extensiones = archivo.substring(archivo.lastIndexOf("."));
		if(extensiones.toLowerCase() != ".jpg" && extensiones.toLowerCase() != ".jpeg" && extensiones.toLowerCase() != ".png" && extensiones.toLowerCase() != ".mp4")
		{
			$fileupload = $(this);
			$fileupload.replaceWith($fileupload.clone(true));
			swal(
			  '',
			  'Solo puedes subir formatos .jpg, .png, .mp4.',
			  'error'
			)
		}else{
			if(extensiones.toLowerCase() == ".mp4"){
				var fil = this.files[0];
				if(fil.size < 41943040 ){
					if (this.files && this.files[0]) {

						abc += 1;

						var z = abc - 1;
						var x = $(this).parent().find('#previewimg' + z).remove();
						$(this).before("<div id='abcd" + abc + "' class='close-img'><img class='img-responsive'  id='previewimg" + abc + "' src=''/></div>");
						var reader = new FileReader();
						reader.onload = imageIsLoaded;
						reader.readAsDataURL(this.files[0]);
						$(this).hide();
						$("#abcd" + abc).append($("<img/>", {
						id: 'img',
						width: '40',
						src: 'assets/images/close.png',
						alt: 'delete'
						}).click(function() {
							$(this).parent().parent().remove();
						}));

					}
				}else{
					$fileupload = $(this);
					$fileupload.replaceWith($fileupload.clone(true));
					swal(
					  '',
					  'Tamaño máximo para archivos de video 39 MB.',
					  'error'
					)	
				}
			}else{
				var fil = this.files[0];
				if(fil.size < 6500000 ){
					if (this.files && this.files[0]) {

						abc += 1;

						var z = abc - 1;
						var x = $(this).parent().find('#previewimg' + z).remove();
						$(this).before("<div id='abcd" + abc + "' class='close-img'><img class='img-responsive'  id='previewimg" + abc + "' src=''/></div>");
						var reader = new FileReader();
						
						
						//add input hide with base64
					      reader.onload = function (e) {
					      	$("#abcd" + abc).append('<input type="hidden" value="'+e.target.result+'" name="base64">');
					      	$('#previewimg' + abc).attr('src', e.target.result);
					      }
				//reader.onload = imageIsLoaded;

						reader.readAsDataURL(this.files[0]);
						$(this).hide();
						$("#abcd" + abc).append($("<img/>", {
						id: 'img',
						width: '40',
						src: 'assets/images/close.png',
						alt: 'delete'
						}).click(function() {
							$(this).parent().parent().remove();
						}));


					}
				}else{
					$fileupload = $(this);
					$fileupload.replaceWith($fileupload.clone(true));
					swal(
					  '',
					  'Tamaño máximo para imagenes 6 MB.',
					  'error'
					)	
				}
			}
		}
	});


	$('body').on('change', '#ex', function() {
		var last = $("div").hasClass('lastimage');
		if($("div").hasClass('lastimage')){
			$(".lastimage").remove();
			swal(
			  '',
			  'Al guardar tu información se sustituira la imagen que has seleccionada como tu foto de perfil. ',
			  'success'
			)
		}
		var archivo = $(this).val();
		var extensiones = archivo.substring(archivo.lastIndexOf("."));
		console.log(extensiones.toLowerCase());
		if(extensiones.toLowerCase() != ".jpg" && extensiones.toLowerCase() != ".jpeg" && extensiones.toLowerCase() != ".png" && extensiones.toLowerCase() != ".mp4")
		{
			$fileupload = $(this);
			$fileupload.replaceWith($fileupload.clone(true));
			swal(
			  '',
			  'Solo puedes subir formatos .jpg, .png, .mp4.',
			  'error'
			)
		}else{
				var fil = this.files[0];
				if(fil.size < 6500000 ){
					if (this.files && this.files[0]) {

						abc += 1;

						var z = abc - 1;
						var x = $(this).parent().find('#previewimg' + z).remove();
						$(this).before("<div id='abcd" + abc + "' class='close-img'><img class='img-responsive'  id='previewimg" + abc + "' src=''/></div>");
						var reader = new FileReader();
						reader.onload = imageIsLoaded;
						reader.readAsDataURL(this.files[0]);
						//$(this).hide();


					}
				}else{
					$fileupload = $(this);
					$fileupload.replaceWith($fileupload.clone(true));
					swal(
					  '',
					  'Tamaño máximo para imagenes 6 MB.',
					  'error'
					)	
				}
			}
	});

	function imageIsLoaded(e) {
	$('#previewimg' + abc).attr('src', e.target.result);
	};

$('#new-project').on('submit',function(e) {
	e.preventDefault();
	$form = $(this);
	$button = $(this).find("button");
	/*var name = $(":file").val();
	if (!name) {
		alert("First Image Must Be Selected");
	}*/
	if(typeof($("input[name=prorealizados]:checked").val()) == "undefined"){
		swal(
		  '',
		  'Selecciona una categoria de tu proyecto.',
		  'error'
		)
	}
	if(typeof($("input[name=nomproyecto]").val()) == "undefined" && $("input[name=nomproyecto]").val() =="" ){
		swal(
		  '',
		  'Por favor completa el nombre de tu proyecto realizado.',
		  'error'
		)
	}
	if(typeof($("input[name=usoinmueble]").val()) == "undefined" && $("input[name=usoinmueble]").val() =="" ){
		swal(
		  '',
		  'Por favor completa el nombre del uso del inmueble.',
		  'error'
		)
	}
	if(typeof($("input[name=tipobra]:checked").val()) == "undefined"){
		swal(
		  '',
		  'Selecciona el tipo de obra.',
		  'error'
		)
	}
	if(typeof($("input[name=finalobra]").val()) == "undefined" && $("input[name=finalobra]").val() =="" ){
		swal(
		  '',
		  'Completa el diseñador de iluminación.',
		  'error'
		)
	}
	if(typeof($("input[name=disenadorilumi]").val()) == "undefined" && $("input[name=disenadorilumi]").val() =="" ){
		swal(
		  '',
		  'Completa la dirección del proyecto.',
		  'error'
		)
	}
	if(typeof($("input[name=dirproyecto]").val()) == "undefined" && $("input[name=dirproyecto]").val() =="" ){
		swal(
		  '',
		  'Completa los nombres de los colaboradores.',
		  'error'
		)
	}
	if(typeof($("input[name=colaboradores]").val()) == "undefined" && $("input[name=colaboradores]").val() =="" ){
		swal(
		  '',
		  'Completa proyecto Arq. por.',
		  'error'
		)
	}
	if(typeof($("input[name=proyectoarq]").val()) == "undefined" && $("input[name=proyectoarq]").val() =="" ){
		swal(
		  '',
		  'Por favor completa el nombre de tu proyecto realizado.',
		  'error'
		)
	}
	if(typeof($("input[name=fotografo]").val()) == "undefined" && $("input[name=fotografo]").val() =="" ){
		swal(
		  '',
		  'Completa el nombre del fotógrafo.',
		  'error'
		)
	}
	if(typeof($("textarea[name=desc_proyecto]").val()) == "undefined" && $("textarea[name=desc_proyecto]").val() =="" ){
		swal(
		  '',
		  'Completa el nombre del fotógrafo.',
		  'error'
		)
	}

	// test for
	//var formData = new FormData();
	$.each($("input[type=file]"), function(i, obj) {
		    $.each(obj.files,function(j, file){
		    	console.log(file);
		        //formData.append('photo['+i+']', file);
		    })
	}); 
	// end test
	if( typeof($("input[name=prorealizados]:checked").val()) != "undefined" && 
		typeof($("input[name=nomproyecto]").val()) != "undefined" && $("input[name=nomproyecto]").val() != "" &&
		typeof($("input[name=usoinmueble]").val()) != "undefined" && $("input[name=usoinmueble]").val() != "" &&
		typeof($("input[name=tipobra]:checked").val()) != "undefined" &&
		typeof($("input[name=finalobra]").val()) != "undefined" && $("input[name=finalobra]").val() != "" &&
		typeof($("input[name=disenadorilumi]").val()) != "undefined" && $("input[name=disenadorilumi]").val() != "" &&
		typeof($("input[name=dirproyecto]").val()) != "undefined" && $("input[name=dirproyecto]").val() != "" &&
		typeof($("input[name=colaboradores]").val()) != "undefined" && $("input[name=colaboradores]").val() != "" &&
		typeof($("input[name=proyectoarq]").val()) != "undefined" && $("input[name=proyectoarq]").val() != "" &&
		typeof($("input[name=fotografo]").val()) != "undefined" && $("input[name=fotografo]").val() != "" &&
		typeof($("textarea[name=desc_proyecto]").val()) != "undefined" && $("textarea[name=desc_proyecto]").val() != "" &&
		($(".exist").length > 0 ||  ($("input[type=file]").length > 1 && $("input[type=file]").length <=7) || $(":file").val() != false || $(":file").val() != 'undefined' )
		
		){

			var formData = new FormData();
				categoria = $("input[name=prorealizados]:checked").val();
				nombre = $("input[name=nomproyecto]").val();
				uso = $("input[name=usoinmueble]").val();
				tipoinm = $("input[name=tipobra]:checked").val();
				final = $("input[name=finalobra]").val();
				disenador = $("input[name=disenadorilumi]").val();
				direccion = $("input[name=dirproyecto]").val();
				colaboradores = $("input[name=colaboradores]").val();
				proyecto = $("input[name=proyectoarq]").val();
				fotografo = $("input[name=fotografo]").val();
				descripcion = $("textarea[name=desc_proyecto]").val();
				video = $("input[name=url]").val();

				formData.append("prorealizados",categoria);
				formData.append("nomproyecto",nombre);
				formData.append("usoinmueble",uso);
				formData.append("tipobra",tipoinm);
				formData.append("finalobra",final);
				formData.append("disenadorilumi",disenador);
				formData.append("dirproyecto",direccion);
				formData.append("colaboradores",colaboradores);
				formData.append("proyectoarq",proyecto);
				formData.append("fotografo",fotografo);
				formData.append("descripcion",descripcion);
				formData.append("video",video);

				$.each($("input[type=file]"), function(i, obj) {
				    $.each(obj.files,function(j, file){
				        formData.append('photo['+i+']', file);
				    })
				});

				//for base 64 testing
				/*$.each($("input[name='base64']"), function(i, obj) {
				    var valor = $(obj).val();
				    formData.append('base64['+i+']', valor);
				});*/

				/////////////
		// Function animation preloader 
					function progress(e){
						var progressBar = document.getElementById("progress");
						if(e.lengthComputable){
							
							$(".upload-img").show();
							progressBar.max = e.total;
							progressBar.value = e.loaded;
							
							var current = e.loaded / e.total; 
							var Percentage = current * 100;
							
							
							
							var percentReal = parseInt(Percentage) + ' %';
							$("#progress").attr('data-original-title', percentReal);				
							$('.tool').tooltip({placement: 'bottom',trigger: 'manual'}).tooltip('show');
							
							if(Percentage >= 100)
							{
								$("#progress").attr('data-original-title', percentReal);
								$('.tool').tooltip({placement: 'bottom',trigger: 'manual'}).tooltip('show');
								$('#progress-message').text('Se completo el proceso');
								//alert('Se ha agregado la imagen satisfactoriamente.');
								//location.reload();						
							}
							else{
								$('#progress-message').text('Cargando ...');
							}
						}  
					}
				/////////////	
				$.ajax({
				    url: $form.attr("action"),
				    data: formData,
				    type: 'POST',
				    contentType: false,
				    processData: false,
					xhr: function() {
								var myXhr = $.ajaxSettings.xhr();
								if(myXhr.upload){
									myXhr.upload.addEventListener('progress',progress, false);
								}
								return myXhr;
					},
					beforeSend: function( xhr ) {
						$('#progress-message').empty();
						$("#progress").show()
						$button.prop('disabled',true);
					},

				    success: function(msg) {

				    	console.log(msg);
				       
						if(msg.status == "success"){
							window.location.href = 'upload-project-confirm?last='+msg.last;
						}else if(msg.status == "error"){
							swal(
							  '',
							  msg.message,
							  'error'
							)
						}
				        
				    },

				    error: function(msg) {
				    	$button.prop('disabled',false);
				    	console.log(msg);
						swal(
						  '',
						  'Lo sentimos en este momento no podemos procesar tu solicitud, intenta mas tarde.',
						  'error'
						)
				    }
				   
				})	

	}else{
			swal(
			  '',
			  'Por favor completa todos los campos, incluyendo imagenes de tu proyecto.',
			  'error'
			)
	}


});




        
   
