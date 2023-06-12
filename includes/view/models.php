<?php

$sql = "SELECT modelo.*,
marca.nome as marca FROM modelo
inner join marca on modelo.idMarca = marca.idMarca ORDER BY idModelo ASC";
$res = $conexao->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-striped table-bordered'>
    <th>ID</th>
    <th>Marca</th>
    <th>Modelo</th>
    <th>Ações</th>
    ";
    while ($row = $res->fetch_object()) {
        print("
                    <tr>
                    <td class='card-text'>$row->idModelo</td>
                    <td class='card-text'>$row->marca</td>
                    <td class='card-text'>$row->nome</td>
                    <td class='card-text'>
                        <button onclick=\"location.href='system/update/model.php?id=$row->idModelo'; \" class='btn btn-success' ;>Editar</button>
                        <button onclick=\"if (confirm('Tem certeza que você quer deletar o modelo?')) { window.location.href = 'save/model.php?action=delete&id=$row->idModelo'; } else { return false; }\" class='btn btn-danger'>Excluir</button>
                        </td>
                    </tr>
    ");
    }
    print "</table>";
} else {
    print "<h6>Não foi encontrado nenhum modelo adicionado.</h6>";
}
