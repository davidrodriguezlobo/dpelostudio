<?php
session_start();
include '../bd/bd.php';

try {
    
    $id_cita = $_GET['id_cita'];

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE citas SET estado='Cancelada' WHERE id_cita='$id_cita';";

    if ($conn->query($sql) === TRUE) 
    {
        echo 'Cita Cancelada!';
        header("Refresh: 3; url= citas.php");
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
