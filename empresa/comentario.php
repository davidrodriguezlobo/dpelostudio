<?php
session_start();
include '../bd/bd.php';


$id_usuario = $_POST['id_usuario'];
$id_empresa = $_POST['id_empresa'];
$calificacion = $_POST['calificacion'];
$comentario1 = $_POST['comentario'];
$email = $_POST['email'];

$comentario = mysqli_real_escape_string($conn,  $comentario1);

$titulo = "Has recibido una nueva evaluacion!";
$texto1 = "Has recibido una nueva evaluacion!";
$texto2 = "Te informamos que has recibido una nueva evaluacion, revisa el comentario por medio del siguiente enlace.";
$referer = "/empresa/perfil.php?empresa=".$id_empresa;


$sql = "INSERT INTO comentarios (id_empresa, id_usuario, comentario, calificacion) VALUES ('$id_empresa', '$id_usuario', '$comentario', '$calificacion')";
    
if ($conn->query($sql) === TRUE) 
{
    header("refresh:0.1 ;url=/email/nuevocomentario.php?titulo=$titulo&texto1=$texto1&texto2=$texto2&email=$email&referer=$referer");
}


?>
