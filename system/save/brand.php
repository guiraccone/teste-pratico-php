<?php require('../../config.php');

function redirect($message)
{
    echo "<script>alert('$message');
        window.location.href = '../../system.php';
        </script>";
    exit;
}

switch ($_REQUEST["action"]) {
    case 'create':
        $nome = $_POST['marca'];

        $verificaSql = "SELECT * FROM db_carros.marca WHERE nome = '$nome';";
        $verificaResult = $conexao->query($verificaSql);

        if ($verificaResult->num_rows > 0) {
            $message = 'Essa marca já está cadastrada no sistema.';
            redirect($message);
        }

        $sql = "INSERT INTO db_carros.marca (nome) VALUES ('$nome');";

        $res = $conexao->query($sql);

        if ($res == true) {
            $message = 'Marca cadastrada com sucesso.';
            redirect($message);
        }

        $message = 'Erro ao cadastrar marca.';
        redirect($message);

        break;
    case 'update':
        $idMarca = $_POST['id'];
        $nome = $_POST['marca'];

        $verificaSql = "SELECT * FROM db_carros.marca WHERE nome = '$nome';";
        $verificaResult = $conexao->query($verificaSql);

        if ($verificaResult->num_rows > 0) {
            $message = 'Essa marca já está cadastrada no sistema.';
            redirect($message);
        }

        $sql = "UPDATE marca SET nome = '$nome' WHERE idMarca = $_REQUEST[id];";

        $res = $conexao->query($sql);

        if ($res == true) {
            $message = 'Marca editada com sucesso.';
            redirect($message);
        } else {
            $message = 'Erro ao editar marca.';
            redirect($message);
        }
        break;
    case 'delete':
        $idMarca = $_GET['id'];
        $sql = "DELETE FROM marca WHERE idMarca = $idMarca;";
        $res = $conexao->query($sql);

        if ($res == true) {
            $message = 'Marca excluída com sucesso.';
            redirect($message);
        } else {
            $message = 'Erro ao excluir marca. Verifique novamente.';
            redirect($message);
        }
        break;
    default:
        break;
}
