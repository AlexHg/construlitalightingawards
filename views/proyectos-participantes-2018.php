<div class="container-fluid">
	<div class="row title-imagen" style="background-image: url('assets/images/proyectos-participantes.png');"></div>
	<div class="row">
		<div class="col-sm-12 col-lg-8 col-lg-offset-2 p-fis">
			<div class="row">
<!-- 				<a href="galeria-de-proyectos?cat=2">
					<div class="col-sm-4 bgcomercial">
						<div class="bgtitle">
							<p>ESPACIOS COMERCIALES Y DE HOSPITALIDAD</p>
						</div>
					</div>					
				</a> -->
				<div class="col-sm-4">
					<a href="galeria-de-proyectos?cat=6">
						<div class="row">
							<div class="col-sm-12 bghospitalidad">
								<div class="bgtitle">
									<p>ESPACIOS DE HOSPITALIDAD</p>
								</div>
							</div>
						</div>						
					</a>
					<a href="galeria-de-proyectos?cat=2">
						<div class="row">
							<div class="col-sm-12 bgcomercial">
								<div class="bgtitle">
									<p>ESPACIOS COMERCIALES</p>
								</div>
							</div>
						</div>						
					</a>
				</div>

				<div class="col-sm-4">
					<a href="galeria-de-proyectos?cat=1">
						<div class="row">
							<div class="col-sm-12 bgespacio-vivienda">
								<div class="bgtitle">
									<p>ESPACIOS DE VIVIENDA</p>
								</div>
							</div>
						</div>						
					</a>
					<a href="galeria-de-proyectos?cat=4">
						<div class="row">
							<div class="col-sm-12 bgespacio-publicos">
								<div class="bgtitle">
									<p>ESPACIOS PÚBLICOS</p>
								</div>
							</div>
						</div>						
					</a>
				</div>
				<div class="col-sm-4">
					<a href="galeria-de-proyectos?cat=3">
						<div class="row">
							<div class="col-sm-12 bgespacio-productivos">
								<div class="bgtitle">
									<p>ESPACIOS PRODUCTIVOS Y EDUCATIVOS</p>
								</div>
							</div>
						</div>						
					</a>
					<a href="galeria-de-proyectos?cat=5">
						<div class="row">
							<div class="col-sm-12 bgconceptos">
								<div class="bgtitle">
									<p>CONCEPTOS</p>
								</div>
							</div>
						</div>						
					</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <a href="https://e-la.infoexpo.com.mx/2018/ae/web/codigo/BZMH11586" target="_blank">
  	<img class="modal-content" src="assets/images/cla18-popup-registro-ela.png" id="img01" alt="Sé parte de Expo Lighting America 2018">
  </a>
</div>
<style type="text/css">
/* Style the Image Used to Trigger the Modal */
#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 1000px;
}


/* Add Animation - Zoom in the Modal */
.modal-content, #caption { 
    animation-name: zoom;
    animation-duration: 0.6s;
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: white;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
    opacity: 1;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>
<script type="text/javascript">
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var captionText = document.getElementById("caption");
    modal.style.display = "block";

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}
</script>