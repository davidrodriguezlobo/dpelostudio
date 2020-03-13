<?php
session_start();
include '../bd/bd.php';

try 
{
    #Variables desde Sesion
    $session_email = $_SESSION['email'];
    
    #Variables desde form
    
    #Variables hacia tabla 'informacion_empresa'
    if ( isset($_POST['citas']) ) 
    {
        $citas = "Si";
    } 
    else 
    { 
        $citas = "No";
    }
    
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
    
    if ( isset($_POST['email_nuevascalificaciones']) ) 
    {
        $email_nuevascalificaciones = "Si";
    } 
    else 
    { 
        $email_nuevascalificaciones = "No";
    }
        
    if ( isset($_POST['notificaciones_push']) ) 
    {
        $notificaciones_push = "Si";
    } 
    else 
    { 
        $notificaciones_push = "No";
    }
    
    if ( isset($_POST['suspension_citas']) ) 
    {
        $suspension_citas = "Si";
    } 
    else 
    { 
        $suspension_citas = "No";
    }
    
    $horario_entrada = $_POST['horario_entrada'];
    $horario_salida = $_POST['horario_salida'];
    $dias_laborales = $_POST['dias_laborales'];
    
    #Fin variables desde form
    
    $result = mysqli_query($conn, "SELECT u.nombre, u.email, ce.id_config_empresa, ce.citas, ce.email_nuevascitas, ce.email_nuevoscomentarios, ce.email_nuevascalificaciones, ce.notificaciones_push, ce.suspension_citas FROM usuario AS u INNER JOIN config_empresa AS ce ON u.id_usuario = ce.id_usuario WHERE u.email ='$session_email';");
    $row = mysqli_fetch_assoc($result);

    $id_config_empresa = $row['id_config_empresa'];

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE config_empresa SET citas='$citas', email_nuevascitas='$email_nuevascitas', email_nuevoscomentarios='$email_nuevoscomentarios', email_nuevascalificaciones='$email_nuevascalificaciones', notificaciones_push='$notificaciones_push', suspension_citas='$suspension_citas', horario_entrada='$horario_entrada', horario_salida='$horario_salida', dias_laborales='$dias_laborales' WHERE id_config_empresa='$id_config_empresa';";

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
