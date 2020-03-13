<?php
session_start();
include '../bd/bd.php';

try 
{
    #Variables desde Sesion
    $session_email = $_SESSION['email'];
    
    #Variables desde form
    
    #Variables hacia tabla 'informacion_empresa'
    
    if ( isset($_POST['email_nuevascitas']) ) 
    {
        $email_nuevascitas = "Si";
    } 
    else 
    { 
        $email_nuevascitas = "No";
    }

    if ( isset($_POST['email_nuevoscomentarios']) ) 
    {
        $email_nuevoscomentarios = "Si";
    } 
    else 
    { 
        $email_nuevoscomentarios = "No";
    }
    
    
    #Fin variables desde form
    
    $result = mysqli_query($conn, "SELECT u.nombre, u.email, ce.id_config_empresa, ce.citas, ce.email_nuevascitas, ce.email_nuevoscomentarios, ce.email_nuevascalificaciones, ce.notificaciones_push, ce.suspension_citas FROM usuario AS u INNER JOIN config_empresa AS ce ON u.id_usuario = ce.id_usuario WHERE u.email ='$session_email';");
    $row = mysqli_fetch_assoc($result);

    $id_config_empresa = $row['id_config_empresa'];

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE config_empresa SET email_nuevascitas='$email_nuevascitas', email_nuevoscomentarios='$email_nuevoscomentarios' WHERE id_config_empresa='$id_config_empresa';";

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
