<?php require('../../config.php') ?>

<form action="system/save/brand.php"method="POST">
    <h2>Marca</h2>

    <input type="hidden" name="action" value="create" />

    <div class="mb-3">
        <label for="marca">Marca</label>
        <input type="text" class="form-control" id="marca" name="marca" placeholder="ex. Ford" required>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

<?php require('../view/brands.php') ?>