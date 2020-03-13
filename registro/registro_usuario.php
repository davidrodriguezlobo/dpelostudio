<?php
include ("../bd/bd.php");


        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $tipousuario = $_POST['tipousuario'];
    	$email = $_POST['email'];
        $contrasena = $_POST['contrasena'];
        

$result = mysqli_query($conn, "SELECT * FROM usuario WHERE email ='$email' LIMIT 1");
if (mysqli_fetch_row($result)) {
    echo '<script language="javascript">';
echo 'alert("El correo electronico ya esta registrado!")';
echo '</script>';
    header("refresh:0.1 ;url=/register.html");
} 

else 
{
$sql = "INSERT INTO usuario (nombre, apellido, email, contrasena, tipousuario) VALUES ('$nombre', '$apellido', '$email', '$contrasena', '$tipousuario')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">';
echo 'alert("Usuario Creado!")';
echo '</script>';
    header("refresh:0.1 ;url=../usuario/dashboard.html");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}
        

?>