<?php
    session_start();
    require 'config/conexion.php';
    require 'config/funcs.php';
    global $mysqli;
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

    <!-- Calificar con estrellas-->
    <link href="source/css/fontawesome-stars-o.css" rel="stylesheet">

    <!-- Galería de Imágenes -->
    <link rel="stylesheet" href="source/css/viewer.min.css">

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
                    <li class="nav-item">
                        <a class="nav-link" href="about.php"><span><i class="fa fa-institution" aria-hidden="true"></i> Conócenos</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php"><span><i class="fa fa-envelope" aria-hidden="true"></i> Contáctanos</span></a>
                    </li>
                    <li class="nav-item active">
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
                        <a class="nav-link" href="modules/user/logout.php?pag=curso.php">
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
    <div class="view view-vistaPublicacion hm-black-light">
        <div class="full-bg-img flex-center">
            <div class="container">
                <div class="row">
                    <!-- Title -->
                    <div class="col">
                        <div class="title-des text-center">
                            <h1 class="display-1 wow fadeInLeft">Evento realizado</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.Mask-->

    <!-- Main content-->
    <div class="container">
        <!-- Curso-->
        <?php
            if(isset($_GET['idPublicacion']) && $_GET['idPublicacion'] != ""){
                $id_publicacion = $_GET['idPublicacion'];
                $query = "SELECT a.id_publicacion, titulo, descripcion, nombre, fecha, c.id_foto FROM publicaciones AS a INNER JOIN publicaciones_fotos AS b ON a.id_publicacion = b.id_publicacion INNER JOIN fotos AS c ON b.id_foto = c.id_foto WHERE a.id_publicacion = $id_publicacion GROUP BY a.id_publicacion";
                if($stmt = $mysqli->query($query)){
                    if($stmt->num_rows > 0){
                        while($row = $stmt->fetch_row()){
        ?>
        <section class="section">
            <div class="row">
                <button type="button" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Regresar" onclick="window.history.back();">
                    <i class="fa fa-arrow-left" aria-hidden="true"></i>
                </button>
            </div>
            <div class="divider-new">
                <h1 class="display-1 h1-responsive"><?php echo $row[1]; ?></h1>
            </div>
        </section>
        <section>
            <div class="row flex-center">
                <div class="card mb-3 hoverable">
                    <div class="card-block">
                        <!--h4 class="card-title"><?php echo $row[1]; ?></h4-->
                        <p class="card-text"><?php echo mostrarSalto($row[2]); ?></p>
                        <p class="card-text"><small class="text-muted"><span><i class="fa fa-calendar"></i> <?php echo $row[4]; ?></span></small></p>
                        <!--input type="hidden" id="hidden_curso_id" value="<?php echo $row[0]; ?>"-->
                    </div>
                </div>
            </div>
        </section>
        <!--/. Curso-->
        <section class="section team-section pb-5" id="images">

            <!--Grid row-->
            <div class="row text-center wow fadeInUp flex-center">
                <?php
                    $query = "SELECT nombre FROM fotos AS a INNER JOIN publicaciones_fotos AS b ON a.id_foto = b.id_foto INNER JOIN publicaciones AS c ON b.id_publicacion = c.id_publicacion WHERE c.id_publicacion = $row[0]";
                    if($stmt = $mysqli->query($query)){
                        if($stmt->num_rows > 0){
                            while($fila = $stmt->fetch_row()){
                ?>
                <!--Grid column-->
                <div class="col-lg-3 col-md-4 mb-r fl">
                    <div class="avatar">
                        <img src="source/img/publicaciones/<?php echo $row[0]."/".$fila[0]; ?>" class="rounded-circle hoverable" alt="<?php echo $fila[0]; ?>" width="200" heigth="200"/>
                    </div>
                </div>
                <!--Grid column-->
                <?php } } } ?>
            </div>
            <!--Grid row-->
        </section>
        <?php
                    }
                }else{
                    echo "<div class='alert alert-danger flex-center'>";
                    echo "<h1>No existen eventos registrados</h1></div>";
                }
            }else{
                echo "<div class='alert alert-danger'>";
                echo "<h1>Error al consultar datos</h1></div>";
            }
        }else{
            echo "<div class='alert alert-danger'>";
            echo "<h1>No seleccionó el curso</h1></div>";
        }
        ?>
        
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

    <!-- Autoajustar textArea JavaScript -->
    <script src="source/js/autosize.min.js"></script>

    <!-- Calificar con estrellas JavaScript -->
    <script src="source/js/jquery.barrating.min.js"></script>

    <!-- Galería de imágenes JavaScript-->
    <script type="text/javascript" src="source/js/viewer.min.js"></script>

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

        autosize($('textarea'));

        $(document).ready(function(){
            var id_curso = $('#hidden_curso_id').val();
            $('#btn-comenta').click(function(){
                var comentario = $('#comentario').val();
                $.ajax({
                    url:"modules/comentarios/comenta.php",
                    method:"POST",
                    data:{id_curso:id_curso, comentario:comentario},
                    success:function(data){
                        if(data == "OK"){
                            location.reload();
                        }else{
                            swal("Ha ocurrido un error",data,"error");
                        }
                    }
                });
            });
        });

        function response(id){
            $('#reply_'+id).css('display','inline');
        }

        function enviarRespuesta(id){
            var respuesta = $('#respuesta_'+id).val();
            var comentario_id = $('#hidden_comentario_id_'+id).val();
            if(respuesta != ""){
                $.ajax({
                    url:"modules/comentarios/responde.php",
                    method:"POST",
                    data:{id_comentario:comentario_id, respuesta:respuesta},
                    success:function(data){
                        if(data == "OK"){
                            location.reload();
                        }else{
                            swal("Ha ocurrido un error",data,"error");
                        }
                    }
                });
            }else{
                swal("Ha ocurrido un error", "Debe escribir la respuesta", "error");
            }
        }

        // View some images
        var viewer = new Viewer(document.getElementById('images'));
    </script>


</body>

</html>