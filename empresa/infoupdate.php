<?php

session_start();
include '../bd/bd.php';

try 
{
    #Variables desde Sesion
    $session_email = $_SESSION['email'];
    
    #Variables desde form
    
    #Variables hacia tabla 'usuario'
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $confirmaremail = $_POST['confirmaremail'];
    
    #Variables hacia tabla 'informacion_empresa'
    $tipo_negocio = $_POST['tipo_negocio'];
    $direccion_negocio = $_POST['direccion_negocio'];
    $ciudad_negocio = $_POST['ciudad_negocio'];
    $telefono_negocio = $_POST['telefono_negocio'];
    $tags_negocio = $_POST['tags_negocio'];
    
    #Fin variables desde form
    
    $result = mysqli_query($conn, "SELECT * FROM usuario INNER JOIN informacion_empresa ON usuario.id_usuario = informacion_empresa.id_usuario WHERE usuario.email ='$session_email';");
    $row = mysqli_fetch_assoc($result);
    
    $id_usuario = $row['id_usuario'];
    $id_info_empresa = $row['id_info_empresa'];
    
    if ($email == $confirmaremail)
    {
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE usuario SET nombre='$nombre', email='$email' WHERE id_usuario='$id_usuario';";
        $sql .= "UPDATE informacion_empresa SET tipo_negocio='$tipo_negocio', direccion_negocio='$direccion_negocio', ciudad_negocio='$ciudad_negocio', telefono_negocio='$telefono_negocio', tags_negocio='$tags_negocio' WHERE id_info_empresa='$id_info_empresa';";

        if ($conn->multi_query($sql) === TRUE) 
        {
            echo '<div class="alert alert-success">Datos actualizados! </div>';
            header("Refresh: 3; url= config.php");
            $_SESSION["email"]=$email;
        } 
        else 
        {
            echo "Error: Correo Duplicado.";
            header("Refresh: 3; url= config.php");
        }

        $conn->close();
    }
    else
    {
        echo '<div class="alert alert-danger">Las direcciones de correo no concuerdan...</div>';
        header("Refresh: 3; url= config.php");
    }
} 
catch (Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("Refresh: 3; url= config.php");
}
?>
