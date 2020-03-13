<?php

session_start();
include '../bd/bd.php';

if(!isset($_GET['empresa'])){
    die(header("location: /empresa/directorio.php"));
}


$id_empresa = $_GET['empresa'];

if(isset($_SESSION['id_usuario'])){
    $id_usuario = $_SESSION['id_usuario'];
}


$result = mysqli_query($conn, "SELECT u.nombre
, u.email
, u.imagenperfil
, ie.tipo_negocio
, ie.direccion_negocio
, ie.ciudad_negocio
, ie.telefono_negocio
, ie.tags_negocio
, ie.descripcion_negocio
, ie.url_facebook
, ie.url_instagram
, ie.url_twitter
, ie.url_sitio_web
, ie.google_maps_iframe
, ce.citas
, ce.email_nuevascitas
, ce.email_nuevoscomentarios
, ce.email_nuevascalificaciones
, ce.notificaciones_push
, ce.suspension_citas
, ce.max_clientes
, ce.horario_entrada
, ce.horario_salida
, ce.dias_laborales
FROM usuario AS u
INNER JOIN informacion_empresa AS ie 
ON u.id_usuario = ie.id_usuario 
INNER JOIN config_empresa AS ce
ON u.id_usuario = ce.id_usuario 
WHERE u.id_usuario ='$id_empresa';");
$row = mysqli_fetch_assoc($result);

$nombre = $row['nombre'];
$email = $row['email'];
$tipo_negocio = $row['tipo_negocio'];
$direccion_negocio = $row['direccion_negocio'];
$ciudad_negocio = $row['ciudad_negocio'];
$telefono_negocio = $row['telefono_negocio'];
$tags_negocio = $row['tags_negocio'];
$descripcion_negocio = $row['descripcion_negocio'];
$url_facebook = $row['url_facebook'];
$url_instagram = $row['url_instagram'];
$url_twitter = $row['url_twitter'];
$url_sitio_web = $row['url_sitio_web'];
$google_maps_iframe = $row['google_maps_iframe'];
$citas = $row['citas'];
$email_nuevascitas = $row['email_nuevascitas'];
$email_nuevoscomentarios = $row['email_nuevoscomentarios'];
$email_nuevascalificaciones = $row['email_nuevascalificaciones'];
$notificaciones_push = $row['notificaciones_push'];
$suspension_citas = $row['suspension_citas'];
$max_clientes = $row['max_clientes'];
$horario_entrada = $row['horario_entrada'];
$horario_salida = $row['horario_salida'];
$dias_laborales = $row['dias_laborales'];

if(empty($row['imagenperfil']))
{
    $path = "../assets/img/placeholder.jpg";
}
else
{
    $imagenperfil = $row['imagenperfil'];
    $path1 = "../uploads/";
    $path2 = "/";
    $path = $path1.$id_empresa.$path2.$imagenperfil;

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
    <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
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
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/blk-design-system-pro.css?v=1.0.0" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8da9dff42f.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            var comentarioCount = 2;
            $("#btn").click(function() {
                comentarioCount = comentarioCount + 2;
                $("#comentarios").load("load-comentarios.php", {comentarioNewCount: comentarioCount, idEmpresa: '<?php echo $id_empresa; ?>'});
            });
        });

    </script>
</head>

<body class="profile-page">
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
    <!-- Modal Citas -->
    <div class="modal fade modal-mini modal-primary modal-mini" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header justify-content-center">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="tim-icons icon-simple-remove text-white"></i>
                    </button>
                    <div class="modal-profile">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="modal-body">
                    <p>Crea tu cita con nosotros</p>
                    <form class="form" action="cita.php" method="POST">
                        <div align="center">
                            <row>
                                <label> Fecha:
                                    <input type="text" name="fecha" class="form-control datepicker" value="" size="7" required>
                                </label>
                                <label> Hora:
                                    <input type="text" name="hora" class="form-control timepicker" value="" size="7" required>
                                </label>
                            </row>
                            <row>
                                <label>Comentarios:
                                    <textarea class="form-control" name="mensaje" id="mensaje"></textarea>
                                </label>
                            </row>
                            <row>
                                <label>Telefono:
                                    <input type="tel" name="telefono" class="form-control" value="" required> </label>
                            </row>
                            <input type="hidden" name="id_empresa" value="<?php echo $id_empresa;?>">
                            <input type="hidden" name="id_usuario" value="<?php echo $id_usuario;?>">
                            <input type="hidden" name="email" value="<?php echo $email;?>">
                            <br>
                            <button class="btn btn-neutral btn-icon btn-round" type="submit">
                                <i class="fas fa-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <p>Cita se confirmará vía email.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Citas -->

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
        <div class="page-header">
            <img src="../assets/img/path4.png" class="path">
            <div class="container align-items-center">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <h1 class="profile-title text-left"><?php echo $nombre;?></h1>
                        <h5 class="text-on-back">01</h5>
                        <p class="profile-description"><?php echo $descripcion_negocio;?></p>
                        <div class="btn-wrapper profile pt-3">
                            <a target="_blank" href="<?php echo $url_instagram;?>" class="btn btn-icon btn-instagram btn-round" data-toggle="tooltip" data-original-title="Siguenos!">
                                <i class="fab fa-instagram"></i>
                            </a>
                            <a target="_blank" href="<?php echo $url_facebook;?>" class="btn btn-icon btn-facebook btn-round" data-toggle="tooltip" data-original-title="Danos Like!">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                            <a target="_blank" href="<?php echo $url_twitter;?>" class="btn btn-icon btn-twitter btn-round" data-toggle="tooltip" data-original-title="Siguenos!">
                                <i class="fab fa-twitter"></i>
                            </a>

                            <a target="_blank" href="<?php echo $url_sitio_web;?>" class="btn btn-icon btn-dribbble  btn-round" data-toggle="tooltip" data-original-title="Visitanos!">
                                <i class="fas fa-globe"></i>
                            </a>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ml-auto mr-auto">
                        <div class="card card-coin card-plain">
                            <div class="card-header">
                                <img src="<?php echo $path;?>" class="img-center img-fluid rounded-circle">
                                <h4 class="title">Información General</h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs nav-tabs-primary justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#linka">
                                            Horarios
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content tab-subcategories">
                                    <div class="tab-pane active" id="linka">
                                        <div class="table-responsive">
                                            <p>Con gusto te atenderemos <b class="text-success"><?php echo $dias_laborales;?></b> desde las <b class="text-success"><?php echo $horario_entrada;?></b> hasta las <b class="text-success"><?php echo $horario_salida;?></b>!</p>
                                            <br>
                                            <div align="center">
                                                <button class="btn btn-primary mr-3" data-toggle="modal" <?php if(isset($_SESSION['id_usuario']))
                                                {
                                                   echo 'data-target="#myModal1"';
                                                }
                                                else
                                                {
                                                    echo 'data-target="#loginModal"';
                                                }
                                                
                                                ?>> <i class="fas fa-clock"></i> Has tu cita!
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-md-6">
                        <div align="center">
                        <?php
                            $ratings = $conn->query(
                                "SELECT AVG(calificacion) AS CalificacionPromedio " .
                                "FROM comentarios WHERE id_empresa = '" . $id_empresa . "'");
                            $data = $ratings->fetch_assoc();
                            $avg = $data['CalificacionPromedio'];
                            $avg_fixed = number_format((float)$avg, 2, '.', '');
                        ?>
                        <h3>Calificacion Promedio: <i class="far fa-star"></i> <?php echo $avg_fixed;?></h3>
                        </div>
                        <div class="row justify-content-between align-items-center">
                        <div class="media-area" id="comentarios">
                        

                        <?php
                            $sql1 = "SELECT nombre, apellido, imagenperfil, id_comentario, id_empresa, c.id_usuario, comentario, calificacion, timestamp 
                            FROM comentarios AS c
                            INNER JOIN usuario AS u
                            ON c.id_usuario = u.id_usuario
                            WHERE id_empresa = $id_empresa 
                            ORDER BY id_comentario DESC
                            LIMIT 2;";

                            $result1 = mysqli_query($conn,$sql1);

                            if (mysqli_num_rows($result1) > 0)
                            {
                                while ($row1 = mysqli_fetch_assoc($result1))
                                {
                                    $myid_usuario = $row1['id_usuario'];

                                    if(empty($row1['imagenperfil']))
                                    {
                                        $mypath = "../assets/img/placeholder.jpg";
                                    }
                                    else
                                    {
                                        $myimagenperfil = $row1['imagenperfil'];
                                        $mypath1 = "../uploads/";
                                        $mypath2 = "/";
                                        $mypath = $mypath1.$myid_usuario.$mypath2.$myimagenperfil;
    
                                    }

                                    $mynombre = $row1['nombre']." ".$row1['apellido'];

                                    echo '
                                    <div class="media" >
                                    <a class="pull-left" href="javascript:;">
                                    <div class="avatar">
                                        <img class="media-object img-raised" src="'.$mypath.'" alt="...">
                                    </div>
                                </a>
                                <div class="media-body">
                                    <h5 class="media-heading">'.$mynombre.'
                                        <small class="text-muted">· '.$row1['timestamp'].'</small>
                                    </h5>
                                    <p>'.$row1['comentario'].'</p>
                                    <div class="media-footer">
                                    <p class="btn btn-danger btn-link pull-right">
                                    <i class="far fa-star"></i> '.$row1['calificacion'].'
                                    </p>
                                    </div>
                                </div>
                                </div>
                                    ';
                                }
                            }
                            else
                            {
                                echo '<h4>Aun no tenemos comentarios para esta empresa...</h4>';
                            }
                        ?>
                    </div>
                    </div>
                    <div align="center">
                        <button id='btn' class="btn btn-primary btn-simple btn-round">Más Comentarios!</button>
                    </div>
                    </div>
                    <div class="col-md-6">
                        <h1 class="profile-title text-left">Comparte Tu Experiencia</h1>
                        <h5 class="text-on-back">02</h5>

                    <?php

                        if(isset($_SESSION['id_usuario']))
                        {
                            echo '
                            <div class="media media-post">
                            <a class="pull-left author" href="javascript:;">
                              <div class="avatar">
                                <img class="media-object img-raised" alt="64x64" src="'.$mypath.'">
                              </div>
                            </a>
                            <div class="media-body">
                            <form method="POST" action="comentario.php">
                                    <textarea class="form-control" placeholder="Comenta tu experiencia con el establecimiento..." rows="6" name="comentario"></textarea>
                                    <div class="row">
                                  <p class="category">Evalúanos: </p>
                                  <br><br>
                                  &nbsp;&nbsp;
                                  <input type="hidden" name="id_empresa" value="'.$id_empresa.'">
                                  <input type="hidden" name="id_usuario" value="'.$id_usuario.'">
                                  <input type="hidden" name="email" value="'.$email.'">
                                  <div class="form-check form-check-radio">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="calificacion" value="5">
                                          <span class="form-check-sign"></span>
                                          5 <i class="far fa-star"></i>&nbsp;
                                      </label>
                                  </div>
                                  &nbsp;&nbsp;
                                  <div class="form-check form-check-radio">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="calificacion" value="4">
                                          <span class="form-check-sign"></span>
                                          4 <i class="far fa-star"></i>
                                      </label>
                                  </div>
                                  &nbsp;&nbsp;
                                  <div class="form-check form-check-radio">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="calificacion" value="3" checked="">
                                          <span class="form-check-sign"></span>
                                          3 <i class="far fa-star"></i>
                                      </label>
                                  </div>
                                  &nbsp;&nbsp;
                                  <div class="form-check form-check-radio">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="calificacion" value="2">
                                          <span class="form-check-sign"></span>
                                          2 <i class="far fa-star"></i>
                                      </label>
                                  </div>
                                  &nbsp;&nbsp;
                                  <div class="form-check form-check-radio">
                                      <label class="form-check-label">
                                          <input class="form-check-input" type="radio" name="calificacion" value="1">
                                          <span class="form-check-sign"></span>
                                          1 <i class="far fa-star"></i>
                                      </label>
                                  </div>
                              </div>
                                    <div class="media-footer">
                                    <button type="submit" class="btn btn-primary btn-round float-right" rel="tooltip" data-original-title="Gracias por tus comentarios!" data-placement="down">Enviar</button>
                                    </div>
                                    </form>
                                    </div>
                          </div>
                            ';
                        }
                        else
                        {
                            echo '
                            <div align="center">
                            <h4>Debes ingresar para poder publicar una calificacion...</h4>
                            <br>
                            <button class="btn btn-primary" data-toggle="modal" data-target="#loginModal">
                            <i class="tim-icons icon-single-02"></i> Login
                            </button>
                            </div>
                            ';
                        }

                    ?>
                    </div>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-plain">
                            <div class="card-header">
                                <h1 class="profile-title text-left">Contáctanos</h1>
                                <h5 class="text-on-back">03</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tu nombre</label>
                                                <input type="text" class="form-control" value="" placeholder="Michael Jackson">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tu email</label>
                                                <input type="email" class="form-control" placeholder="mike@email.com">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Tu mensaje</label>
                                                <input type="text" class="form-control" placeholder="Cuentanos cómo estás!">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-round float-right" rel="tooltip" data-original-title="Can't wait for your message" data-placement="right">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 ml-auto">
                        <div class="info info-horizontal">
                            <div class="icon icon-primary">
                                <i class="tim-icons icon-square-pin"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Visítanos</h4>
                                <p> <?php echo $direccion_negocio;?>
                                    <br> <?php echo $ciudad_negocio;?>
                                    <br> El Salvador
                                </p>
                            </div>
                        </div>
                        <div class="info info-horizontal">
                            <div class="icon icon-primary">
                                <i class="tim-icons icon-mobile"></i>
                            </div>
                            <div class="description">
                                <h4 class="info-title">Llámanos</h4>
                                <p> <?php echo $nombre;?>
                                    <br> <?php echo $telefono_negocio;?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
