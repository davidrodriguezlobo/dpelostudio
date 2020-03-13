<?php
session_start();
include '../bd/bd.php';

try{
    
    $post_id = $_GET['post_id'];
    $post_titulo = $_GET['post_titulo'];

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE posts SET estado='Publicado' WHERE post_id='$post_id';";

    if ($conn->query($sql) === TRUE) 
    {
        echo '<div class="alert alert-success">Post Publicado! </div>';
        header("Refresh: 3; url= fcm.php?post_titulo=".$post_titulo."");
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
