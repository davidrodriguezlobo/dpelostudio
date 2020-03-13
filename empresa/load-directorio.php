<?php
    session_start();
    include '../bd/bd.php';

    $listadoNewCount = $_POST['listadoNewCount'];

    $sql = "SELECT u.id_usuario, descripcion_negocio, nombre, apellido, tipo_negocio, imagenperfil FROM usuario as u INNER JOIN informacion_empresa as ie ON u.id_usuario = ie.id_usuario WHERE estado_membresia = 'Activo' ORDER BY u.id_usuario DESC LIMIT $listadoNewCount";

    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0)

    {

        while($row = mysqli_fetch_assoc($result))
        {

            if ($row['imagenperfil'] == "")
            {
                $imgperfil = "../assets/img/placeholder.jpg";
            }
            else
            {
                $path1 = "../uploads/";
                $path2 = "/";
                $imgperfil = $path1.$row['id_usuario'].$path2.$row['imagenperfil'];
            }

        $descripcion = substr($row['descripcion_negocio'], 0, 100);
        $nombre = $row['nombre']." ".$row['apellido'];
        $servicio = $row['tipo_negocio'];


        echo '

        <div class="card card-blog card-plain blog-horizontal">
            <div class="row">
                <div class="col-lg-4">
                    <div class="card-image">
                        <a href="/empresa/perfil.php?empresa='.$row['id_usuario'].'">
                            <img class="img rounded" src="'.$imgperfil.'">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card-body">
                        <h3>
                            <a href="/empresa/perfil.php?empresa='.$row['id_usuario'].'">'.$nombre.'</a>
                        </h3>
                        <p class="card-description">'.$descripcion.'
                            <br>
                            <a href="/empresa/perfil.php?empresa='.$row['id_usuario'].'"> Más información... </a>
                        </p>
                        <div class="author">
                            <div class="text">
                                <span class="name">Servicios</span>
                                <div class="meta">'.$servicio.'</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>';

        }

    }
    else
    {
        echo "Aun no hay asociados.";
    }

?>
