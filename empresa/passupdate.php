<?php

session_start();
include '../bd/bd.php';

try 
{
    
    $email = $_SESSION['email'];
    $contrasenaactual = $_POST['contrasenaactual'];
    $contrasenanueva = $_POST['contrasenanueva'];
    $confirmarcontrasena = $_POST['confirmarcontrasena'];

    $result = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    $hash = $row['contrasena'];
    $id = $row['id_usuario'];
    
    if ($contrasenaactual == $hash)
    {
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE usuario SET contrasena='$contrasenanueva' WHERE id_usuario='$id'";

        if ($conn->query($sql) === TRUE) 
        {
            echo '<div class="alert alert-success">Contraseña Actualizada! </div>';
            header("Refresh: 3; url= config.php");
            
        } 
        
        else 
        {
            echo '<div class="alert alert-danger">No se pudo actualizar contraseña... </div>';
            header("Refresh: 3; url= config.php");
        }
        
        $conn->close();
    }
} 
catch (Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("Refresh: 3; url= config.php");
}
?>
