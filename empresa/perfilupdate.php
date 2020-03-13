<?php

session_start();
include '../bd/bd.php';

try 
{
    #Variables desde Sesion
    $session_email = $_SESSION['email'];
    
    #Variables desde form
    
    #Variables hacia tabla 'informacion_empresa'
    $descripcion_negocio = $_POST['descripcion_negocio'];
    $url_facebook = $_POST['url_facebook'];
    $url_instagram = $_POST['url_instagram'];
    $url_twitter = $_POST['url_twitter'];
    $url_sitio_web = $_POST['url_sitio_web'];
    $google_maps_iframe = $_POST['google_maps_iframe'];
    
    $descripcion_negocio = mysqli_real_escape_string($conn,  $descripcion_negocio);
    
    #Fin variables desde form
    
    $result = mysqli_query($conn, "SELECT * FROM usuario INNER JOIN informacion_empresa ON usuario.id_usuario = informacion_empresa.id_usuario WHERE usuario.email ='$session_email';");
    $row = mysqli_fetch_assoc($result);

    $id_info_empresa = $row['id_info_empresa'];

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE informacion_empresa SET descripcion_negocio='$descripcion_negocio', url_facebook='$url_facebook', url_instagram='$url_instagram', url_twitter='$url_twitter', url_sitio_web='$url_sitio_web', google_maps_iframe='$google_maps_iframe' WHERE id_info_empresa='$id_info_empresa';";

    if ($conn->query($sql) === TRUE) 
    {
        echo '<div class="alert alert-success">Datos actualizados! </div>';
        header("Refresh: 3; url= config.php");
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}
catch (Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("Refresh: 3; url= config.php");
}
?>
