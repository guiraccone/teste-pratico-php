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
    $sql = "SELECT marca.* FROM marca WHERE idMarca=$_REQUEST[id]";

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
                        <h6 class="nav-link" href="#">Update de Marca</h6>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <form action="../save/brand.php" method="POST">
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="id" value=<?php print "$row->idMarca"; ?> />
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="modelo" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="ex. Ford" value="<?php print $row->nome; ?>" required>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
        </form>
    </div>
</body>