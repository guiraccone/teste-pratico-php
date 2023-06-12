<?php
function redirect($message)
{
    echo "<script>alert('$message');
        window.location.href = '../../system.php';
        </script>";
    exit;
}

if (isset($_POST['submit']) && isset($_FILES['image'])) {
    require('../../config.php');

    echo '<pre>';
    print_r($_FILES['image']);
    echo '</pre>';

    $img_name = $_FILES['image']['name'];
    $img_size = $_FILES['image']['size'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $error = $_FILES['image']['error'];

    if ($error === 0) {
        if ($img_size > 512000) {
            $message = 'Arquivo muito pesado para envio.';
            redirect($message);
        }
        $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png', 'webp');

        if (in_array($img_ex_lc, $allowed_exs)) {
            $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
            $img_upload_path = '../../assets/img/' . $new_img_name;
            move_uploaded_file($tmp_name, $img_upload_path);

            $sql = "INSERT INTO imagens (image_url) VALUES ('$new_img_name');";

            $res = $conexao->query($sql);
            $message = 'Imagem enviada com sucesso!';
            redirect($message);
        }
        $message = 'Você não pode fazer upload de arquivos desse tipo!';
        redirect($message);
    }
    $message = 'Erro Desconhecido ocorreu!';
    redirect($message);
}
header('Location: ../../system.php');
