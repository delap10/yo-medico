<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Yo médico</title>
    <!-- Definiendo la codificación del lenguaje -->
    <meta charset="utf-8">
    <!-- Compatibilidad con el navegador Edge -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Ajustando compatibilidad con diferentes dispositivos -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Agregando librerías para fuentes, estilos y animaciones -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="source/css/font-awesome.min.css">

    <!-- Bootstrap core CSS -->
    <link href="source/css/bootstrap.min.css" rel="stylesheet">

    <!-- Material Design Bootstrap -->
    <link href="source/css/mdb.min.css" rel="stylesheet">

    <!-- Sweet Alerts-->
    <link rel="stylesheet" type="text/css" href="source/css/sweetalert.css">

    <!-- Estilo de plantilla -->
    <link href="source/css/style.css" rel="stylesheet">
</head>

<body>
    <!--Navbar-->
    <nav class="navbar navbar-ecg-dark navbar-toggleable-md navbar-dark scrolling-navbar fixed-top">
        <div class="container">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav1" aria-controls="navbarNav1" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php" data-toggle="tooltip" data-placement="bottom" title="Inicio">
                <img src="source/img/logo/logo.svg" class="d-inline-block align-top z-depth-0" width="40" height="40" title="Yo médico" alt="YoMédico">
            </a>
            <div class="collapse navbar-collapse" id="navbarNav1">
                <!--Links-->
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#best-features"><span><i class="fa fa-institution" aria-hidden="true"></i> Conócenos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php"><span><i class="fa fa-envelope" aria-hidden="true"></i> Contáctanos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="comunidad.php"><span><i class="fa fa-users" aria-hidden="true"></i> Comunidad</span></a>
                    </li>
                    <?php if(isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 1){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="fa fa-list-alt" aria-hidden="true"></i> Cursos</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="modules/crud/index.php"><span><i class="fa fa-pie-chart" aria-hidden="true"></i> Administrar</span></a>
                            <a class="dropdown-item" href="modules/crud/desbloqueo.php"><span><i class="fa fa-check-square" aria-hidden="true"></i> Desbloquear participantes</span></a>
                        </div>
                    </li>
                    <?php }else{ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="curso.php"><span><i class="fa fa-list-alt" aria-hidden="true"></i> Cursos</span></a>
                    </li>
                    <?php } ?>
                    <li class="nav-item">
                        <a class="nav-link" href="live.php"><span><i class="fa fa-circle live" aria-hidden="true"></i> Live</span></a>
                    </li>
                </ul>

                <ul class="navbar-nav my-lg-0">
                    <?php if(isset($_SESSION['name'])){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="fa fa-user-circle" aria-hidden="true"></i> <?php echo $_SESSION['name']; ?></span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="modules/user/recupera.php"><span> <i class="fa fa-unlock" aria-hidden="true"></i> Cambiar contraseña</span></a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="modules/user/logout.php?pag=about.php">
                            <span><i class="fa fa-sign-out" aria-hidden="true"></i> Cerrar sesión</span>
                        </a>
                    </li>
                    <?php }elseif (!isset($_SESSION['usuario'])){ ?>
                    <li class="nav-item">
                        <a class="nav-link" href="modules/user/registro.php">
                            <span><i class="fa fa-edit" aria-hidden="true"></i> Regístrate</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="modal" data-target="#loginModal">
                            <span><i class="fa fa-sign-in" aria-hidden="true"></i> Inicia sesión</span>
                        </a>
                    </li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <!--/.Navbar-->

    <!--Mask-->
    <div class="view view-about hm-black-light">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row">
                    <!-- Title -->
                    <div class="col">
                        <div class="title-des text-center">
                            <h1 class="display-1 wow fadeInLeft">Conócenos</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.Mask-->

    <!--Main content-->
    <div class="container">
        <!-- Section about-->
        <section class="section">
            <!--About header-->
            <div class="divider-new">
                <h1 class="h1-responsive wow bounceIn">Acerca de nosotros</h1>
            </div>
            <!--/ .About header-->
            <p class="section-description wow fadeInUp">Somos una organización conformada por jóvenes egresados, estudiantes e interesados en medicina. Por el único motivo de informar y enseñar primeros auxilios a todas las personas que lo deseen y así poder servir de gran ayuda para cuando se presente una emergencia.</p>
        </section>
        <!-- Section about-->

        <!-- Section mission & vision-->
        <section class="section">
            <div class="container-fluid">
                <div class="row">
                    <div class="col col-md-6 col-sm-6">
                        <div class="divider-new">
                            <h1 class="h1-responsive">Misión</h1>
                        </div>
                        <p class="section-description">Capacitar e instruir al personal del sector salud, estudiantes, asociaciones civiles, organizaciones no gubernamentales, empresas, así como a la comunidad en general, con el objetivo de preservar la vida resaltando el valor del ser humano, con responsabilidad a partir de conocimientos científicos comprobados; contribuir a aliviar el dolor y devolver la esperanza a los pacientes que se encuentren en una situación de emergencia.</p>
                    </div>
                    <div class="col col-sm-6 col-md-6">
                        <div class="divider-new">
                            <h1 class="h1-responsive">Visión</h1>
                        </div>
                        <p class="section-description">Ser una academia que liderase el sector de capacitación en rescate, primeros auxilios, supervivencia y protección civil, con el mejor equipo de trabajo que permita atraer y retener a las mejores personas, llenos de satisfacción por la calidad y eficacia de nuestros servicios.</p>
                    </div>
                </div>
            </div>
        </section>
        <!--/ .Section mission & vision-->

        <!--Section: Team v.1-->
        <section class="section team-section pb-5">

            <!--Section heading-->
            <div class="divider-new">
                <h1 class="h1-responsive">Nuestro sorprendente equipo</h1>
            </div>
            <!--Section description-->
            <p class="section-description">Equipo sumamente capacitado y con amplios conocimientos para impartir cursos de primeros auxilios.</p>

            <!--Grid row-->
            <div class="row text-center wow fadeInUp flex-center">

                <!--Grid column-->
                <!--div class="col-lg-4 col-md-6 mb-r">

                    <div class="avatar">
                        <img src="source/img/about/alicia.jpg" class="rounded-circle z-depth-1" alt="First sample avatar image">
                    </div>
                    <h4>Alicia Hidalgo</h4>
                    <h6 class="font-bold blue-text">Ingeniera en Sistemas Computacionales</h6>
                    <p>Egresada del Instituto Tecnológico de Tapachula. Amplios conocimientos en programación xD</p-->

                    <!--Facebook->
                    <a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a-->
                    <!--Twitter->
                    <a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a-->
                    <!--Instagram->
                    <a class="icons-sm ins-ic"><i class="fa fa-instagram"> </i></a>

                </div-->
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-r fl">

                    <div class="avatar">
                        <img src="source/img/about/alejandra.jpg" class="rounded-circle z-depth-1" alt="Third sample avatar image">
                    </div>
                    <h4>Alejandra Gutiérrez</h4>
                    <h6 class="font-bold blue-text">Estudiante de medicina</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>

                    <!--Facebook-->
                    <a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a>
                    <!--Pinterest-->
                    <a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a>
                    <!--Email-->
                   <a class="icons-sm email-ic"><i class="fa fa-envelope-o"> </i></a>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-r">

                    <div class="avatar">
                        <img src="source/img/about/david.jpg" class="rounded-circle z-depth-1" alt="Second sample avatar image">
                    </div>
                    <h4>David Aguirre Rodas</h4>
                    <h6 class="font-bold blue-text">Lifeguard</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>

                    <!--Linkedin-->
                    <a class="icons-sm li-ic"><i class="fa fa-linkedin"> </i></a>
                    <!--Facebook-->
                    <a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a>
                    <!--Dribbble-->
                    <a class="icons-sm dribbble-ic"><i class="fa fa-dribbble"> </i></a>
                    
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-r">

                    <div class="avatar">
                        <img src="source/img/about/gustavo.jpg" class="rounded-circle z-depth-1" alt="First sample avatar image">
                    </div>
                    <h4>Gustavo Rabanales</h4>
                    <h6 class="font-bold blue-text">Medicina humana</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>

                    <!--Facebook-->
                    <a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a>
                    <!--Twitter-->
                    <a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a>
                    <!--Instagram-->
                    <a class="icons-sm ins-ic"><i class="fa fa-instagram"> </i></a>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row text-center wow fadeInUp flex-center">

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-r">

                    <div class="avatar">
                        <img src="source/img/about/angelica.jpg" class="rounded-circle z-depth-1" alt="Fourth sample avatar image">
                    </div>
                    <h4>Angélica Arroyo</h4>
                    <h6 class="font-bold blue-text">Estudiante</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>

                    <!--Google +-->
                    <a class="icons-sm gplus-ic"><i class="fa fa-google-plus"> </i></a>
                    <!--Facebook-->
                    <a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a>
                    <!--GitHub-->
                    <a class="icons-sm git-ic"><i class="fa fa-github"> </i></a>

                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-lg-4 col-md-6 mb-r">

                    <div class="avatar">
                        <img src="source/img/about/francisco.jpg" class="rounded-circle z-depth-1" alt="First sample avatar image">
                    </div>
                    <h4>Francisco Dighero Santiago</h4>
                    <h6 class="font-bold blue-text">Ponente</h6>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod eos id officiis hic tenetur.</p>

                    <!--Facebook-->
                    <a class="icons-sm fb-ic"><i class="fa fa-facebook"> </i></a>
                    <!--Twitter-->
                    <a class="icons-sm tw-ic"><i class="fa fa-twitter"> </i></a>
                    <!--Instagram-->
                    <a class="icons-sm ins-ic"><i class="fa fa-instagram"> </i></a>

                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->

        </section>
        <!--Section: Team v.1-->
    </div>
    <!--/ .Main content-->

    <!--Footer-->
    <footer class="page-footer center-on-small-only wow fadeInUp">

        <!--Footer Links-->
        <div class="container">
            <div class="row">

                <!--First column-->
                <div class="col-md-6">
                    <h5 class="title">Footer Content</h5>
                    <p>Here you can use rows and columns here to organize your footer content.</p>
                </div>
                <!--/.First column-->

                <!--Second column-->
                <div class="col-md-6 text-center">
                    <h5 class="title">Links</h5>
                    <ul>
                        <li><a href="#!">Link 1</a></li>
                        <li><a href="#!">Link 2</a></li>
                        <li><a href="#!">Link 3</a></li>
                        <li><a href="#!">Link 4</a></li>
                    </ul>
                </div>
                <!--/.Second column-->
            </div>
        </div>
        <!--/.Footer Links-->

        <hr>

        <!--Social buttons-->
        <div class="social-section wow fadeInUp">
            <ul>
                <li><a class="btn-floating btn-small btn-wa" ripple-radius><i class="fa fa-whatsapp"></i></a></li>
                <li><a class="btn-floating btn-small btn-fb" ripple-radius><i class="fa fa-facebook"></i></a></li>
                <li><a class="btn-floating btn-small btn-tw" ripple-radius><i class="fa fa-twitter"></i></a></li>
                <li><a class="btn-floating btn-small btn-gplus" ripple-radius><i class="fa fa-google-plus"></i></a></li>
                <li><a class="btn-floating btn-small btn-li" ripple-radius><i class="fa fa-linkedin"></i></a></li>
                <li><a class="btn-floating btn-small btn-git" ripple-radius><i class="fa fa-github"></i></a></li>
                <li><a class="btn-floating btn-small btn-pin" ripple-radius><i class="fa fa-pinterest"></i></a></li>
                <li><a class="btn-floating btn-small btn-ins" ripple-radius><i class="fa fa-instagram"></i></a></li>
            </ul>
        </div>
        <!--/.Social buttons-->

        <!--Copyright-->
        <div class="footer-copyright wow fadeInUp">
            <div class="container-fluid">
                © 2017 Copyright: <a href="#"> Alicia Hidalgo & Ricardo de la Parra xD </a>
            </div>
        </div>
        <!--/.Copyright-->

    </footer>
    <!--/.Footer-->

    <!--Modal login-->
    <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close pull-right" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
          
                <div class="modal-body">
                    <!--Form with header-->
                    <div class="card">
                        <div class="card-block">
                            <!--Header-->
                            <div class="form-header blue-gradient">
                                <h3><i class="fa fa-lock"></i> Inicio de sesión:</h3>
                            </div>
                            
                            <!--Body-->
                            <div class="md-form">
                                <i class="fa fa-envelope prefix"></i>
                                <input mdbActive type="text" id="sign_nombUsuario" name="sign_nombUsuario" class="form-control validate" required>
                                <label for="sign_nombUsuario" data-error="¡Error!" data-success="¡Correcto!">Usuario o correo electrónico</label>
                            </div>

                            <div class="md-form">
                                <i class="fa fa-lock prefix"></i>
                                <input mdbActive type="password" id="sign_password" name="sign_password" class="form-control validate" pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Debe contener al menos un número, una letra minúscula y 8 o más caracteres" required>
                                <label for="sign_password" data-error="¡Error!" data-success="¡Correcto!">Contraseña</label>
                            </div>

                            <div class="text-center">
                                <button class="btn btn-deep-purple" id="btn_sign" ripple-radius>Inicia sesión</button>
                            </div>
                        </div>

                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options">
                                <p>¿Aún no eres miembro? <a href="modules/user/registro.php">Regístrate</a></p>
                                <p>¿Olvidaste <a href="#">tu contraseña?</a></p>
                            </div>
                        </div>
                    </div>
                    <!--/Form with header-->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default ml-auto" aria-label="Close" data-dismiss="modal" ripple-radius>Close</button>
                </div>
            </div>
        </div>
    </div>
    
    <!--/. Modal login-->

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="source/js/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="source/js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="source/js/bootstrap.min.js"></script>

    <!-- Sweet alert JavaScript -->
    <script src="source/js/sweetalert.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="source/js/mdb.min.js"></script>

    <!-- Animations init-->
    <script>
        new WOW().init();
        
        $(document).ready(function(){
            $('#btn_sign').click(function(){
                var usuario = $('#sign_nombUsuario').val();
                var password = $('#sign_password').val();
                if(usuario != '' && password != ''){
                    $.ajax({
                        url:"modules/user/action.php",
                        method:"POST",
                        data:{usuario:usuario, password:password},
                        success:function(data){
                            if (data == "Success") {
                                $('#loginModal').hide();
                                location.reload(true);
                            }else{
                                swal("Ha ocurrido un error", data, "error");
                            }
                        }
                    });
                }else{
                    swal("Ha ocurrido un error", "Ambos campos son necesarios. Por favor, rellénelos.", "error");
                }
            });
        });

        $(function () {
          $('[data-toggle="tooltip"]').tooltip()
        })
    </script>

</body>

</html>