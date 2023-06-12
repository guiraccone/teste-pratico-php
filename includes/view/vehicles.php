
<h4>Listagem de veículos</h4>

<?php

$sql = "SELECT veiculo.*, 
marca.nome AS marca,
modelo.nome AS modelo,
imagens.image_url as imagem, 
veiculo.nome AS veiculo,
veiculo.ano AS ano
FROM veiculo INNER JOIN modelo ON veiculo.idModelo = modelo.idModelo
INNER JOIN marca ON modelo.idMarca = marca.idMarca
INNER JOIN imagens on veiculo.idImagem = imagens.idImagem ORDER BY idVeiculo ASC";


$res = $conexao->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-striped table-bordered'>
    <th>ID</th>
    <th>Marca</th>
    <th>Veículo</th>
    <th>Modelo</th>
    <th>Ano</th>
    <th>Valor</th>
    <th>Imagem</th>
    <th>Ações</th>
    ";
    while ($row = $res->fetch_object()) {
        print("
                    <tr>
                    <td class='card-text'>$row->idVeiculo</td>
                    <td class='card-text'>$row->marca </td>
                    <td class='card-text'>$row->veiculo</td>
                    <td class='card-text'>$row->modelo</td>
                    <td class='card-text'>$row->ano</td>
                    <td class='card-text'>R$ $row->valor</td>
                    <td class='card-text'>$row->idImagem</td>
                    <td class='card-text'>
                        <button onclick=\"location.href='system/update/vehicle.php?id=$row->idVeiculo'; \" class='btn btn-success' ;>Editar</button>
                        <button onclick=\"if (confirm('Tem certeza que você quer deletar o veículo?')) { window.location.href = 'system/save/vehicle.php?action=delete&id=$row->idVeiculo'; } else { return false; }\" class='btn btn-danger'>Excluir</button>
                        </td>
                    </tr>
    ");
    }
    print "</table>";
} else {
    print "<h6>Não foi encontrado nenhum veículo adicionado.</h6>";
}
?>