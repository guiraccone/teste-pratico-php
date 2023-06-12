<form action="system/save/image.php" method="POST" enctype="multipart/form-data">
    <div class="container">
        <p>Envie uma imagem por aqui e utilize o id demonstrado abaixo na inserção de veículos</p>
        <div class="mb-3">
            <label for="imagem">Imagem</label>
            <input type="file" class="form-control" id="imagem" name="image" required>
        </div>
        <div class="d-flex justify-content-center">
            <input type="submit" class="btn btn-primary" name="submit" value="Upload">
        </div>
    </div>
</form>

<?php require('../view/images.php') ?>