<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <title>Check Login and create session</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <?php
			// Connection info. file
			include 'bd.php';          
		
			
			// data sent from form login.html 
			$email = $_POST['email']; 
			$contrasena = $_POST['contrasena'];
			
			// Query sent to database
			$result = mysqli_query($conn, "SELECT * FROM usuario WHERE email = '$email'");
			
			// Variable $row hold the result of the query
			$row = mysqli_fetch_assoc($result);
			
			// Variable $hash hold the password hash on database
			$hash = $row['contrasena'];
            $tipousuario= $row['tipousuario'];
            
			/* 
			password_Verify() function verify if the password entered by the user
			match the password hash on the database. If everything is OK the session
			is created for one minute. Change 1 on $_SESSION[start] to 5 for a 5 minutes session.
			*/
			if ($_POST['contrasena'] == $hash) 
            {	
				
				$_SESSION['loggedin'] = true;
				$_SESSION['nombre'] = $row['nombre'];
                $_SESSION['apellido'] = $row['apellido'];
				$_SESSION['email'] = $row['email'];
                $_SESSION['id_usuario'] = $row['id_usuario'];
                $_SESSION['tipousuario'] = $tipousuario;
                
                if ($tipousuario == "Usuario")
                {
                    header("refresh:0.1 ;url=../usuario/citas.php");
                }
                
              else if ($tipousuario == "Empresa")
              {
                  header("refresh:0.1 ;url=../empresa/citas.php");
              }
                
              else if ($tipousuario == "Admin")
                  
               {
                  header("refresh:0.1 ;url=../admin/dashboard.php");
              } 
                
               
            }
            else 
            {
				echo"<script language='javascript'>alert('Error En el Correo o Contraseña Intente de Nuevo'); </script>";
            header("refresh:0.1 ;url= ../index.php");			
			}	
			?>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

</body>

</html>
