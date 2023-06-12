<?php require('../../config.php'); ?>
<form action="system/save/model.php" method="POST">
    <h2>Modelo</h2>

    <input type="hidden" name="action" value="create" />

    <div class="mb-3">
        <label for="marca">Marca</label>
        <select class="form-control" name="marca" id="marca">
            <option value="">Selecione uma marca válida</option>
            <?php

            $sql = "SELECT * FROM marca";
            $res = $conexao->query($sql);
            $qtd = $res->num_rows;

            if ($qtd > 0) {
                while ($row = $res->fetch_object()) {
                    echo "<option value='$row->nome'>$row->nome</option>";
                }
            }
            ?>
        </select>
    </div>

    <div class="mb-3">
        <label for="modelo">Modelo</label>
        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="ex. Sedan" required>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

<?php require('../view/models.php') ?>