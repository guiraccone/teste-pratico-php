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
        $nome = $_POST['nome'];
        $valor = floatval($_POST['valor']);

        if ($valor <= 0) {
            redirect('O valor deve ser maior do que 0.');
        }

        $ano = $_POST['ano'];
        $descricao = $_POST['descricao'];
        $modelo = $_POST['modelo'];
        $imagem = $_POST['imagem'];

        $modeloSql = "SELECT idModelo FROM modelo WHERE nome = '$modelo'";
        $modeloResult = $conexao->query($modeloSql);
        if ($modeloResult->num_rows > 0) {
            $modeloRow = $modeloResult->fetch_assoc();
            $idModelo = $modeloRow['idModelo'];

            $imagemSql = "SELECT idImagem FROM imagens WHERE idImagem = '$imagem'";
            $imagemResult = $conexao->query($imagemSql);
            if ($imagemResult->num_rows > 0) {
                $imagemRow = $imagemResult->fetch_assoc();
                $idImagem = $imagemRow['idImagem'];

                $sql = "INSERT INTO veiculo (nome, valor, ano, descricao, idModelo, idImagem) 
                VALUES ('$nome', '$valor', '$ano', '$descricao', '$idModelo', '$idImagem')";
                $res = $conexao->query($sql);
                if ($res == true) {
                    $message = 'Veículo cadastrado com sucesso.';
                    redirect($message);
                    exit;
                }
            }
        }
        $message = 'Alguma das informações que você inseriu está incorreta. Verifique!';
        redirect($message);
        break;
    case 'update':
        $veiculoId = $_POST['id'];
        $nome = $_POST['nome'];
        $valor = floatval($_POST['valor']);

        if ($valor <= 0) {
            redirect('O valor deve ser maior do que 0.');
        }

        $ano = $_POST['ano'];
        $descricao = $_POST['descricao'];
        $modelo = $_POST['modelo'];
        $imagem = $_POST['imagem'];

        $modeloSql = "SELECT idModelo FROM modelo WHERE nome = '$modelo'";
        $modeloResult = $conexao->query($modeloSql);
        if ($modeloResult->num_rows > 0) {
            $modeloRow = $modeloResult->fetch_assoc();
            $idModelo = $modeloRow['idModelo'];

            $imagemSql = "SELECT idImagem FROM imagens WHERE idImagem = '$imagem'";
            $imagemResult = $conexao->query($imagemSql);
            if ($imagemResult->num_rows > 0) {
                $imagemRow = $imagemResult->fetch_assoc();
                $idImagem = $imagemRow['idImagem'];

                $sql = "UPDATE veiculo SET nome = '$nome', valor = '$valor', ano = '$ano', descricao = '$descricao', idModelo = '$idModelo', idImagem = '$idImagem' WHERE idVeiculo = $veiculoId";

                $res = $conexao->query($sql);
                if ($res === TRUE) {
                    $message = 'Veículo editado com sucesso.';
                    redirect($message);
                }
            }
            $message = 'Imagem não está incluída no banco de dados. Verifique!';
            redirect($message);
        }
        $message = 'Alguma das informações que você inseriu está incorreta. Verifique!';
        redirect($message);
        break;

    case 'delete':
        $veiculoId = $_GET['id'];
        $sql = "DELETE FROM veiculo WHERE idVeiculo = $veiculoId";
        $res = $conexao->query($sql);
        if ($res == true) {
            $message = 'Veículo excluído com sucesso.';
            redirect($message);
            exit;
        }
        $message = 'Erro ao excluir o veículo. Verifique novamente.';
        redirect($message);
        exit;
    default:
        break;
}
