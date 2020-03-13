<?php
    session_start();
    include '../bd/bd.php';

    $postNewCount = $_POST['postNewCount'];

    $sql = "SELECT nombre, apellido, imagenperfil, post_titulo, post_text, post_img, post_timestamp, post_id, post_author FROM posts AS p INNER JOIN usuario as u ON p.post_author = u.id_usuario ORDER BY post_id DESC LIMIT $postNewCount";

    $result = mysqli_query($conn,$sql);

    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {   
            if ($row['post_img'] == "")
            {
                $imgpost = "../uploads/blog/default/stock.jpg";
            }
            else
            {
                $p1 = "../uploads/blog/";
                $p2 = "/";
                $imgpost = $p1.$row['post_id'].$p2.$row['post_img'];
            }

            if ($row['imagenperfil'] == "")
            {
                $imgperfil = "../assets/img/placeholder.jpg";
            }
            else
            {
                $path1 = "../uploads/";
                $path2 = "/";
                $imgperfil = $path1.$row['post_author'].$path2.$row['imagenperfil'];
            }

            $post_text = $row['post_text'];
            $text = substr($post_text, 0, 100);
            $autor = $row['nombre']." ".$row['apellido'];

            echo '<div class="col-lg-4 col-md-6">
            <div class="card card-blog card-plain">
            <div class="card-image">
            <a href="/blog/post.php?id='.$row['post_id'].'">
                <img class="img rounded" src="'.$imgpost.'">
            </a>
            </div>
            <div class="card-body">
            <h6 class="category text-primary">Features</h6>
            <h4>
                <a href="/blog/post.php?id='.$row['post_id'].'">'.$row['post_titulo'].'</a>
            </h4>
            <p class="card-description">
                '.$text.'...
            </p>
            <div class="card-footer">
                <div class="author">
                    <img src="'.$imgperfil.'" alt="..." class="avatar img-raised">
                    <span>'.$autor.'</span>
                </div>
                <div class="stats stats-right">
                    <i class="tim-icons icon-watch-time"></i>'.$row['post_timestamp'].'
                </div>
            </div>
            </div>
            </div>
            </div>';
        }
    }
    else
    {
        echo "There are no Blog Posts.";
    }

?>
