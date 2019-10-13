<?php function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
            $length = strlen($output)+strlen($words[$i]);
            if ($length > $maxchar) {
                break;
            } 
            else {
                $output .= " " . $words[$i];
                ++$i;
            }
        }
        $output .= $end;
    } 
    else {
        $output = $text;
    }
    return $output;
} ?>

<div class="row">
	<div class="col-sm-12">
		<style>
			.selector-step {
				justify-content:center;
			}
			.selector-step a{
				display:blocK;
				color:black !important;
				text-decoration:none;
				padding: 1.8rem;
				cursor: pointer;
				text-align: center;
				border-radius: 1rem;
				font-size: 1.5rem;
				width:100%;
				
			}
			.selector-step li{
				list-style:none!important;
			}
			.selector-step li.active a{
				background: #F6A803;
    			color: white !important;
			}
			.no-t:before, .no-t:after{
				display:none;
			}
			.projects_count{
				width: 80px;
				height: 64px;
				background: #F6A615;
				color:white;
				font-size:1.3rem;
				text-align:center;
				line-height:1.2rem;
				display:inline-flex;
				justify-content:center;
				align-items:center;
				border-radius: 1rem;
			}
			.projects_count big{
				font-size:2rem;
				font-weight:bold;
				margin-bottom:.6rem;
				display:block;
			}
		</style>
		<ul class="col-lg-12 selector-step">
			<li class="active"><a data-toggle="tab" href="#noprojects">Usuarios registrados</a></li>
			<li><a data-toggle="tab" href="#incomplete" >Usuarios con proyectos pendientes</a></li>
			<li><a data-toggle="tab" href="#complete" >Usuarios con proyectos postulados</a></li>
		</ul>
		<br><br>
		<div class="tab-content">
			<div id="noprojects" class="tab-pane fade in active">
				<?php
					foreach ($allUsers as $key => $pro) {
						$user = new User();
						$id = $pro['id_user'];

						$info = $user->getInfoUSerId($id);
						?>
						<div class="col-md-6">
							<div class="widget" style="display:block;">
								<div class="widget-simple no-t" style="display:flex;justify-content:space-between;">
									<div class="left-container">
										<a href='user-profile?id=<?php echo $pro['id_user'] ?>'>
											<img src="<?php echo $info['path_image']; ?>" alt="avatar" class="widget-image img-circle pull-left">
										</a>
										<div class="projects_count text-left">
											<span class="number">
												<big><?php echo $pro['projects']; ?></big>
												<small>Proyectos registrados</small>
											</span>
										</div>
									</div>
									<h4 class="widget-content text-right">
										<a href='user-profile?id=<?php echo $pro['id_user'] ?>' class="themed-color-modern">
											<strong><a href='user-profile?id=<?php echo $pro['id_user'] ?>'><?php echo substrwords($pro['name']." ".$pro['lastname'],26) ?></a></strong>
										</a>
										<small><?php echo $pro['profession']?></small>
									</h4>
								</div>
							</div>
						</div>
						<?php
					}  
				?>
			</div>
			<div id="incomplete" class="tab-pane fade">
				<?php
					foreach ($incompleteProjects as $pro) {
						$user = new User();
						$info = $user->getInfoUSerId($pro['id_user']);
						?>
						<div class="col-md-6">
							<div class="widget" style="display:block;">
								<div class="widget-simple no-t" style="display:flex;justify-content:space-between;">
									<div class="left-container">
										<a href='user-profile?id=<?php echo $pro['id_user'] ?>'>
											<img src="<?php echo $info['path_image']; ?>" alt="avatar" class="widget-image img-circle pull-left">
										</a>
										<div class="projects_count text-left">
											<span class="number">
												<big><?php echo $pro['projects']; ?></big>
												<small>Proyectos pendientes</small>
											</span>
										</div>
									</div>
									<h4 class="widget-content text-right">
										<a class="themed-color-modern">
											<strong><a href='user-profile?id=<?php echo $pro['id_user'] ?>'><?php echo substrwords($pro['name']." ".$pro['lastname'],26) ?></a></strong>
										</a>
										<small><?php echo $pro['profession']?></small>
									</h4>
								</div>
							</div>
						</div>
						<?php
					}  
				?>
			</div>
			<div id="complete" class="tab-pane fade">
				<?php
					foreach ($completeProjects as $pro) {
						$user = new User();
						$info = $user->getInfoUSerId($pro['id_user']);
						?>
						<div class="col-md-6">
							<div class="widget" style="display:block;">
									<div class="widget-simple no-t" style="display:flex;justify-content:space-between;">
										<div class="left-container">
											<a href='user-profile?id=<?php echo $pro['id_user'] ?>'>
													<img src="<?php echo $info['path_image']; ?>" alt="avatar" class="widget-image img-circle pull-left">
											</a>
											<div class="projects_count text-left">
												<span class="number">
													<big><?php echo $pro['projects']; ?></big>
													<small>Proyectos postulados</small>
												</span>
											</div>
										</div>
										<h4 class="widget-content text-right">
											<a href='user-profile?id=<?php echo $pro['id_user'] ?>' class="themed-color-modern">
												<strong><a href='user-profile?id=<?php echo $pro['id_user'] ?>'><?php echo substrwords($pro['name']." ".$pro['lastname'],26) ?></a></strong>
											</a>
											<small><?php echo $pro['profession']?></small>
										</h4>
									</div>
							</div>
						</div>
						<?php
					}  
				?>
		
			</div>
		</div>
	</div>
</div>
