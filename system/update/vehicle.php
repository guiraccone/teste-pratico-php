<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="Robots" content="index,follow">
    <meta name="author" content="Guilherme Matheus Raccone">

    <!-- Bootstrap -->
    <link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <title>Lovatel Car</title>
</head>

<body>
    <?php
    require("../../config.php");
    $sql = "SELECT veiculo.*, 
    marca.nome AS marca,
    modelo.nome AS modelo,
    imagens.image_url as imagem, 
    veiculo.nome AS veiculo
    FROM veiculo
    INNER JOIN modelo ON veiculo.idModelo = modelo.idModelo
    INNER JOIN marca on modelo.idMarca = marca.idMarca
    INNER JOIN imagens on veiculo.idImagem = imagens.idImagem
    WHERE idVeiculo=$_REQUEST[id]";

    $res = $conexao->query($sql);
    $row = $res->fetch_object();
    ?>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Sistema</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="../../system.php">&#8592; Voltar</a>
                    </li>
                    <li class="nav-item">
                        <h6 class="nav-link" href="#">Update de Carro</h6>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <form action="../save/vehicle.php" method="POST">
            <h2>Envio de Veículo</h2>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="id" value="<?php print $row->idVeiculo; ?>" />

            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="imagem" class="form-label">ID Imagem</label>
                        <select class="form-control" id="imagem" name="imagem" required>
                            <?php
                            $imagemSql = "SELECT * FROM imagens";
                            $imagemResult = $conexao->query($imagemSql);

                            while ($imagemRow = $imagemResult->fetch_object()) {
                                $selected = ($imagemRow->idImagem == $row->imagem) ? 'selected' : '';
                                echo "<option value='$imagemRow->idImagem' $selected>$imagemRow->idImagem</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Modelo</label>
                        <select class="form-control" id="modelo" name="modelo" required>
                            <?php
                            $modeloSql = "SELECT * FROM modelo";
                            $modeloResult = $conexao->query($modeloSql);

                            while ($modeloRow = $modeloResult->fetch_object()) {
                                $selected = ($modeloRow->nome == $row->modelo) ? 'selected' : '';
                                echo "<option value='$modeloRow->nome' $selected>$modeloRow->nome</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="ex. Fusion" value="<?php print $row->nome; ?>" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="valor" class="form-label">Valor</label>
                        <div class="input-group">
                            <span class="input-group-text">R$</span>
                            <input type="text" class="form-control" id="valor" name="valor" value="<?php print $row->valor; ?>" placeholder="100.100" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ano" class="form-label">Ano</label>
                        <input type="number" class="form-control" name="ano" id="ano" value="<?php print $row->ano; ?>" placeholder="ex. 2018" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="descricao" class="form-label">Descrição</label>
                        <textarea name="descricao" id="descricao" class="form-control" cols="30" rows="4" required><?php print $row->descricao; ?></textarea>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
    </div>
</body>