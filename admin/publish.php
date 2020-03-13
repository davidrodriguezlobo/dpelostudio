<?php
session_start();
include '../bd/bd.php';


$result = mysqli_query($conn, "SELECT post_id FROM posts ORDER BY post_id DESC LIMIT 1;");

$row = mysqli_fetch_assoc($result);

$last_post_id = $row['post_id'];
$post_id = $last_post_id + 1;


$path1 = "/var/www/dpelostudio.com/public_html/uploads/blog/";
$path2 = "/";
$path = $path1.$post_id.$path2;

$id_usuario = $_SESSION['id_usuario'];
$post_titulo1 = $_POST ['post_titulo'];
$post_titulo = mysqli_real_escape_string($conn,  $post_titulo1);
$post_subtitulo1 = $_POST['post_subtitulo'];
$post_subtitulo = mysqli_real_escape_string($conn,  $post_subtitulo1);
$post = $_POST['post'];
$post_text = mysqli_real_escape_string($conn,  $post);
$post_tags = $_POST['post_tags'];


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

$sql = "INSERT INTO posts (post_titulo, post_subtitulo, post_text, post_img, post_tags, post_author) VALUES ('$post_titulo', '$post_subtitulo','$post_text', '$filename', '$post_tags', '$id_usuario') ;";

if ($conn->query($sql) === TRUE) 
{
    echo '<div class="alert alert-success">Datos actualizados! </div>';
    header("Refresh: 3; url=/blog/post.php?id=$post_id");
} 
else 
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo "</p>";
echo '<pre>';
echo 'Here is some more debugging info:';
print_r($_FILES);
print "</pre>";

?>
