
<html>
<head>
	<?php include_once './application/views/shared/_head_commons.php' ?>
	<link rel="stylesheet" type="text/css" href="<?php echo styles_url() ?>branches.css">
	<link rel="stylesheet" type="text/css" href="<?php echo styles_url() ?>accessories.css">
	<link rel="stylesheet" type="text/css" href="<?php echo styles_url() ?>preowned.css">
	<link rel="stylesheet" type="text/css" href="<?php echo styles_url() ?>footer2016.css">
	<link rel="stylesheet" type="text/css" href="<?php echo styles_url() ?>normalize.css" media="handheld, only screen and (max-width: 480px)">
	
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	<style type="text/css">
	body {
		background: url("<?php echo images_url() ?>background.jpg") no-repeat #000000;
		background-position: 45% 0%;
	}
/*	.left-menu {
		background: url("<?php echo images_url() ?>menu-background.png") no-repeat;
	}*/
	@media (min-width: 1024px) {
		.col-md-6.col-sm-12.col-xs-12.promo-items {
		    height: 281px;
		    background-color: #f5f5f5;
		}
		.titular {
			height: 59px;
			display: flex;
			justify-content: space-around;
			align-items: center;
			border: solid 1px #ddd;
		}
	}
	@media (min-width: 481px) {
		.promo-items {
			overflow: hidden;
		    white-space: normal;
		    word-spacing: normal;
		    display: inline-block;
		    letter-spacing: normal;
		    word-break: break-word;
		    padding: 0;
		}
		.model-title a h1 {
		    font-size: 1.35rem;
		    font-family: CorpoALig;
		    font-weight: normal;
		    padding: .5rem;
		    color: #000;
		    background-color: #f5f5f5;
		}
		h1.promo-title:hover {
		    color: #15ab00;
		}
		.img-responsive {
		    filter: brightness(80%);
		    -webkit-transition: brightness 3s ease-in-out;
		    -moz-transition: brightness 3s ease-in-out;
		    -ms-transition: brightness 3s ease-in-out;
		    -o-transition: brightness 3s ease-in-out;
		    transition: brightness 3s ease-in-out;
		    width: 100%;
		}
		.img-responsive:hover {
		    filter: brightness(100%);
		}
		body > div.container > div:nth-child(10) {
		    background-color: #fff;
		    padding: 0;
		    max-width: 1000px;
		    padding: 1rem 0;
		}
		body > div.container > div:nth-child(10) {
			padding: 0;
		}
	}

	/* iPhone 5 ----------- */
	@media (max-width: 480px) {
		.promo-items {
			padding: 0;
		}
		.row.model-list {
		    margin: 0 auto;
		    padding: 0;
		}
		body > div.container > div:nth-child(10) {
			background-color: #fff;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
			align-content: stretch;
		    margin: 0 auto;
		    padding: 0;
		}
		ul.inline-list.no-margin-list.no-bullet-list.model {
		    line-height: normal;
		    padding: 0;
		    margin: 0;
		}
		body > div.container > div:nth-child(9) {
			letter-spacing: normal;
			padding: 0;
			margin:0 auto;
		}
		body > div.container > div.row.model-list > div > ul {
		    padding: 0;
		    margin: 0 auto;
		}
		body > div.container > div.row.model-list > div > ul > a {
		    font-size: 1.25rem;		    
		}
		.col-md-6.col-sm-12.col-xs-12.promo-items {
		  font-size: 1.5rem;
		  display: flex;
		  flex-direction: column;
		  justify-content: center;
		  align-items: center;
		  align-content: stretch;
		  padding: 0;
		}
		.btn {
		    padding:.5rem;
		    font-size: 1rem;
		}
		.titulo {
		    padding: .5rem!important;
		}
		.model-title a h1 {
				font-size: 1.15rem;
			    font-family: CorpoALig;
			    font-weight: initial;
			    padding: .5rem;
			    margin: 0 auto;
			    color: #333;
			    background-color: #fff;
			    line-height: initial;
			    text-rendering: optimizeLegibility;
		}
		.model-img {
			min-width: 290px;
		}
	}
	.btn-gray{
		position:absolute;
		left:0;
		bottom:0;
		border:none;
		background-color:#5F6266;
		color:white;
		font-size:12px;
		margin-left: 30px;
		margin-bottom: 30px;
	}	
	</style>


	<?php include_once './application/views/shared/_analytics.php' ?>
</head>
<body>
	<div class="container">
		<?php include_once './application/views/shared/_header.php' ?>
		<?php include_once './application/views/shared/_class-menu.php' ?>
		<div class="row">
			<div class="titulo">
				<div><h1>Promociones</h1></div>
				<div><a href="../cotizador" class="btn">COTIZA AHORA</a></div>
			</div>
		</div>

		<!-- <?php print(date('Y/m/d H:i:s')) ?> -->
		<div class="row" style="margin: 0;">
		<div style="color:black;">
		</div>
		<br>
		<?php 
		//echo time();
		if(count($test)>0){
		foreach ($test as $key => $promo) {
			if( $promo->begin != "" && $promo->end != "" && $promo->img_home != "" ){
				if (  strtotime($promo->end) >= time() )  
		?>
			<div class="row">
				<div class="col-sm-10 col-sm-offset-1">
					<a href="<?php echo base_url() ?>promocion?id=<?php echo $promo->id_promotion; ?>">
						<img class="model-img img-responsive" src="<?php echo images_url().$promo->img_home; ?>" alt="<?php echo $promo->name; ?>">
						<button type="button" class="btn btn-gray"><a href="<?php echo base_url() ?>promocion?id=<?php echo $promo->id_promotion; ?>">> Más información</a></button>
					</a>
				</div>
			</div>
			<br>
		<?php
				
			}
		}
		}else{
			echo "<div style='font-size:14px;padding:20px;margin-bottom:20px;color:black;'>En este momento no disponemos de promociones activa, intenta ingresar mas tarde.</div>";
		}
		?>

		
		
			<!--<?php foreach ($promosiones as $model) { ?>
				<?php if (time() >= strtotime($model->start_date) && time() <= strtotime($model->end_date) && $model->category != "pe") { ?>
				<div class="col-md-6 col-sm-12 col-xs-12 promo-items">
					<div class="model-title col-md-12 col-sm-12 col-xs-12 titular" style="padding: 0;">
						<a href="<?php echo base_url() ?>promocion?id=<?php echo $id = $model->id; ?>">
							<h1 class="promo-title"><?php echo $promo_model_description = $model->description; ?></h1>
						</a>
					</div>
					<div clas="col-md-12 col-sm-12 col-xs-12">
						<a href="<?php echo base_url() ?>promocion?id=<?php echo $id = $model->id; ?>">
							<img class="model-img img-responsive" src="<?php echo images_url() ?><?php echo $model->img_app; ?>" alt="<?php echo $promo_model_description = $model->description; ?>">
						</a>
					</div>
				</div>
				<?php } ?>
			<?php } ?> 
			-->
			<br>
		</div>
<!-- 		<div class="row" style="margin: 0;">
			<?php foreach ($promosiones as $model) { ?>
			<div class="col-md-6 col-sm-12 col-xs-12 promo-items">
				<div class="model-title col-md-12 col-sm-12 col-xs-12" style="padding: 0;">
					<a href="<?php echo base_url() ?>promocion?id=<?php echo $id = $model->id; ?>">
						<h1 class="promo-title"><?php echo $promo_model_description = $model->description; ?></h1>
					</a>
				</div>
				<div clas="col-md-12 col-sm-12 col-xs-12">
					<a href="<?php echo base_url() ?>promocion?id=<?php echo $id = $model->id; ?>">
						<img class="model-img img-responsive" src="<?php echo images_url() ?><?php echo $model->img_app; ?>" alt="<?php echo $promo_model_description = $model->description; ?>">
					</a>
				</div>
			</div>
			<?php } ?>
			<br>
		</div> -->

		<?php include_once './application/views/shared/_footer2016.php' ?>
		<?php include_once './application/views/shared/_footer.php' ?>
	</div>
</body>
</html>


