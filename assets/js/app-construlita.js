	$(function(){

		/* Valida el tamaño maximo de un archivo adjunto */
		$('#avatar').change(function (){

			 var sizeByte = this.files[0].size;
			 var siezekiloByte = parseInt(sizeByte / 1024);
			 var siezeMegaByte = siezekiloByte / 1024;
			 console.log(siezeMegaByte);
			 var fil = this.files[0];
			 
			var archivo = $("#avatar").val();
			var extensiones = archivo.substring(archivo.lastIndexOf("."));
			if(extensiones != ".jpg" && extensiones != ".JPG" && extensiones != ".png" && extensiones != ".jpeg")
			{
				$(this).val('');
			    alert("El archivo de tipo " + extensiones + " no es válido");
			}else{
				 if( siezeMegaByte > 10  ){
				     alert('El tamaño supera el limite permitido');
				     $(this).val('');
				 }
			}

		});

		$('.save-inside').on('click',function(){
	
			$(this).prop('disabled',true);
			$(this).find('span').show();
			$('#upload-img-profile').empty();
			$("#upload-img-profile").text("Espera un momento estamos guardando tu perfil");
			$( "#update" ).submit();
		});

		$('.action').on('click',function(e){
			e.preventDefault();
			$act = $(this).data("validate");
			$action = $(this).data('action');
			var $next = $(this).data('next');
			var $actual = $(this).parent().parent().parent().attr('class');
			var $button =  $(this);

			if($action == 'prev'){
				display(`.${$next}`,`.${$actual}`);
			}
			switch($act){
				case 'first':
					validateStepOne($next,$actual);
				break;
				case 'second':
					validateStepTwo($button);
				break;
			}
			//display(`.${$next}`,`.${$actual}`);

		});

		function display($show,$hide){

			$($show).show();
			$($hide).hide();

		}

		$('#ancla').on('click',function(){
			document.getElementById('construlita').style.height = "0%";
		});

 		$(".showcase").on('click',function(e){
			
			var label = $(this).data("copy");
			var ruta = $(this).data("ruta");
			$(".lab").text(label);
			console.log(label);
			console.log(ruta);
		    $.ajax({url: "get-categorias", type: 'POST', data: { link : ruta },
		    		success: function(result){
		        		
		        	var contain = $(".carousel-inner");
			    		contain.empty();

				    	for(var i=0; i < result.length;i++){
				    		
				    		if(i == 0){
				    			var div = "<div class='item active' ><div class='row'><div class='col-md-10 col-md-offset-1'><img src='"+ruta+"/"+result[i]+"' class='img-responsive center-h' alt='Chania'> </div></div></div>";

				    		}else{
				    			var div = "<div class='item' ><div class='row'><div class='col-md-10 col-md-offset-1'><img src='"+ruta+"/"+result[i]+"' class='img-responsive center-h' alt='Chania'> </div></div></div>";			    			
				    		}
				    		contain.append(div);
				    	}
		    		},
		    		error: function(){
		    			console.log("algo salio mal mientras se obtenian las imagenes.");
		    		}
			});
		});	
		$(".categories").on('click',function(e){
			e.preventDefault();
			$('body').find('.press-r').addClass('side-1');
			$('body').find('.press-r').removeClass('press-r');
			var ruta = $(this).data("link");
			$(this).find('.side-1').addClass('press-r');
			$(this).find('.side-1').removeClass('side-1');
		    $.ajax({url: "get-categorias", type: 'POST', data: { link : ruta },
		    		success: function(result){
		        		
		        	var contain = $(".carousel-inner");
			    		contain.empty();

				    	for(var i=0; i < result.length;i++){
				    		
				    		if(i == 0){
				    			var div = "<div class='item active' ><div class='row'><div class='col-md-10 col-md-offset-1'><img src='"+ruta+"/"+result[i]+"' class='img-responsive center-h' alt='Chania'> </div></div></div>";

				    		}else{
				    			var div = "<div class='item' ><div class='row'><div class='col-md-10 col-md-offset-1'><img src='"+ruta+"/"+result[i]+"' class='img-responsive center-h' alt='Chania'> </div></div></div>";			    			
				    		}
				    		contain.append(div);
				    	}
		    		},
		    		error: function(){
		    			console.log("algo salio mal mientras se obtenian las imagenes.");
		    		}
			});
		});	

		$('.menu-show').on('click',function(){
			console.log("abcd menu");
			document.getElementById("construlita").style.height = "100vh";
		});

		/* Open */
		$('.closebtn').on('click',function(){
			document.getElementById("construlita").style.height = "0%";
		});

		/*obtenerResolucion();
		setMenu();*/


	  $("#construlita-slider").owlCarousel({
	 
	      navigation : false, // Show next and prev buttons
	      slideSpeed : 3000,
	      autoPlay: 5000,
		  autoplayTimeout:5000,
		  autoplayHoverPause:false,
	      paginationSpeed : 2000,
	      singleItem:true
	 
	      // "singleItem:true" is a shortcut for:
	      // items : 1, 
	      // itemsDesktop : false,
	      // itemsDesktopSmall : false,
	      // itemsTablet: false,
	      // itemsMobile : false
	 
	  });
	  	$("#progress").hide();
		$(".step-2").hide();

		$("input[name=estudios]").on('change',function(){
		
			if($("input[name=estudios]:checked").val() == "Otro"){
				$("input[name=otro]").prop('disabled',false);
				$("input[name=otro]").focus();
			}
		});

		$('.save').on('click',function(e){
			console.log("click en sin registro");
			$("#progress").hide();
			$button = $(this);
			e.preventDefault();
			var dataNow = $(this).data('now');

				if(dataNow == "save-info"){
					
					$(".email .red").empty();
					$(".name .red").empty();
					$(".lastname .red").empty();
					$(".pass1 .red").empty();
					$(".pass2 .red").empty();


					if( $('input[name=name]').val() == "" ){
						jQuery(".name").append("<div class='red'>Campo requerido.</div>");
					}
					if( $('input[name=lastname]').val() == "" ){
						jQuery(".lastname").append("<div class='red'>Campo requerido.</div>");
					}
					if( $('input[name=email]').val() == "" ){
						jQuery(".email").append("<div class='red'>Campo requerido.</div>");
					}
					if( $('input[name=password1]').val() == "" ){
						jQuery(".pass1").append("<div class='red'>Campo requerido.</div>");
					}else if( $('input[name=password1]').val() != $('input[name=password2]').val() ){
						jQuery(".pass1").append("<div class='red'>Estos campos deben ser identicos.</div>");
						jQuery(".pass2").append("<div class='red'>Estos campos deben ser identicos.</div>");
					}
					if( $('input[name=password2]').val() == "" ){
						jQuery(".pass2").append("<div class='red'>Campo requerido.</div>");
					}

					if( $('input[name=name]').val() != "" && $('input[name=lastname]').val() != "" && $('input[name=password1]').val() != "" && $('input[name=password2]').val() ){
						if($('input[name=password1]').val() == $('input[name=password2]').val()){
							var p1 = $('input[name=password1]').val();
							var p2 = $('input[name=password2]').val();
							if(p1.length > 7 && p2.length > 7 ){
								$button.prop('disabled',true);
								createUser();
							}else{
								$button.prop('disabled',true);
								jQuery(".pass1").append("<div class='red'>Mínimo 8 carácteres.</div>");
								jQuery(".pass2").append("<div class='red'>Mínimo 8 carácteres.</div>");
							}
						}
					}
					

				} else if( dataNow == "step-2"){
					
					var imagen = $('#temporally');
						imagen.attr('src','assets/images/'+dataNow+'.png');
						var id = $('body').data("id");
						if( typeof(id) != "undefined"){
							var step1 = $( "body" ).hasClass( ".step-1" );
							if(step1 != true ){

								$(".situacion .red").empty();
								$(".estudios .red").empty();
								$(".business .red").empty();
								$(".group .red").empty();
								$(".calle .red").empty();
								$(".colonia .red").empty();
								$(".municipio .red").empty();
								$(".estado .red").empty();
								$(".pais .red").empty();
								$(".telefono .red").empty();
								$(".msg-imagen .red").empty();
								

								if( typeof($("input[name=situacion]:checked").val()) == "undefined" ){
									jQuery(".situacion").append("<div class='red'>Campo requerido.</div>");
								}
								if( $("input[name=estudios]:checked").val() == "Otro" ){
									if( $('input[name=otro]').val() == "" ){
										jQuery(".estudios").append("<div class='red'>Escribe una profesión.</div>");
										$("html, body").animate({ scrollTop: 0 }, "slow");
									}
								}else if( typeof($("input[name=estudios]:checked").val()) == "undefined" ){
									jQuery(".estudios").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								
								if( $('input[name=business]').val() == "" ){
									jQuery(".business").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if( $('input[name=group]').val() == "" ){
									jQuery(".group").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if( $('input[name=calle]').val() == "" ){
									jQuery(".calle").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if( $('input[name=colonia]').val() == "" ){
									jQuery(".colonia").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if( $('input[name=municipio]').val() == "" ){
									jQuery(".municipio").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if( $('input[name=estado]').val() == "" ){
									jQuery(".estado").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if( $('input[name=pais]').val() == "" ){
									jQuery(".pais").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if( $('input[name=telefono]').val() == "" ){
									jQuery(".telefono").append("<div class='red'>Campo requerido.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if( typeof($('input[type=file]')[0].files[0]) == "undefined" ){
									jQuery(".msg-imagen").append("<div class='red'>Imagen de perfil requerida.</div>");
									$("html, body").animate({ scrollTop: 0 }, "slow");
								}
								if(typeof($("input[name=situacion]:checked").val()) != "undefined" && typeof($("input[name=estudios]:checked").val()) != "undefined" && $('input[name=business]').val() != "" && $('input[name=group]').val() != "" && $('input[name=calle]').val() != "" && $('input[name=colonia]').val() != "" && $('input[name=municipio]').val() != "" && $('input[name=estado]').val() != "" && $('input[name=pais]').val() != "" && $('input[name=telefono]').val() != "" && typeof($('input[type=file]')[0].files[0]) != "undefined" ){
									// Serializamos la información
									var formData = new FormData();
										situacion = $("input[name=situacion]:checked").val();

										formData.append("token",$("body").data("id"));
										

										if($("input[name=estudios]:checked").val() == "Otro"){
											formData.append("estudios",$('input[name=otro]').val());
										}else{
											formData.append("estudios",$("input[name=estudios]:checked").val());
										}
										formData.append("situacion",$("input[name=situacion]:checked").val());
										formData.append("business",$('input[name=business]').val());
										formData.append("group",$('input[name=group]').val());
										formData.append("calle",$('input[name=calle]').val());
										formData.append("colonia",$('input[name=colonia]').val());
										formData.append("municipio",$('input[name=municipio]').val());
										formData.append("estado",$('input[name=estado]').val());
										formData.append("pais",$('input[name=pais]').val());
										formData.append("telefono",$('input[name=telefono]').val());

										formData.append('img_perfil', $('input[type=file]')[0].files[0]); 
										
										$.ajax({
										    url: 'profile',
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
											    	$button.prop('disabled',false);
											       
													if(msg == 1){
														swal(
														  '',
														  'Se ha completado tu información personal puedes completar tu información de tus proyectos.',
														  'success'
														)
														/*$(".step-2").show();
														$(".step-1-1").hide();
														$("html, body").animate({ scrollTop: 0 }, "slow");*/
														window.location.href = 'login';
													}
											        
											    },

											    error: function(msg) {
													swal(
													  '',
													  'Lo sentimos en este momento no podemos procesar tu solicitud, intenta mas tarde.',
													  'error'
													)
											    }
										   
										})
						    }
							}
						}else{
							swal(
							  '',
							  'Para seguir guardado información acerca de ti primero debes completar tus datos de nombre, apellido, correo y contraseña, esto te permitira iniciar sesión despues.',
							  'error'
							)
							
							$("html, body").animate({ scrollTop: 0 }, "slow");
									}
							} else if(dataNow == "step-3"){
			


						}





	           $('.fileP').on('change',function(){

				var imagen = document.getElementById('avatarP');
				previewP(imagen);

	                function previewP(fileP){
	                    if (fileP.files && fileP.files[0]) {
	                    	//console.log(file.files[0].type);
	                        if(fileP.files[0].type == "image/jpeg" || fileP.files[0].type == "image/png")
	                        {
	                        	
	                            var reader = new FileReader();
	                            
	                            reader.onload = function (e) {
	                            var container = $('.previewP');
	                            	container.empty();
	                            

	                          
	                            var img = document.createElement('img');
	                                img.setAttribute('class','img-responsive');
	                                img.setAttribute('src',e.target.result);
	               
	                                jQuery(container).append(img);                    

	                            }
	                        }
	                        else{
	                            swal(
	                              '',
	                              'Imagen inválida, extensíon no permitida',
	                              'error'
	                            )                   
	                            
	                        }
	                        reader.readAsDataURL(fileP.files[0]);
	                        
	                    }
	                    else{
	                        swal(
	                          '',
	                          'Por favor selecciona un archivo válido.',
	                          'error'
	                        )               
	                        
	                    }           
	                }


		});





		function createUser(){
			
		 	var username = $('input[name=name]');
		 	var lastname = $('input[name=lastname]');
		 	var email = $('input[name=email]');
		 	var password1 = $('input[name=password1]');
		 	var password2 = $('input[name=password2]');
		 	if(typeof(username,lastname,email,password1,password2) != 'undefined' ){
				$.ajax({
					url: 'create',
					type: "POST",
					data: { name:username.val(), 
							lastname:lastname.val(), 
							email:email.val(), 
							password:password1.val(),
							password2:password2.val() 
						},

					success: function(result)
					{
						$button.prop('disabled','false');
						
						var info = JSON.parse(result);
						
						if(info.status == "error"){
							$(".email .red").empty();
							$(".name .red").empty();
							$(".lastname .red").empty();
							$(".pass1 .red").empty();
							$(".pass2 .red").empty();
							
							switch(info.type){
								case "email":
									jQuery(".email").append("<div class='red'>"+info.message+"</div>");
								break;
								case "name":
									jQuery(".name").append("<div class='red'>"+info.message+"</div>");
								break;
								case "lastname":
									jQuery(".lastname").append("<div class='red'>"+info.message+"</div>");
								break;
								case "password":
									jQuery(".pass1").append("<div class='red'>"+info.message+"</div>");
									jQuery(".pass2").append("<div class='red'>"+info.message+"</div>");
								break;
								case "temporally":
									swal(
									  '',
									  info.message,
									  'error'
									)
								break;
							}

						}else if(info.status == "success"){
							$("body").attr('data-id',info.token);
							$(".step-1").remove();
							swal(
							  '',
							  info.message,
							  'success'
							)
						}
						$button.prop('disabled',true);

					},
					error: function(result)
					{
						swal(
						  '',
						  'Ha ocurrido un error, intenta nuevamente.',
						  'error'
						)	
					}
				});	
		 	}
		}



			
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

		$('.file').on('change',function(){

				var imagen = document.getElementById('avatar');
				preview(imagen);

	                function preview(file){
	                    if (file.files && file.files[0]) {
	                    	//console.log(file.files[0].type);
	                        if(file.files[0].type == "image/jpeg" || file.files[0].type == "image/png")
	                        {
	                        	
	                            var reader = new FileReader();
	                            
	                            reader.onload = function (e) {
	                            var container = $('.preview');
	                            	container.empty();
	                            

	                          
	                            var img = document.createElement('img');
	                                img.setAttribute('class','img-responsive');
	                                img.setAttribute('src',e.target.result);
	               
	                                jQuery(container).append(img);                    

	                            }
	                        }
	                        else{
	                            swal(
	                              '',
	                              'Imagen inválida, extensíon no permitida',
	                              'error'
	                            )                   
	                            
	                        }
	                        reader.readAsDataURL(file.files[0]);
	                        
	                    }
	                    else{
	                        swal(
	                          '',
	                          'Por favor selecciona un archivo válido.',
	                          'error'
	                        )               
	                        
	                    }           
	                }


		});




			
	});
	function validate_email( email ) {
		expr = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
		if ( !expr.test(email) ){
			return false;
		}
		else{
			//validarEmailDatabase(email);
			return true;
		}
	}	
	function validate_email_database(email,$next,$actual){

		$.ajax({
			url: 'get-email',
			type: "POST",
			data: {
					email: email
				},
			dataType: "html",

			success: function(result)
			{
				
				$parse = JSON.parse(result);
				if($parse.Total == 0){
					display(`.${$next}`,`.${$actual}`);
				}else{
					swal(
					  'Ups!',
					  'Tu correo ya esta registrado, intenta con otro correo distinto',
					  'error'
					)
				}

			},
			error: function(result)
			{
					swal(
					  'Ups!',
					  'Solicitud no procesada, intenta nuevamente.',
					  'error'
					)
			}

		});						  
	}


	function validateStepOne($next,$actual)
	{

		$(".email .red").empty();
		$(".name .red").empty();
		$(".lastname .red").empty();
		$(".pass1 .red").empty();
		$(".pass2 .red").empty();


		if( $('input[name=name]').val() == "" ){
			jQuery(".name").append("<div class='red'>Campo requerido.</div>");
		}
		if( $('input[name=lastname]').val() == "" ){
			jQuery(".lastname").append("<div class='red'>Campo requerido.</div>");
		}
		if( $('input[name=email]').val() == "" ){
			jQuery(".email").append("<div class='red'>Campo requerido.</div>");
		}
		if( $('input[name=password1]').val() == "" ){
			jQuery(".pass1").append("<div class='red'>Campo requerido.</div>");
		}else if( $('input[name=password1]').val() != $('input[name=password2]').val() ){
			jQuery(".pass1").append("<div class='red'>Estos campos deben ser identicos.</div>");
			jQuery(".pass2").append("<div class='red'>Estos campos deben ser identicos.</div>");
		}
		if( $('input[name=password2]').val() == "" ){
			jQuery(".pass2").append("<div class='red'>Campo requerido.</div>");
		}

		if( $('input[name=name]').val() != "" && $('input[name=lastname]').val() != "" && $('input[name=password1]').val() != "" && $('input[name=password2]').val() ){
			if($('input[name=password1]').val() == $('input[name=password2]').val()){
				var p1 = $('input[name=password1]').val();
				var p2 = $('input[name=password2]').val();
				if(p1.length > 7 && p2.length > 7 ){
					$email = $('input[name=email]').val();
					$regExp = validate_email( $email );

					if( $regExp == true ){
						validate_email_database($email,$next,$actual);
					}else{
						jQuery(".email").append("<div class='red'>Escribe un correo válido.</div>");
					}

				}else{
					//$button.prop('disabled',true);
					jQuery(".pass1").append("<div class='red'>Mínimo 8 carácteres.</div>");
					jQuery(".pass2").append("<div class='red'>Mínimo 8 carácteres.</div>");
				}
			}
		}
	}

	function validateStepTwo($button)
	{
		$(".situacion .red").empty();
		$(".estudios .red").empty();
		$(".business .red").empty();
		$(".group .red").empty();
		$(".calle .red").empty();
		$(".colonia .red").empty();
		$(".municipio .red").empty();
		$(".estado .red").empty();
		$(".pais .red").empty();
		$(".telefono .red").empty();
		$(".msg-imagen .red").empty();
		

		if( typeof($("input[name=situacion]:checked").val()) == "undefined" ){
			jQuery(".situacion").append("<div class='red'>Campo requerido.</div>");
		}
		if( $("input[name=estudios]:checked").val() == "Otro" ){
			if( $('input[name=otro]').val() == "" ){
				jQuery(".estudios").append("<div class='red'>Escribe una profesión.</div>");
				$("html, body").animate({ scrollTop: 0 }, "fast");
			}
		}else if( typeof($("input[name=estudios]:checked").val()) == "undefined" ){
			jQuery(".estudios").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		
		if( $('input[name=business]').val() == "" ){
			jQuery(".business").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if( $('input[name=group]').val() == "" ){
			jQuery(".group").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if( $('input[name=calle]').val() == "" ){
			jQuery(".calle").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if( $('input[name=colonia]').val() == "" ){
			jQuery(".colonia").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if( $('input[name=municipio]').val() == "" ){
			jQuery(".municipio").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if( $('input[name=estado]').val() == "" ){
			jQuery(".estado").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if( $('input[name=pais]').val() == "" ){
			jQuery(".pais").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if( $('input[name=telefono]').val() == "" ){
			jQuery(".telefono").append("<div class='red'>Campo requerido.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if( $('input[name=img-profile-user]').val() == "" ){
			jQuery(".msg-imagen").append("<div class='red'>Imagen de perfil requerida.</div>");
			$("html, body").animate({ scrollTop: 0 }, "fast");
		}
		if(typeof($("input[name=situacion]:checked").val()) != "undefined" && typeof($("input[name=estudios]:checked").val()) != "undefined" && $('input[name=business]').val() != "" && $('input[name=group]').val() != "" && $('input[name=calle]').val() != "" && $('input[name=colonia]').val() != "" && $('input[name=municipio]').val() != "" && $('input[name=estado]').val() != "" && $('input[name=pais]').val() != "" && $('input[name=telefono]').val() != "" && $('input[name=img-profile-user]').val() != "" ){
			// Serializamos la información

			var formData = new FormData();
				situacion = $("input[name=situacion]:checked").val();

				formData.append("token",$("body").data("id"));
				

				if($("input[name=estudios]:checked").val() == "Otro"){
					formData.append("estudios",$('input[name=otro]').val());
				}else{
					formData.append("estudios",$("input[name=estudios]:checked").val());
				}
				formData.append("name",$('input[name=name]').val());
				formData.append("lastname",$('input[name=lastname]').val());
				formData.append("email",$('input[name=email]').val());
				formData.append("password",$('input[name=password1]').val());
				formData.append("password2",$('input[name=password2]').val());

				formData.append("situacion",$("input[name=situacion]:checked").val());
				formData.append("business",$('input[name=business]').val());
				formData.append("group",$('input[name=group]').val());
				formData.append("calle",$('input[name=calle]').val());
				formData.append("colonia",$('input[name=colonia]').val());
				formData.append("municipio",$('input[name=municipio]').val());
				formData.append("estado",$('input[name=estado]').val());
				formData.append("pais",$('input[name=pais]').val());
				formData.append("telefono",$('input[name=telefono]').val());

				// formData.append('img_perfil', $('input[type=file]')[0].files[0]);
				formData.append('imagen', $('input[name=img-profile-user]').val());

					$.ajax({
					    url: 'create',
					    data: formData,
					    type: 'POST',
					    contentType: false,
					    processData: false,

							beforeSend: function( xhr ) {
								$(".glyphicon-refresh-animate").show();
								$button.prop("disabled",true);
								$('#upload-img-profile').empty();
								$("#upload-img-profile").text("Espera un momento estamos guardando tu perfil");
								//$button.prop('disabled',true);
							},

						    success: function(msg) {
						    	// $button.prop('disabled',false);
						       console.log(msg);
								if(msg == true){
									swal(
									  '',
									  'Se ha completado tu información personal puedes completar tu información de tus proyectos.',
									  'success'
									)
									/*$(".step-2").show();
									$(".step-1-1").hide();
									$("html, body").animate({ scrollTop: 0 }, "slow");*/
									window.location.href = 'login';
								}else{
									swal(
									  '',
									  'Ahora intenta inciar sesión.',
									  'error'
									)
								}
						        
						    },

						    error: function(msg) {
						    	console.log(msg);
						    	$button.prop("disabled",false);
						    	$('#upload-img-profile').empty();
								swal(
								  '',
								  'Lo sentimos en este momento no podemos procesar tu solicitud, intenta mas tarde.',
								  'error'
								)
						    }
					   
					})	
		}
	}


	function addSpinner() {
	    if (!$(this).eq(0).hasClass("spinning")) {
	        $(this).eq(0).html('<span class="glyphicon glyphicon-refresh spinning"></span>');
	    }
	}

		//Set item active menu
		// function setMenu(){
		// 	var pathname = window.location.pathname;
			
		// 	switch(pathname){
		// 		case '/pitaya2/': 
		// 			$("#portafolio").css('text-decoration', 'underline');			
		// 		break;
		// 		case '/pitaya2/foto-documental': 
		// 			$("#foto-documental").css('text-decoration', 'underline');			
		// 		break;
		// 		case '/pitaya2/blog': 
		// 			$("#blogg").css('text-decoration', 'underline');				
		// 		break;	
		// 		case '/pitaya2/biografia': 
		// 			$("#biografia").css('text-decoration', 'underline');				
		// 		break;	
		// 		case '/pitaya2/contacto': 
		// 			$("#contacto").css('text-decoration', 'underline');				
		// 		break;				
		// 	}

		// }

	// function obtenerResolucion(){


	// 	var w = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;
		
	// 	var height = $('nav').height();
	// 	$('body').css('padding-top', height);

	// 	if (w < 768 ) {			

	// 		$("nav").removeClass("navbar-fixed-top");
	// 		$("nav").addClass("navbar-fixed-bottom");

	// 	}

	// }
});


