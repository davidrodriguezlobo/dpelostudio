<?php
session_start();
include '../bd/bd.php';


$id_usuario = $_POST['id_usuario'];
$id_empresa = $_POST['id_empresa'];
$var = $_POST['fecha'];
$hora = $_POST['hora'];
$mensaje = $_POST['mensaje'];
$telefono = $_POST['telefono'];


$date = str_replace('/"', '-', $var);
$fecha = date("Y/m/d", strtotime($date));  


$sql = "INSERT INTO citas (id_usuario, id_empresa, fecha, hora, mensaje, telefono) VALUES ('$id_usuario', '$id_empresa', '$fecha', '$hora', '$mensaje', '$telefono')";
    
if ($conn->query($sql) === TRUE) 
{
    echo '<script language="javascript">';
    echo 'alert("Cita Creada! Te confirmaremos la misma via email.")';
    echo '</script>';
    header("refresh:0.1 ;url=/empresa/perfil.php?empresa=$id_empresa");
}

?>
