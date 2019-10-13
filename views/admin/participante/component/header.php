<?php 
    $user = new User();
    $token = $_SESSION['token_session'];
    $info = $user->getInfoUSer($token);
    /*print_r($info);
    print_r($user->finishRegister($token));*/
    // $galery = new Galery();
    // $imagen_profile = $galery->getFiles($info["path_image"]);      

    //if( $user->finishRegister($_SESSION['token']) ) header('Location: participante');
    $path = explode('/', $_SERVER['REQUEST_URI'])[2];
    
    if($path != "editar-perfil" && $path != "editar-perfil?msg=terminar"  && $user->finishRegister($token) != 1){
        header('Location: editar-perfil?msg=terminar');
    }

    if( isset($_GET["msg"]) && $user->finishRegister($token) != 1){
        ?>
        <script>alert("Debe completar su información de usuario antes de continuar")</script>
        <?php
    }
    #print_r($path);
?>

<!-- Header -->
<header class="navbar navbar-default">
    <!-- Left Header Navigation -->
    <ul class="nav navbar-nav-custom">
        <a href="/cla/participante" class="sidebar-brand" style="background: #f9f9f9">
            <img src="resources/admin/img/cla/Logo-CLA-color.png" alt="" > 
        </a>
    </ul>
    <!-- END Left Header Navigation -->
    <!-- Right Header Navigation -->
    <ul class="nav navbar-nav-custom pull-right">
        
        <!-- User Dropdown -->
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo $info['path_image']; ?>" alt="avatar"> <i class="fa fa-angle-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-custom dropdown-menu-right">
                <li>
                    <a href="logout"><i class="fa fa-ban fa-fw pull-right"></i> Cerrar sesión</a>
                </li>
                
            </ul>
        </li>
        <!-- END User Dropdown -->
    </ul>
    <!-- END Right Header Navigation -->
</header>
<!-- END Header -->