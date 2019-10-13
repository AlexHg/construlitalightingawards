<div class="container-fluid">
	<div class="row yellow p-top-bottom-25 m-top-bottom-20">
		<div class="col-lg-12 text-uppercase text-center f-black">
			<h2>recuperar contraseña</h2>
		</div>
	</div>
	<?php

		if(isset($_SESSION['alerta'])){
	?>
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1">

				<div class="jumbotron">
				  <h3>
				  	 <strong><?php echo $_SESSION['alerta']["status"]; ?></strong> <?php echo $_SESSION['alerta']["message"]; ?>
				  </h3>
				</div>

			</div>
		</div>
	<?php
		//unset($_SESSION['alerta']);
		}

	?>
</div>