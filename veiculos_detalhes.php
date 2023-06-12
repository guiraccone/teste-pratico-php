<?php
require('config.php');

if (isset($_GET['id'])) {
    $idVeiculo = $_GET['id'];
    $sql = "SELECT veiculo.*, 
    marca.nome AS marca,
    modelo.nome AS modelo,
    imagens.image_url as imagem, 
    veiculo.nome AS veiculo
    FROM veiculo
    INNER JOIN modelo ON veiculo.idModelo = modelo.idModelo
    INNER JOIN marca on modelo.idMarca = marca.idMarca
    INNER JOIN imagens on veiculo.idImagem = imagens.idImagem
    WHERE veiculo.idVeiculo = $idVeiculo";
    $res = $conexao->query($sql);
    $qtd = $res->num_rows;
    if ($qtd > 0) {
        while ($row = $res->fetch_object()) {
            $tituloVeiculo = "$row->marca $row->nome - $row->modelo";
?>

            <!DOCTYPE html>
            <html lang="pt-br">

            <head>
                <?php require('includes/html/head.php') ?>
                <title><?php echo $tituloVeiculo; ?> - Lovatel Car</title>
            </head>

            <body>
                <?php require('includes/html/header.php') ?>

                <div class="container">
                    <div class="single_product">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 order-lg-2 order-1">
                                    <div class="image_selected"><img src="assets/img/<?php echo $row->imagem; ?>" style="object-fit: contain; width: 30rem; height: 20rem;" /></div>
                                </div>
                                <div class="col-lg-6 order-3">
                                    <div class="product_description">
                                        <div class="product_name">
                                            <h1><?php echo $row->marca . ' ' . $row->nome . ' - ' . $row->modelo; ?></h1>
                                        </div>
                                        <legend><?php echo $row->ano; ?></legend>
                                        <h4 class="product_price">R$ <?php echo $row->valor; ?></h4>
                                        <hr class="singleline">
                                        <div><span class="product_info"><?php echo $row->descricao; ?></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>

                <div class="container">
                    <h4>Interessado ? Envie uma mensagem para nós!</h4>

                    <form method="POST" action="system/save/lead.php">
                        <input type="hidden" name="veiculo" value="<?php echo $_GET['id']; ?>" />
                        <div class="mb-3">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" placeholder="João">
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="joão@email.com">
                        </div>
                        <div class="mb-3">
                            <label for="phone">Telefone</label>
                            <input type="text" class="form-control" id="phone" name="telefone" placeholder="(99) 99999-9999">
                        </div>
                        <div class="mb-3">
                            <label for="city">Cidade</label>
                            <input type="text" class="form-control" id="city" name="cidade" placeholder="Joaçaba">
                        </div>
                        <div class="mb-3">
                            <label for="state">Estado</label>
                            <select name="estado" class="form-control" id="state">
                                <option value="SC">Santa Catarina</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espírito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="message">Deixe aqui sua mensagem</label>
                            <textarea name="mensagem" class="form-control" id="message" rows="3" required placeholder="..."></textarea>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>

                <?php require('includes/html/footer.php'); ?>

            </body>

            </html>

<?php
        }
    }
}
?>