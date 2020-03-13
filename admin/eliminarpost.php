<?php
session_start();
include '../bd/bd.php';

try {
    
    $post_id = $_GET['post_id'];

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM posts WHERE post_id='$post_id';";

    if ($conn->query($sql) === TRUE) 
    {
        echo 'Publicacion Eliminada!';
        header("Refresh: 3; url= publicaciones.php");
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
        header("Refresh: 3; url= publicaciones.php");
    }
?>
