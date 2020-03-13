<?php
session_start();
include '../bd/bd.php';

try{
    
    $id_usuario = $_GET['id_usuario'];

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE informacion_empresa SET estado_membresia='Suspendida' WHERE id_usuario='$id_usuario';";

    if ($conn->query($sql) === TRUE) 
    {
        echo '<div class="alert alert-success">Membresia Suspendida! </div>';
        header("Refresh: 3; url= usuarios.php");
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
    header("Refresh: 3; url= usuarios.php");
}
?>
