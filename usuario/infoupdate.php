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
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $confirmaremail = $_POST['confirmaremail'];
    
    #Fin variables desde form
    
    $result = mysqli_query($conn, "SELECT * FROM usuario WHERE email ='$session_email';");
    $row = mysqli_fetch_assoc($result);
    
    $id_usuario = $row['id_usuario'];
    
    if ($email == $confirmaremail)
    {
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE usuario SET nombre='$nombre', email='$email', apellido='$apellido' WHERE id_usuario='$id_usuario';";

        if ($conn->query($sql) === TRUE) 
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
