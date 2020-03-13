<?php
session_start();
include '../bd/bd.php';

try {
    
    $id_cita = $_GET['id_cita'];
    $id_empresa = $_GET['id_empresa'];
    $email = $_GET['email'];

    $titulo = "Una de tus citas ha sido cancelada.";
    $texto1 = "Una de tus citas ha sido cancelada.";
    $texto2 = 'Te informamos que la cita numero '.$id_cita.' ha sido cancelada. Puedes ver el estado de tus citas en el siguiente enlace.';
    $referer = "/usuario/citas.php";

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE citas SET estado='Cancelada' WHERE id_cita='$id_cita';";

    if ($conn->query($sql) === TRUE) 
    {
        echo 'Cita Cancelada!';
        header("Refresh: 3; url=/email/cancelacionusuario.php?titulo=$titulo&texto1=$texto1&texto2=$texto2&email=$email&referer=$referer");
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
        header("Refresh: 3; url= citas.php");
    }
?>
