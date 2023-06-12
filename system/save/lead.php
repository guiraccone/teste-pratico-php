<?php require('../../config.php');

function redirect($message)
{
    echo "<script>alert('$message');
        window.location.href = '../../index.php';
        </script>";
    exit;
}

if (isset($_REQUEST['veiculo'])) {
    $idVeiculo = $_REQUEST['veiculo'];

    $nome = $_REQUEST['nome'];
    $email = $_REQUEST['email'];
    $telefone = $_REQUEST['telefone'];
    $cidade = $_REQUEST['cidade'];
    $estado = $_REQUEST['estado'];
    $mensagem = $_REQUEST['mensagem'];

    if (!preg_match('/^\(\d{2}\) \d{5}-\d{4}$/', $telefone)) {
        $message = 'Formato de telefone inválido! Por favor, insira como (99) 99999-9999!';
        redirect($message);
    }

    $sql = "INSERT INTO db_carros.leads (nome, email, telefone, cidade, estado, mensagem, idVeiculo, dataLead)
    VALUES (?, ?, ?, ?, ?, ?, ?, NOW())";

    $statement = $conexao->prepare($sql);
    if ($statement) {
        $statement->bind_param("ssssssi", $nome, $email, $telefone, $cidade, $estado, $mensagem, $idVeiculo);

        $statement->execute();

        if ($statement->affected_rows > 0) {
            $message = 'Lead cadastrado com sucesso.';
            redirect($message);
        } else {
            $message = 'Ocorreu um erro ao cadastrar o lead. Por favor, tente novamente.';
            redirect($message);
        }

        $statement->close();
        $conexao->close();
    } else {
        $message = 'Ocorreu algum erro desconhecido na aplicação.';
        redirect($message);
    }
}
