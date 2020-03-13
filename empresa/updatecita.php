<?php
session_start();
include '../bd/bd.php';

try{
    
    $id_cita = $_POST['id_cita'];
    $var = $_POST['fecha'];
    $date = str_replace('/"', '-', $var);
    $fecha = date("Y/m/d", strtotime($date));  
    $hora = $_POST['hora'];

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE citas SET estado='Esperando Confirmacion Cliente', fecha='$fecha', hora='$hora' WHERE id_cita='$id_cita';";

    if ($conn->query($sql) === TRUE) 
    {
        echo '<div class="alert alert-success">Cita actualizada! Le confirmaremos por correo electronico.</div>';
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