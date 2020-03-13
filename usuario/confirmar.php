<?php
session_start();
include '../bd/bd.php';

try
{
    
    $id_cita = $_GET['id_cita'];
    $estado = $_GET['estado'];

    if ($estado == "Esperando Confirmacion Empresa")
    {
        echo '<div class="alert alert-success">Se esta esperando confirmacion de la empresa! </div>';
        header("Refresh: 3; url= citas.php");
    }
    else
    {
        // Check connection
        if ($conn->connect_error) 
        {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "UPDATE citas SET estado='Confirmada' WHERE id_cita='$id_cita';";

        if ($conn->query($sql) === TRUE) 
        {
            echo '<div class="alert alert-success">Cita Confirmada! </div>';
            header("Refresh: 3; url= citas.php");
        } 
        else 
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
        }

}
catch (Exception $e) 
{
    echo 'Caught exception: ',  $e->getMessage(), "\n";
    header("Refresh: 3; url= citas.php");
}
?>
