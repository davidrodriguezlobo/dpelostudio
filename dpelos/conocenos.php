<?php
session_start();
include '../bd/bd.php';
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

<body class="account-settings">
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
                    <input type="password" class="form-control" name="contrasena" placeholder="Contraseña" required>
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
   <!-- Dynamic Navbar -->
   <?php
    
    //Dynamic Navbar
    
    $tipousuario = $_SESSION['tipousuario'];


    if ($tipousuario == "Admin")
    {
        echo '    <!-- Navbar Loggeado Admin  -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/index.php" rel="tooltip" title="Promociona tu tienda o veterinaria con los mejores!" data-placement="bottom">
                    <span>D\'Pelo</span> Studio
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
                                D\'Pelo •
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
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/dashboard.html">
                            <i class="tim-icons icon-world"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/publicaciones.php">
                            <i class="fas fa-book"></i> Publicaciones
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/usuarios.php">
                            <i class="tim-icons icon-single-02"></i> Usuarios
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/config.php">
                            <i class="tim-icons icon-settings-gear-63"></i> Mi Configuración
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
    <!-- End Navbar Loggeado Admin-->';
    }
    elseif ($tipousuario == "Empresa")
    {
        echo '    <!-- Navbar Loggeado Emoresa  -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/index.php" rel="tooltip" title="Promociona tu tienda o veterinaria con los mejores!" data-placement="bottom">
                    <span>D\'Pelo</span> Studio
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
                                D\'Pelo •
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
                        <a class="nav-link" href="/empresa/citas.php">
                            <i class="tim-icons icon-world"></i> Mis Citas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a target="_blank" class="nav-link" href="/empresa/perfil.php?empresa=<?php echo $id_usuario;?>">
    <i class="tim-icons icon-single-02"></i> Mi Perfil Público
    </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/empresa/config.php">
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
    <!-- End Navbar Loggeado Empresa -->';
    }

    elseif($tipousuario == "Usuario")
    {
    echo '    <!-- Navbar Loggeado Usuario -->
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/index.php" rel="tooltip" title="Promociona tu tienda o veterinaria con los mejores!" data-placement="bottom">
                    <span>D\'Pelo</span> Studio
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
                                D\'Pelo •
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
                        <a class="nav-link" href="/usuario/citas.php">
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
    <!-- End Navbar Loggeado Usuario -->';
    }

    else
    {
    echo '
    <!-- Public Navbar -->
    <nav class="navbar navbar-expand-lg  fixed-top navbar-absolute navbar-transparent " color-on-scroll="300">
        <div class="container">
            <div class="navbar-translate">
                <a class="navbar-brand" href="/index.php" rel="tooltip" title="Promociona tu tienda o veterinaria con los mejores!" data-placement="bottom">
                    <span>D\'Pelo</span> Studio
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
                                D\'Pelo •
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
                            <i class="far fa-building"></i> D\'Pelo Studio
                        </a>
                        <div class="dropdown-menu dropdown-with-icons">
                            <a href="/dpelos/servicios.php" class="dropdown-item">
                                <i class="tim-icons icon-paper"></i> Servicios
                            </a>
                            <a href="/dpelos/conocenos.php" class="dropdown-item">
                                <i class="tim-icons icon-bullet-list-67"></i>Conócenos
                            </a>
                            <a href="/dpelos/contactanos.php" class="dropdown-item">
                                <i class="tim-icons icon-book-bookmark"></i>Contáctanos
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <i class="fas fa-glasses"></i>
                            <p>PetTips</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/blog/posts.php">
                                <i class="fab fa-leanpub"></i> Todos Nuestros Tips
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-dog"></i> Perros
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-cat"></i> Gatos
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-otter"></i>Tortugas
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-paw"></i> Otros
                            </a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown">
                            <i class="fas fa-clinic-medical"></i>
                            <p>Directorio Vets</p>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/empresa/directorio.php">
                                <i class="tim-icons icon-bulb-63"></i> Directorio
                            </a>

                            <a href="#" class="dropdown-item dropdown-toggle" id="navbarDropdown2" data-toggle="dropdown">
                                <i class="tim-icons icon-book-bookmark" aria-hidden="true"></i> Para Empresas
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <a class="dropdown-item" href="">
                                    <i class="tim-icons icon-lock-circle"></i> ¿Cómo Funciona?
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="tim-icons icon-tablet-2"></i> Beneficios
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="tim-icons icon-tablet-2"></i> Registrate
                                </a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                            <i class="tim-icons icon-single-02"></i> Login
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Public Navbar -->';
    }

    ?>
    <!-- End Dynamic Navbar -->
    
  <div class="wrapper">
    <div class="section">
      <div class="container">
                    <div class="features features-5">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="featured-image">
                <img src="/assets/img/fotografo.jpg" alt="" >
              </div>
            </div>
            <div class="col-lg-6 mt-md-5">
              <h6 class="category">D'PeloStudio</h6>
              <h1 class="title">Valores</h1>
              <div class="row">
                <div class="col-lg-6 col-md-6">
                  <div class="info">
                    <h4 class="info-title">Confianza</h4>
                    <p class="description">Garantizamos a nuestros clientes la calidad de los servicios que ofrecemos, brindándoles una buena atención al cliente y un servicio inigualable.
</p>
                  </div>
                  <div class="info">
                    <h4 class="info-title">Pasión</h4>
                    <p class="description">Como amantes de las mascotas, el amor que le guardamos a cada una de nuestras mascotas es inigualable, es por eso que nosotros como D`pelostudios, tratamos de dar lo mejor de nosotros en cada área de trabajo.</p>
                  </div>
                </div>
                <div class="col-lg-6 col-md-6">
                  <div class="info">
                    <h4 class="info-title">Originalidad</h4>
                    <p class="description">somos una empresa única, con grandes ideas de las cuales buscamos plasmar, siendo las mascotas nuestras mayores inspiración.</p>
                  </div>
                  <div class="info">
                    <h4 class="info-title">Transformación</h4>
                    <p class="description"> D`pelostudio busca el bienestar de nuestros clientes y sus mascotas, por lo tanto siempre estaremos en busca de las mejores, para garantizar un buen servicio.</p>
                  </div>
                </div>
                <a class="btn btn-primary btn-link ml-4" href="/registro/register.html">
                  Unete a nuestra plataforma <i class="tim-icons icon-double-right"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
          <section>
  <div class="team-2">
        <div class="container">
          <div class="row">
            <div class="col-md-8 ml-auto mr-auto text-center">
              <h2 class="title">Conoce al Equipo</h2>
              <h4 class="description">“Nuestros compañeros perfectos nunca tienen menos de cuatro patas”</h4>
            </div>
          </div>
          <div align="center">
            <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-image">
                  <h4 class="title">Paola Orellana</h4>
                  <div class="dropdown">
                    <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown" aria-expanded="false">
                      <i class="tim-icons icon-settings-gear-63"></i>
                    </button>
                  </div>
                    <img class="img img-raised rounded" src="/assets/img/paola.png">
                </div>
                <div class="card-body">
                  <hr class="line-primary">
                  <h3 class="job-title">Fundadora</h3>
                  <div class="table-responsive">
                    <table class="table tablesorter " id="plain-table">
                      <tbody>
                        <tr>
                          <td class="text-left">
                            <i class="tim-icons icon-atom"></i> Skills
                          </td>
                          <td class="text-right">
                            Entusiasta, Dinámica, Creativa.
                          </td>
                        </tr>
                        <tr>
                          <td class="text-left">
                            <i class="tim-icons icon-user-run"></i> Hobbies
                          </td>
                          <td class="text-right">
                            Tiempo de calidad con mascotas, Fotografía, Nadadora.
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</section>          
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
                                <a href="/index.php" class="nav-link">
                                    Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dpelos/servicios.php" class="nav-link">
                                    Servicios
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dpelos/conocenos.php" class="nav-link">
                                    Conócenos
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dpelos/contactanos.php" class="nav-link">
                                    Contáctanos
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-6">
                        <ul class="nav">
                            <li class="nav-item">
                                <a href="/blog/posts.php" class="nav-link">
                                    Pet Tips
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/empresa/directorio.php" class="nav-link">
                                    Directorio Vets
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/dpelos/servicios..php" class="nav-link">
                                    Para Empresas
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    Terminos y Condiciones
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
