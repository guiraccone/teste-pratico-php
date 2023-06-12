<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php require('includes/html/head.php') ?>
    <title>Lovatel Car</title>
</head>

<body>
    <?php require('includes/html/header.php') ?>

    <?php require('config.php') ?>

    <section class="container">
        <h2 class="main-t blueFont bold uppercase fullW t-center margin20">Veículos</h2>
        <form action="" id="filterForm">
            <div class="row g-5">
                <div class="col-md-3">
                    <select class="form-select" id="marca" name="marca" required>
                        <option value="">Marca</option>
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
                    <label for="marca" class="form-label">Marca</label>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="modelo" name="modelo" required>
                        <option value='modelo'>Modelo</option>"
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
                    <label for="modelo" class="form-label">Modelo</label>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="ano" name="ano" required>
                        <option value="">Ano</option>
                        <?php
                        $sql = "SELECT DISTINCT ano FROM veiculo";
                        $res = $conexao->query($sql);
                        $qtd = $res->num_rows;

                        if ($qtd > 0) {
                            while ($row = $res->fetch_object()) {
                                echo "<option value='$row->ano'>$row->ano</option>";
                            }
                        }
                        ?>
                    </select>
                    <label for="ano" class="form-label">Ano</label>
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>
        </form>
    </section>

    <div class="album py-5 bg-body-tertiary">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3" id="veiculosList">
                <?php
                $marcaFilter = isset($_GET['marca']) ? $_GET['marca'] : "";
                $modeloFilter = isset($_GET['modelo']) ? $_GET['modelo'] : "";
                $anoFilter = isset($_GET['ano']) ? $_GET['ano'] : "";

                $sql = "SELECT veiculo.*, 
                marca.nome AS marca,
                modelo.nome AS modelo,
                imagens.image_url as imagem, 
                veiculo.nome AS veiculo
                FROM veiculo
                INNER JOIN modelo ON veiculo.idModelo = modelo.idModelo
                INNER JOIN marca on modelo.idMarca = marca.idMarca
                INNER JOIN imagens on veiculo.idImagem = imagens.idImagem";

                if ($marcaFilter && $modeloFilter && $anoFilter) {
                    $sql .= " WHERE";
                    if ($marcaFilter) {
                        $sql .= " marca.nome = '$marcaFilter' AND";
                    }
                    if ($modeloFilter) {
                        $sql .= " modelo.nome = '$modeloFilter' AND";
                    }
                    if ($anoFilter) {
                        $sql .= " veiculo.ano = '$anoFilter' AND";
                    }

                    $sql = rtrim($sql, "AND");
                }

                $res = $conexao->query($sql);
                $qtd = $res->num_rows;

                if ($qtd > 0) {
                    while ($row = $res->fetch_object()) {
                        print("
                        <div class='col '>
                            <div class='card shadow-sm .bg-secondary'>
                                <img src='assets/img/$row->imagem' style=object-fit: contain;'>
                                <div class='card-body'>
                                    <h6 class='card-text'>$row->marca $row->veiculo - $row->modelo</h6>
                                    <p class='card-text'>R$ $row->valor ou Consulte</p>
                                    <div class='d-flex justify-content-between align-items-center'>
                                        <div class='btn-group'>
                                            <a href='veiculos_detalhes.php?id=$row->idVeiculo' class='btn btn-sm btn-outline-secondary'>Visualizar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ");
                    }
                }
                ?>
            </div>
        </div>
    </div>
    <?php require('includes/html/footer.php') ?>
</body>

</html>