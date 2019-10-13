<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Construlita Lighting Awards 2019</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta content="CONSTRULITA LIGHTING AWARDS es un concurso abierto tanto a talentos emergentes como a profesionales de gran trayectoria." name="description" />
        <meta content="CONSTRULITA" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <link rel="shortcut icon" href="images/favicon.ico">
        <link href="resources/page/css/bootstrap.min.css" rel="stylesheet">
        <link href="resources/page/css/animate.min.css" rel="stylesheet">
        <link href="resources/page/css/et-line-icons.css" rel="stylesheet">
        <link href="resources/page/css/materialdesignicons.min.css" rel="stylesheet">
        <link href="resources/page/css/style.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="resources/page/css/font-awesome.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/fontello.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/essential_icon.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/prettyPhoto.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/owl.carousel.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/owl.transitions.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/magnific-popup.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/settings.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/preset.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/blogpopup.css"/>
        <link rel="stylesheet" type="text/css" href="resources/page/css/responsive.css"/>
        <link rel="stylesheet" href="resources/page/css/font-icons.css"/>
        <link rel="stylesheet" href="resources/page/revolution/css/settings.css"/>
    </head>
    <body>
        <header id="topnav" class="defaultscroll">
            <div class="container">
                <div>
                    <a href="index.html" class="logo">
                        <img src="resources/page/images/logo-construlita-lighting-awards-blanco.png" alt="logo Construlita Lighting Awards" class="logo-light" height="50">
                        <img src="resources/page/images/logo-construlita-lighting-awards.png" alt="logo Construlita Lighting Awards" class="logo-dark" height="50">
                    </a>
                </div>
                <div class="menu-extras">

                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>
                <div id="navigation">
                    <ul class="navigation-menu">
                        <li>
                            <a href="proyectos-participantes.html">PROYECTOS PARTICIPANTES</a>
                        </li>
                        <li>
                            <a href="convocatoria.html">CONVOCATORIA</a>
                        </li>
                        <li>
                            <a href="reconocimientos.html">RECONOCIMIENTOS</a>
                        </li>
                        <li>
                            <a href="jurado.html">JURADO</a>
                        </li>
                        <li>
                            <a href="otras-ediciones.html">OTRAS EDICIONES</a>
                        </li>
                        <li>
                            <a href="registro.html" class="stellarButton2">¡PARTICIPA AHORA!</a>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <section class="page-header-box section bg-img-2 parallax" data-stellar-background-ratio="0.5" style="background-position: 0% 0%;">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <div class="title-box ela4">
                            <img src="resources/page/images/logo-construlita-lighting-awards-blanco.png" alt="" height="150"/>
                            <h3 class="text-white m-b-0">¡Participa en nuestra edición 2019!</h3>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->
        </section>
        <section class="comonSection p-20">
            <div class="fullscreen-container">
                <?php
                if(isset($_SESSION['alerta'])){
                ?>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 p-top-50">
                            <div class="alert alert-success">
                            <strong><?php echo $_SESSION['alerta']["status"]; ?></strong> <?php echo $_SESSION['alerta']["message"]; ?>
                            </div>
                        </div>
                    </div>
                <?php
                    unset($_SESSION['alerta']);
                }
                ?>
               <?php
                if(isset($_GET['message'])){
                ?>
                    <div class="row">
                        <div class="col-sm-10 col-sm-offset-1 p-top-50">
                            <div class="alert alert-success">
                            <strong>Error</strong> <?php echo $_GET['message'] ?>
                            </div>
                        </div>
                    </div>
                <?php
                    #unset($_SESSION['alerta']);
                }
                ?>
                <div class="row p-20">
                    <div class="col-lg-4 col-sm-12 p-20">
                        <h2 class="amarillo">¡Participa en nuestra edición 2019!</h2>
                        <hr>
                        <p><b>Convocatoria:</b> <br>30 de noviembre, 2018 <br><b>Cierre de convocatoria:</b> <br>1 de febrero, 2019<br> <b>Premiación:</b> <br> 6 de marzo, 2019</p>
                        <hr>
                        <p><small class="font-13">NOTA: Si participaste en ediciones pasadas de CONSTRULITA LIGHTING AWARDS, puedes ingresar utilizando la misma cuenta.</small></p>
                        <p>Descarga <a href="#" class="amarillo font-bold">la convocatoria completa.</a></p>
                        <p>Descarga los <a href="#" class="amarillo font-bold">lineamientos y recomendaciones </a>de registro.</p>
                        <hr>
                        <p>¿Tienes dudas sobre el proceso de registro? <br><a href="mailto:" class="amarillo font-bold"><small>Escríbenos.</small></a></p>
                    </div>
                    <div class="col-lg-4 col-sm-12 p-20">
                        <h3>Cambia tu contraseña</h3>
                        <hr>
                        <form action="save-new-password" class="text-left" name="savenew" method="POST">
                            <div class="form-group">
                                <label>Contraseña:</label>
                                <input type="hidden" name="id" value="<?php echo $auth[0]; ?>" required class="form-control" required>
                                <input type="hidden" name="email" value="<?php echo $auth[1]; ?>" required class="form-control" required>
                                <input type="password" name="pass1" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label>Repite tu contraseña:</label>
                                <input type="password" name="pass2" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <button class="stellarButton" onClick="return compara();">Enviar</button>	
                            </div>
                        
                            
                        </form>	
                    </div>
                </div>
            </div>
        </section>
        <section class="section bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 logospie">
                        <a href="http://grupoconstrulita.com/es_ES/" target="_blank"><img src="resources/page/images/logo-grupo-construlita.png" height="80" alt=""/></a>
                    </div>
                    <div class="col-lg-3 logospie">
                        <a href="http://tecnolite.lat/" target="_blank"><img src="resources/page/images/logo-tecnolite.png" height="80" alt=""/></a>
                    </div>
                    <div class="col-lg-3 logospie">
                        <a href="http://www.construlitalighting.com/" target="_blank"><img src="resources/page/images/logo-construlita- gris.png" height="80" alt=""/></a>
                    </div>
                    <div class="col-lg-3 ela logospie2">
                        <a href="https://www.expolightingamerica.com/" target="_blank"><img src="resources/page/images/logo-expo-lighting-america-gris.png" height="100" alt=""/></a>
                    </div>
                </div>     
            </div> <!-- end row -->
        </section>
        <footer class="section-md bg-dark footer-one p-b-0">
            <div class="container">
                <div class="row">

                    <div class="col-md-4 col-sm-6 p-b-40">
                        <a href="index.html"><img src="resources/page/images/logo-construlita-lighting-awards-blanco.png" alt="logo Construlita Lighting Awards" height="90"></a>
                        <p class="text-light about-text font-14 m-t-10">En Grupo Construlita queremos iluminar los mejores momentos de la vida para ayudar a construir un futuro más radiante.</p>
                    </div>
                    <div class="col-md-2 col-sm-6 p-b-40">
                        <h5>Links de interés</h5>
                        <ul class="list-unstyled">
                            <li><a href="http://www.construlitalighting.com">CONSTRULITA</a></li>
                            <li><a href="http://www.construlitalighting.com/blog/">BLOG</a></li>
                            <li><a href="liberacion-de-materiales.html">LIBERACIÓN DE MATERIALES</a></li>
                            <li><a href="http://grupoconstrulita.com/es_ES/aviso-de-privacidad/">AVISO DE PRIVACIDAD</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 col-sm-6 p-b-40">
                        <h5>CONSTRULITA LIGHTING AWARDS</h5>
                        <ul class="list-unstyled">
                            <li><a href="proyectos-participantes.html">PROYECTOS PARTICIPANTES</a></li>
                            <li><a href="convocatoria.html">CONVOCATORIA</a></li>
                            <li><a href="registro.html">REGISTRO</a></li>
                            <li><a href="reconocimientos.html">RECONOCIMIENTOS</a></li>
                            <li><a href="jurado.html">JURADO</a></li>
                            <li><a href="otras-ediciones.html">OTRAS EDICIONES</a></li>
                            <li><a href="faqs.html">FAQ's</a></li>
                            <li><a href="iniciar-sesion.html">INICIAR SESIÓN</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="p-b-40 footer-map">
                            <h5>Contacto</h5>
                            <ul class="list-unstyled">
                                <li>Acceso IV No. 3 Fracc. Ind. Benito Juárez. 76130 Querétaro, Qro. México.</li>
                                <li><strong class="font-secondary font-14">Tels. </strong> +52 [442] 238 39 00 / 02</li>
                                <li><strong class="font-secondary font-14">Email:</strong> <a href="mailto:contacto@construlita.com.mx">organizadores@awards.construlitalighting.com</a></li>
                            </ul>
                        </div>
                    </div>
                </div> <!-- end row -->
            </div> <!-- end container -->

            <div class="footer-one-alt">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <p class="m-b-0 font-13 copyright">Todos los derechos reservados © 2018</p>
                        </div>
                        <div class="col-sm-7">
                            <ul class="list-inline footer-social-one m-b-0 pull-right">
                                <li><a href="https://www.facebook.com/CONSTRULITA.MX/"><i class="mdi mdi-facebook"></i></a></li>
                                <li><a href="https://www.instagram.com/construlitamx/"><i class="mdi mdi-instagram"></i></a></li>
                                <li><a href="https://www.youtube.com/user/ConstrulitaServices"><i class="mdi mdi-youtube-play"></i></a></li>
                                <li><a href="https://twitter.com/construlita"><i class="mdi mdi-twitter"></i></a></li>
                                <li><a href="https://www.linkedin.com/company/construlita/"><i class="mdi mdi-linkedin"></i></a></li>
                                <li><a href="https://www.pinterest.com.mx/construlita/"><i class="mdi mdi-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div> <!-- end row -->
                </div> <!-- end container -->
            </div>
        </footer>
        <a href="#" class="back-to-top"> <i class="mdi mdi-arrow-up"> </i> </a>


        <!-- js placed at the end of the document so the pages load faster -->
        <script type="text/javascript" src="resources/page/js/jquery-2.1.4.min.js"></script>
        <script type="text/javascript" src="resources/page/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="resources/page/js/wow.min.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.easing.1.3.min.js"></script>
        <script type="text/javascript" src="resources/page/js/waypoints.min.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.counterup.min.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.stellar.min.js"></script>
        <script type="text/javascript" src="resources/page/plugins/flexslider/js/jquery.flexslider-min.js"></script>
        <script type="text/javascript" src="resources/page/plugins/isotope/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.ajaxchimp.js"></script>
        <script type="text/javascript" src="resources/page/js/main.js"></script>
        <script type="text/javascript" src="resources/page/js/portfolio-filter.js"></script>
        <script type="text/javascript" src="resources/page/js/mixer.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.appear.js"></script>
        <script type="text/javascript" src="resources/page/js/prettyPhoto.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.shuffle.min.js"></script>
        <script type="text/javascript" src="resources/page/js/owl.carousel.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="resources/page/js/modernizr.custom.js"></script>
        <script type="text/javascript" src="resources/page/js/classie.js"></script>
        <script type="text/javascript" src="resources/page/js/blogpopup.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="resources/page/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="resources/page/js/theme.js"></script>

    </body>
</html>