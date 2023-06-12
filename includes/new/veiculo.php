<?php require('../../config.php'); ?>

<form action="system/save/vehicle.php" method="POST">
    <h2>Cadastro de Veículo</h2>
    <input type="hidden" name="action" value="create" />

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="imagem" class="form-label">Id Imagem</label>
                <select class="form-control" name="imagem" id="imagem">
                    <option value="">Selecione uma imagem</option>
                    <?php

                    $sql = "SELECT * FROM imagens";
                    $res = $conexao->query($sql);
                    $qtd = $res->num_rows;

                    if ($qtd > 0) {
                        while ($row = $res->fetch_object()) {
                            echo "<option value='$row->idImagem'>$row->idImagem</option>";
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="modelo" class="form-label">Marca</label>
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
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="modelo" class="form-label">Modelo</label>
                <select class="form-control" name="modelo" id="modelo">
                    <option value="">Selecione um modelo válido</option>
                    <?php

                    $sql = "SELECT * FROM modelo";
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
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" placeholder="ex. Fusion" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <div class="input-group">
                    <span class="input-group-text">R$</span>
                    <input type="text" class="form-control" id="valor" name="valor" placeholder="100.100" required>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="ano" class="form-label">Ano</label>
                <input type="number" class="form-control" name="ano" id="ano" placeholder="ex. 2018" required>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea name="descricao" id="descricao" class="form-control" cols="30" rows="4" required></textarea>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>

<?php require('../view/vehicles.php') ?>