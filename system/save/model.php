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
        $nome = $_POST['modelo'];
        $marca = $_POST['marca'];

        $verificaSql = "SELECT * FROM modelo WHERE nome = '$nome';";
        $verificaResult = $conexao->query($verificaSql);

        if ($verificaResult->num_rows > 0) {
            $message = 'O Modelo já existe.';
            redirect($message);
        } else {
            $marcaSql = "SELECT idMarca FROM marca WHERE nome = '$marca';";
            $marcaResult = $conexao->query($marcaSql);

            if ($marcaResult->num_rows > 0) {
                $marcaRow = $marcaResult->fetch_assoc();
                $idMarca = $marcaRow['idMarca'];

                $sql = "INSERT INTO modelo (nome, idMarca) VALUES ('$nome', '$idMarca');";

                $res = $conexao->query($sql);

                if ($res == true) {
                    $message = 'Modelo cadastrado com sucesso.';
                    redirect($message);
                } else {
                    $message = 'Erro ao cadastrar modelo.';
                    redirect($message);
                }
            } else {
                $message = 'Marca não encontrada. Verifique novamente.';
                redirect($message);
            }
        }
        break;
    case 'update':
        $idModelo = $_POST['id'];
        $nome = $_POST['modelo'];
        $marca = $_POST['marca'];

        $verificaSql = "SELECT * FROM modelo WHERE nome = '$nome' AND idModelo <> $idModelo;";
        $verificaResult = $conexao->query($verificaSql);

        if ($verificaResult->num_rows > 0) {
            $message = 'O Modelo já existe.';
            redirect($message);
        } else {
            $marcaSql = "SELECT idMarca FROM marca WHERE nome = '$marca';";
            $marcaResult = $conexao->query($marcaSql);

            if ($marcaResult->num_rows > 0) {
                $marcaRow = $marcaResult->fetch_assoc();
                $idMarca = $marcaRow['idMarca'];

                $sql = "UPDATE modelo SET nome = '$nome', idMarca = '$idMarca' WHERE idModelo = $idModelo;";

                $res = $conexao->query($sql);

                if ($res == true) {
                    $message = 'Modelo editado com sucesso.';
                    redirect($message);
                } else {
                    $message = 'Erro ao editar modelo.';
                    redirect($message);
                }
            } else {
                $message = 'Marca não encontrada. Verifique novamente.';
                redirect($message);
            }
        }
        break;

    case 'delete':
        $idModelo = $_GET['id'];
        $sql = "DELETE FROM modelo WHERE idModelo = $idModelo;";
        $res = $conexao->query($sql);

        if ($res == true) {
            $message = 'Modelo excluído com sucesso.';
            redirect($message);
        } else {
            $message = 'Erro ao excluir o modelo. Verifique novamente.';
            redirect($message);
        }
    default:
        break;
}
