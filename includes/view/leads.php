<h3>Leads enviados pelos usuários.</h3>

<div class="album py-5 bg-body-tertiary">
    <div class="container">
        <?php require('../../config.php') ?>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php
            $sql = "SELECT leads.*,
            veiculo.nome as carro
            from leads inner join veiculo on leads.idVeiculo = veiculo.idVeiculo;";

            $res = $conexao->query($sql);

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                while ($row = $res->fetch_object()) {
                    print "
                    <div class='col mb-4'>
                        <div class='card shadow-sm'>    
                            <div class='card-body'>
                                <div class='container'>
                                    <h6 class='card-text'>Autor </h6>
                                    <p class='card-text'>$row->nome </p>
                                    <h6 class='card-text'>Cidade </h6>
                                    <p class='card-text'>$row->cidade - $row->estado </p>         
                                    <h6 class='card-text'>Email </h6>
                                    <p class='card-text'>$row->email </p>
                                    <h6 class='card-text'>Telefone </h6>
                                    <p class='card-text'>$row->telefone </p>
                                    <h6 class='card-text'>Mensagem</strong></h6>
                                    <p class='card-text'>$row->mensagem</p>
                                    <p class='card-text'><h6>Veículo de Interesse</h6> $row->carro </p>
                                    <span class='card-text'><h6>Data de Envio</h6>" . date('d/m/Y', strtotime($row->dataLead)) . "</span>
                                </div>
                            </div>
                        </div>
                    </div>
                ";
                }
            }
            ?>
        </div>
    </div>
</div>