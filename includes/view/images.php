<div class="album py-5 bg-light">
    <div class="container">
        <div class="row">
            <?php
            require('../../config.php');

            $sql = "SELECT * FROM imagens ORDER BY idImagem ASC;";
            $res = $conexao->query($sql);
            if (mysqli_num_rows($res) > 0) {
                while ($images = mysqli_fetch_assoc($res)) {

                    $image_url = "assets/img/" . $images['image_url'];
                    $image_id = $images['idImagem'];

                    print "<div class='col-md-4'>
                        <div class='card mb-4 box-shadow'>
                            <img class='card-img-top' src='$image_url'>
                            <div class='card-body'>
                                <p class='card-text'>ID:$image_id</p>
                            </div>
                        </div>
                    </div>";
                }
            }
            ?>
        </div>
    </div>
</div>