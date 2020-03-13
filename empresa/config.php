<?php
session_start();
include '../bd/bd.php';

if(!isset($_SESSION['email'])){
    die(header("location: ../index.php"));
}

$email = $_SESSION['email'];
$session_id_usuario = $_SESSION['id_usuario'];

$result = mysqli_query($conn, "SELECT u.id_usuario
, u.nombre
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
, ie.estado_membresia
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
WHERE u.email ='$email';");
$row = mysqli_fetch_assoc($result);

$id_usuario = $row['id_usuario'];
$nombre = $row['nombre'];
$email = $row['email'];
$imagenperfil = $row['imagenperfil'];
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
$estado_membresia = $row['estado_membresia'];
$citas = $row['citas'];
$email_nuevascitas = $row['email_nuevascitas'];
$email_nuevoscomentarios = $row['email_nuevoscomentarios'];
$email_nuevascalificaciones = $row['email_nuevascalificaciones'];
$notificaciones_push = $row['notificaciones_push'];
$suspension_citas = $row['suspension_citas'];
$horario_entrada = $row['horario_entrada'];
$horario_salida = $row['horario_salida'];
$dias_laborales = $row['dias_laborales'];
$completion = 0;

if (strlen($nombre) > 0)
{
    $completion += 1;
}
if (strlen($email) > 0)
{
    $completion += 1;            
}
if (strlen($tipo_negocio) > 0)
{
    $completion += 1;
}
if (strlen($direccion_negocio) > 0)
{
    $completion += 1;            
}
if (strlen($ciudad_negocio) > 0)
{
    $completion += 1;            
}
if (strlen($telefono_negocio) > 0)
{
    $completion += 1;            
}
if (strlen($tags_negocio) > 0)
{
    $completion += 1;            
}
if (strlen($descripcion_negocio) > 0)
{
    $completion += 1;            
}
if (strlen($url_facebook) > 0)
{
    $completion += 1;            
}
if (strlen($url_instagram) > 0)
{
    $completion += 1;            
}
if (strlen($url_twitter) > 0)
{
    $completion += 1;            
}
if (strlen($url_sitio_web) > 0)
{
    $completion += 1;            
}
if (strlen($google_maps_iframe) > 0)
{
    $completion += 1;            
}

$num = ($completion / 13)*100;

$percentage = number_format($num, 2, '.', '');

$path1 = "../uploads/";
$path2 = "/";
$path = $path1.$session_id_usuario.$path2.$imagenperfil;

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
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <!-- CSS Files -->
    <link href="../assets/css/blk-design-system-pro.css?v=1.0.0" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/8da9dff42f.js" crossorigin="anonymous"></script>
</head>

<body class="account-settings">
    <!-- Navbar Loggeado  -->
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
    <!-- End Navbar Loggeado -->

    <div class="wrapper">
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="section">
                            <!-- User Information -->
                            <section class="text-center">
                                <img src="<?php echo $path ?>" alt="Raised circle image" class="img-fluid rounded-circle shadow-lg" style="width: 150px;">
                                <h3 class="title"><?php echo $nombre; ?></h3>
                            </section>
                            <!-- User Information -->
                            <!-- Profile Sidebar -->
                            <section>
                                <br>
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                                            <i class="tim-icons icon-single-02"></i> General
                                        </a>
                                    </li>
                                    <hr class="line-primary">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                            <i class="tim-icons icon-settings-gear-63"></i> Configuración
                                        </a>
                                    </li>
                                    <hr class="line-primary">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link3" role="tablist">
                                            <i class="tim-icons icon-lock-circle"></i> Seguridad
                                        </a>
                                    </li>
                                    <hr class="line-primary">
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#link4" role="tablist">
                                            <i class="tim-icons icon-volume-98"></i> Perfil Público
                                        </a>
                                    </li>
                                </ul>
                            </section>
                            <!-- End Profile Sidebar -->
                            <!-- Profile Completion -->
                            <br>
                            <br>
                            <br>
                            <section>

                                <div class="progress-container progress-primary">

                                    <span class="progress-badge">Membresia D'Pelos: </span> &nbsp&nbsp
                                    <span class="badge badge-success" data-toggle="tooltip" data-placement="top" title="" data-container="body" data-animation="true" data-original-title="Puedes solicitar una actualización en dpelostudio@gmail.com"><?php echo $estado_membresia;?></span>
                                </div>
                            </section>
                            <hr class="line-primary">
                            <section>
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">Informacion de Perfil</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $percentage; ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $percentage; ?>%;">
                                            <span class="progress-value"><?php echo $percentage; ?>%</span>
                                        </div>
                                    </div>
                                </div>
                            </section>
                            <!-- End Profile Completion -->
                        </div>
                    </div>
                    <div class="col-md-8 ml-auto">
                        <div class="section">
                            <div class="tab-content">
                                <div class="tab-pane active" id="link1">
                                    <div>

                                        <header>
                                            <h2 class="text-uppercase">Informacion General</h2>
                                        </header>
                                        <hr class="line-primary">
                                        <br>
                                        <form action="infoupdate.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#nombre">Empresa</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="nombre" name="nombre" class="form-control" type="text" value="<?php echo $nombre; ?>" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels">Tipo</label>
                                                </div>
                                                <div class="col-md-4 align-self-center">
                                                    <div class="form-group">
                                                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Single Select" name="tipo_negocio">
                                                            <option disabled <?php if ($tipo_negocio != "Veterinaria" && $tipo_negocio != "Tienda") { echo 'selected';} ?>>-</option>
                                                            <option value="Veterinaria" <?php if ($tipo_negocio == "Veterinaria") { echo 'selected';} ?>>Veterinaria</option>
                                                            <option value="Tienda" <?php if ($tipo_negocio == "Tienda") { echo 'selected';} ?>>Tienda de Productos</option>
                                                            <option value="Tienda y Veterinaria" <?php if ($tipo_negocio == "Tienda y Veterinaria") { echo 'selected';} ?>>Tienda y Veterinaria</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#email">Email</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="email" name="email" class="form-control" type="email" value="<?php echo $email; ?>" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#confirmEmail">Confirmar Email</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="confirmEmail" name="confirmaremail" class="form-control" type="email" value="<?php echo $email; ?>" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#direccion">Dirección</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="direccion" name="direccion_negocio" class="form-control" type="text" value="<?php echo $direccion_negocio; ?>" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#ciudad">Ciudad</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="ciudad" name="ciudad_negocio" class="form-control" type="text" value="<?php echo $ciudad_negocio; ?>" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#telefono">Teléfono</label>
                                                </div>
                                                <div class="col-md-4 align-self-center">
                                                    <div class="form-group">
                                                        <input id="telefono" name="telefono_negocio" class="form-control" type="tel" value="<?php echo $telefono_negocio; ?>" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels">TAGS</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <input type="text" value="<?php echo $tags_negocio; ?>" name="tags_negocio" class="tagsinput" data-role="tagsinput" data-color="danger" />
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                                                    <button class="btn btn-primary btn-simple" type="reset">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                        <br><br>
                                        <header>
                                            <h2 class="text-uppercase">Imagen de Perfil</h2>
                                        </header>
                                        <hr class="line-primary">
                                        <br>
                                        <form enctype="multipart/form-data" action="upload.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#nombre">Subir imagen: </label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div>
                                                        <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                                                        <input id="userfile" name="userfile" type="file" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary" type="submit">Subir Imagen</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <div class="tab-pane" id="link2">
                                    <div class="g-pos-rel h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-30--md">
                                        <header>
                                            <h2 class="text-uppercase">Configuración de Perfil</h2>
                                        </header>
                                        <hr class="line-primary">
                                        <form action="configupdate.php" method="POST">
                                            <div class="form-group d-flex align-items-center justify-content-between">
                                                <span>
                                                    <font color="white"> Necesito programar citas con clientes?</font>
                                                </span>
                                                <input type="checkbox" name="citas" class="bootstrap-switch" data-on-label="ON" data-off-label="OFF" <?php if ($citas == "Si") { echo 'checked';} ?> />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between">
                                                <span>Notificaciones por email: <font color="white"> Nuevas citas.</font></span>
                                                <input type="checkbox" name="email_nuevascitas" class="bootstrap-switch" data-on-label="ON" data-off-label="OFF" <?php if ($email_nuevascitas == "Si") { echo 'checked';} ?> />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between">
                                                <span>Notificaciones por email: <font color="white"> Nuevos comentarios.</font></span>
                                                <input type="checkbox" name="email_nuevoscomentarios" class="bootstrap-switch" data-on-label="ON" data-off-label="OFF" <?php if ($email_nuevoscomentarios == "Si") { echo 'checked';} ?> />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between">
                                                <span>Notificaciones por email: <font color="white"> Nuevas calificaciones.</font></span>
                                                <input type="checkbox" name="email_nuevascalificaciones" class="bootstrap-switch" data-on-label="ON" data-off-label="OFF" <?php if ($email_nuevascalificaciones == "Si") { echo 'checked';} ?> />
                                            </div>
                                            <div class="form-group d-flex align-items-center justify-content-between">
                                                <span>
                                                    <font color="white"> Notificaciones emergentes.</font>
                                                </span>
                                                <input type="checkbox" name="notificaciones_push" class="bootstrap-switch" data-on-label="ON" data-off-label="OFF" <?php if ($notificaciones_push == "Si") { echo 'checked';} ?> />
                                            </div>
                                            <br>
                                            <br>
                                            <header>
                                                <h2 class="text-uppercase g-font-size-12 g-font-size-default--md g-color-black mb-0">Configuracion de mi Calendario</h2>
                                            </header>
                                            <hr class="line-primary">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" name="suspension_citas" <?php if ($suspension_citas == "Si") { echo 'checked';} ?>>
                                                            <span class="form-check-sign"></span>
                                                            Suspender creacion de nuevas citas.
                                                        </label>
                                                        <br>
                                                        <br>
                                                    </div>
                                                </div>
                                            </div>





                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="datepicker-container">
                                                        <label class="form-check-label">
                                                            Horario Entrada
                                                            <br><br>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control timepicker" value="<?php echo strlen($horario_entrada);?>" name="horario_entrada" format="LT">
                                                            </div>
                                                        </label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label class="form-check-label">
                                                        Horario Salida
                                                        <br><br>
                                                        <div class="form-group">
                                                            <input type="text" class="form-control timepicker" value="<?php echo $horario_salida;?>" name="horario_salida" format="LT">
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>

                                            <div class="row">

                                                <div class="col-md-6">
                                                    <label>Días laborales:</label>
                                                    <div class="form-group">
                                                        <select class="selectpicker" data-size="7" data-style="btn btn-primary" title="Dias Laborales" name="dias_laborales">
                                                            <option disabled>Días de atención</option>
                                                            <option value="Lunes - Viernes" <?php if ($dias_laborales == "Lunes - Viernes") { echo 'selected';} ?>>Lunes - Viernes</option>
                                                            <option value="Lunes - Sabado" <?php if ($dias_laborales == "Lunes - Sabado") { echo 'selected';} ?>>Lunes - Sabado</option>
                                                            <option value="Lunes - Domingo" <?php if ($dias_laborales == "Lunes - Domingo") { echo 'selected';} ?>>Lunes - Domingo</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                                                    <button class="btn btn-primary btn-simple" type="reset">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane" id="link3">
                                    <div class="g-pos-rel h-100 g-brd-around g-brd-gray-light-v7 g-rounded-4 g-pa-15 g-pa-30--md">
                                        <header>
                                            <h2 class="text-uppercase">Cambiar Contraseña</h2>
                                        </header>
                                        <hr class="line-primary">
                                        <br>
                                        <form action="passupdate.php" method="POST" onsubmit="return checkEmail(this);">
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#contrasenaactual">Contraseña Actual</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="contrasenaactual" name="contrasenaactual" class="form-control" type="password" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#contrasenanueva">Nueva Contraseña</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="contrasenanueva" name="contrasenanueva" class="form-control" type="password" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#confirmarcontrasena">Confirmar Contraseña</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="confirmarcontrasena" name="confirmarcontrasena" class="form-control" type="password" required="required">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                                                    <button class="btn btn-primary btn-simple" type="reset">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>



                                </div>
                                <div class="tab-pane" id="link4">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="alert alert-primary text-small" role="alert">
                                                    <i class="icon-shield"></i>
                                                    <span>
                                                        En esta sección puede configurar la información que se mostrará en su perfil público en el sistema. TODOS ESTOS CAMPOS SON OPCIONALES, PERO ALTAMENTE RECOMENDADOS.
                                                    </span>
                                                </div>
                                            </div>
                                            <!--end of col-->
                                        </div>
                                        <hr>

                                        <header>
                                            <h2 class="text-uppercase">Datos del Perfil</h2>
                                        </header>
                                        <hr class="line-primary">
                                        <br>
                                        <form action="perfilupdate.php" method="POST">
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#descripcion_negocio"> Descripción de la Empresa</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="descripcion_negocio" rows="4" cols="80" placeholder="Describe tu empresa."><?php echo $descripcion_negocio; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#url_facebook">URL Facebook</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="email" name="url_facebook" class="form-control" type="text" value="<?php echo $url_facebook; ?>" placeholder="https://www.facebook.com/dpelos/">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#url_instagram">URL Instagram</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="confirmEmail" name="url_instagram" class="form-control" type="text" value="<?php echo $url_instagram; ?>" placeholder="https://www.instagram.com/dpelos/">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#url_twitter">URL Twitter</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="location" name="url_twitter" class="form-control" type="text" value="<?php echo $url_twitter; ?>" placeholder="https://twitter.com/dpelos">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#url_sitio_web">URL Sitio Web</label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <input id="location" name="url_sitio_web" class="form-control" type="text" value="<?php echo $url_sitio_web; ?>" placeholder="Opcional">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 align-self-center">
                                                    <label class="labels" for="#google_maps_iframe"><a href="https://support.google.com/maps/answer/144361" target="_blank">Insertar Mapa de Google Maps (Embed Code)</a></label>
                                                </div>
                                                <div class="col-md-9 align-self-center">
                                                    <div class="form-group">
                                                        <textarea class="form-control" name="google_maps_iframe" rows="4" cols="80" placeholder="iFrame Source."><?php echo $google_maps_iframe; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mt-4">
                                                <div class="col-md-6">
                                                    <button class="btn btn-primary" type="submit">Guardar Cambios</button>
                                                    <button class="btn btn-primary btn-simple" type="reset">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                        <!--end of row-->
                                    </div>
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
    <script type="text/javascript" language="JavaScript">
        function checkEmail(theForm) {
            if (theForm.contrasenanueva.value != theForm.confirmarcontrasena.value) {
                alert('Contraseñas no concuerdan!');
                return false;
            } else {
                return true;
            }
        }

    </script>
    <script>
        //document.getElementById('nombre').scrollIntoView()

    </script>
</body>

</html>
