<?php

$sql = "SELECT marca.* FROM marca ORDER BY idMarca ASC";
$res = $conexao->query($sql);

$qtd = $res->num_rows;

if ($qtd > 0) {
    print "<table class='table table-hover table-striped table-bordered'>
    <th>ID</th>
    <th>Marca</th>
    <th>Ações</th>
    ";
    while ($row = $res->fetch_object()) {
        print("
                    <tr>
                    <td class='card-text'>$row->idMarca</td>
                    <td class='card-text'>$row->nome</td>
                    <td class='card-text'>
                        <button onclick=\"location.href='system/update/brand.php?id=$row->idMarca'; \" class='btn btn-success' ;>Editar</button>
                        <button onclick=\"if (confirm('Tem certeza que você quer deletar esta marca?')) { window.location.href = 'system/save/brand.php?action=delete&id=$row->idMarca'; } else { return false; }\" class='btn btn-danger'>Excluir</button>
                        </td>
                    </tr>
    ");
    }
    print "</table>";
} else {
    print "<h6>Não foi encontrado nenhuma marca adicionada.</h6>";
}
