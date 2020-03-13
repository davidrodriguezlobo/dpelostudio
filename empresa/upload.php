<?php
session_start();
include '../bd/bd.php';
$session_email = $_SESSION['email'];
$id_usuario = $_SESSION['id_usuario'];

$path1 = "/var/www/dpelostudio.com/public_html/uploads/";
$path2 = "/";
$path = $path1.$id_usuario.$path2;

echo $id_usuario;
echo $path;

if (!file_exists('$path')) {
    mkdir($path, 0777, true);
}

$uploadfile = $path . basename($_FILES['userfile']['name']);

echo "<p>";

if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile)) {
  echo "File is valid, and was successfully uploaded.\n";
} else {
   echo "Upload failed";
}

$filename = $_FILES['userfile']['name'];

if ($conn->connect_error) 
{
    die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE usuario SET imagenperfil='$filename' WHERE id_usuario='$id_usuario';";

if ($conn->query($sql) === TRUE) 
{
    echo '<div class="alert alert-success">Datos actualizados! </div>';
    header("Refresh: 3; url= config.php");
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


echo $id_usuario;
echo "</p>";
echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);
print "</pre>";

?>
