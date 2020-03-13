<?php
session_start();
include '../bd/bd.php';

try
{
    $id_cita = $_GET['id_cita'];
}
catch (Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("Refresh: 3; url= citas.php");
}
?>

<!--
 =========================================================
 * Blk• Design System Pro - v1.0.0
 =========================================================

 * Product Page: https://www.creative-tim.com/product/blk-design-system-pro
 * Copyright 2019 Creative Tim (http://www.creative-tim.com)

 * Coded by www.creative-tim.com

 =========================================================

 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 -->
 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
        <title>
            D'PeloStudio
        </title>
<!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,600,700,800" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet"/>
<!-- CSS Files -->
    <link href="../assets/css/blk-design-system-pro.css?v=1.0.0" rel="stylesheet"/>
    <script src="https://kit.fontawesome.com/8da9dff42f.js" crossorigin="anonymous"></script> 
</head>

<body class="reset-page">
<!-- Modal Login -->
        <div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-login">
          <div class="modal-content">
            <div class="card card-login">
              <form class="form" action="/bd/login.php" method="POST">
                <div class="card-header">
                  <img class="card-img" src="/assets/img/square-purple-1.png" alt="Card image">
                  <h4 class="card-title" style="color: #ffffff">Login</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="tim-icons icon-simple-remove"></i>
                  </button>
                </div>
                <div class="card-body">
                  <div class="input-group input-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="tim-icons icon-single-02"></i></span>
                    </div>
                    <input type="text" class="form-control" name="email" placeholder="Correo Electronico" required>
                  </div>
                  <div class="input-group input-lg">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="tim-icons icon-caps-small"></i></span>
                    </div>
                    <input type="password" class="form-control" name="contrasena" placeholder="Contrasña" required>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button type="submit" class="btn btn-primary btn-round btn-lg btn-block">Comenzar</button>
                </div>
                <div class="pull-left ml-3 mb-3">
                  <h6>
                    <a href="/registro/register.html" class="link footer-link">Regístrate</a>
                    </h6>
                </div>
                <div class="pull-right mr-3 mb-3">
                  <h6>
                    <a href="/registro/resetpass.html" class="link footer-link">Reinicio Contraseña</a>
                  </h6>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
<!-- End Modal Login -->
    <!-- Navbar Loggeado Usuario -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/index.php" rel="tooltip" title="Promociona tu tienda o veterinaria con los mejores!" data-placement="bottom">
                    <span>D'Pelo</span> Studio
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse" id="navigation">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a>
                                D'Pelo •
                                <span> Studio </span>
                            </a>
                        </div>
                        <div class="col-6 collapse-close text-right">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="tim-icons icon-simple-remove"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav ml-auto">
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="far fa-building"></i> Servicios
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="#" class="dropdown-item">
                                <i class="tim-icons icon-paper"></i> Estudio Fotográfico
                            </a>
                            <a href="/blog/posts.php" class="dropdown-item">
                                <i class="tim-icons icon-bullet-list-67"></i>Pet Tips
                            </a>
                            <a href="/empresa/directorio.php" class="dropdown-item">
                                <i class="tim-icons icon-book-bookmark"></i>Directorio Veterinarias
                            </a>
                        </div>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="citas.php">
                            <i class="tim-icons icon-world"></i> Mis Citas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usuario/config.php">
                            <i class="tim-icons icon-settings-gear-63"></i> Configuración
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="../bd/salir.php">
                            <button class="btn btn-default btn-icon btn-round" type="button" data-toggle="tooltip" data-placement="bottom" title="" data-container="body" data-animation="true" data-original-title="Salir">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar Loggeado Usuario -->
    
  <div class="wrapper">
    <div class="squares square1"></div>
    <div class="squares square2"></div>
    <div class="squares square3"></div>
    <div class="squares square4"></div>
    <div class="squares square5"></div>
    <div class="squares square6"></div>
    <div class="page-header">
    <div class="page-header-image"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-12 mx-auto">
                <div id="square7" class="square square-7"></div>
                <div id="square8" class="square square-8"></div>
                <div class="col-md-12">
                <h2 style="color: #ffffff">Reprogramar</h2>
                    <div class="row">
                        <form class="form" action="updatecita.php" method="POST">
                        <div align="center">
                            <row>
                                <label> Fecha:
                                    <input type="text" name="fecha" class="form-control datepicker" value="" size="7" required>
                                </label>
                                <label> Hora:
                                    <input type="text" name="hora" class="form-control timepicker" value="" size="7" required>
                                </label>
                                <input type="hidden" name="id_cita" value="<?php echo $id_cita;?>">
                            </row>
                            <div align="center">
                                <button type="submit" class="btn btn-warning btn-round btn-lg btn-block">Enviar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
<!-- Footer Section -->
    <footer class="footer">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <h1 class="title">D'Pelo•Studio</h1>
          </div>
          <div class="col-md-3 col-6">
            <ul class="nav">
              <li class="nav-item">
                <a href="../index.php" class="nav-link">
                  Inicio
                </a>
              </li>
              <li class="nav-item">
                <a href="../dpelos/servicios.php" class="nav-link">
                  Servicios
                </a>
              </li>
              <li class="nav-item">
                <a href="../dpelos/conocenos.php" class="nav-link">
                  Conócenos
                </a>
              </li>
              <li class="nav-item">
                <a href="../dpelos/contactanos.php" class="nav-link">
                  Contáctanos
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-3 col-6">
            <ul class="nav">
              <li class="nav-item">
                <a href="" class="nav-link">
                  Pet Tips
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  Directorio Vets
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  Para Empresas
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  Terminos  y Condiciones
                </a>
              </li>
            </ul>
          </div>
          <div class="col-md-3">
            <h4 class="title">Síguenos:</h4>
           <ul class="social-buttons">
                <li>
                  <a href="https://twitter.com/" target="_blank" class="btn btn-icon btn-link btn-neutral">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.facebook.com/" target="_blank" class="btn btn-icon btn-neutral btn-link">
                    <i class="fab fa-facebook-square"></i>
                  </a>
                </li>
                <li>
                  <a href="https://www.instagram.com/" target="_blank" class="btn btn-icon btn-neutral btn-link">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              </ul>
          </div>
        </div>
      </div>
    </footer>
<!-- End Footer Section -->
  </div>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Plugin for the Carousel, full documentation here: http://kenwheeler.github.io/slick/ -->
  <script src="../assets/js/plugins/slick.js" type="text/javascript"></script>
  <!--  Plugin for the blob animation -->
  <script src="../assets/js/plugins/anime.min.js" type="text/javascript"></script>
  <!-- Chart JS -->
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
  <script src="../assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
  <script src="../assets/js/plugins/bootstrap-tagsinput.js"></script>
  <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
  <script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
  <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
  <script src="../assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
  <script src="../assets/js/plugins/jasny-bootstrap.min.js"></script>
  <!-- Black Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <!-- Control Center for Black UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <script src="../assets/js/blk-design-system-pro.min.js?v=1.0.0" type="text/javascript"></script>
  <script src="https://cdn.trackjs.com/agent/v3/latest/t.js"></script>
  <script>
    window.TrackJS &&
      TrackJS.install({
        token: "ee6fab19c5a04ac1a32a645abde4613a",
        application: "black-dashboard-pro"
      });
  </script>
</body>

</html>
