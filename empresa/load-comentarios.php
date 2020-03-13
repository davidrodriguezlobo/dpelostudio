<?php
    session_start();
    include '../bd/bd.php';

    $comentarioNewCount = $_POST['comentarioNewCount'];
    $id_empresa = $_REQUEST['idEmpresa'];

    $sql1 = "SELECT nombre, apellido, imagenperfil, id_comentario, id_empresa, c.id_usuario, comentario, calificacion, timestamp 
    FROM comentarios AS c
    INNER JOIN usuario AS u
    ON c.id_usuario = u.id_usuario
    WHERE id_empresa = $id_empresa 
    ORDER BY id_comentario DESC
    LIMIT $comentarioNewCount;";

    $result1 = mysqli_query($conn,$sql1);

    if (mysqli_num_rows($result1) > 0)
    {
        while ($row1 = mysqli_fetch_assoc($result1))
        {
            $myid_usuario = $row1['id_usuario'];

            if(empty($row1['imagenperfil']))
            {
                $mypath = "../assets/img/placeholder.jpg";
            }
            else
            {
                $myimagenperfil = $row1['imagenperfil'];
                $mypath1 = "../uploads/";
                $mypath2 = "/";
                $mypath = $mypath1.$myid_usuario.$mypath2.$myimagenperfil;

            }

            $mynombre = $row1['nombre']." ".$row1['apellido'];

            echo '
            <div class="media" >
            <a class="pull-left" href="javascript:;">
            <div class="avatar">
                <img class="media-object img-raised" src="'.$mypath.'" alt="...">
            </div>
        </a>
        <div class="media-body">
            <h5 class="media-heading">'.$mynombre.'
                <small class="text-muted">· '.$row1['timestamp'].'</small>
            </h5>
            <p>'.$row1['comentario'].'</p>
            <div class="media-footer">
            <p class="btn btn-danger btn-link pull-right">
            <i class="far fa-star"></i> '.$row1['calificacion'].'
            </p>
            </div>
        </div>
        </div>
            ';
        }
    }
    else
    {
        echo '<h4>Aun no tenemos comentarios para esta empresa...</h4>';
    }

?>
