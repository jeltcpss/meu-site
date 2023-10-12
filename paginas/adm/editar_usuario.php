<?php

require "../../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os dados do formulário
    $usuario = $_POST["editUsuario"];
    $admin = $_POST["editAdmin"];
    $senha = $_POST["editSenha"];
    $email = $_POST["editEmail"];
    $telefone = $_POST["editTelefone"];
    $plano = $_POST["editPlano"];
    $validade = $_POST["editValidade"];
    $status = $_POST["editStatus"];
    $tokens = $_POST["editTokens"];

    // Recupere a data de validade atual do banco de dados
    $query = "SELECT validade FROM usuarios WHERE usuario = '$usuario'";
    $result = $db->querySingle($query);

    if ($result !== false) {
        // Adicione a quantidade do formulário à data atual para calcular a nova validade
        $dataNova = date('Y-m-d', strtotime($result . ' + ' . $validade . ' days'));

        // Atualize os dados do usuário no banco de dados
        $query = "UPDATE usuarios SET admin = '$admin', senha = '$senha', email = '$email', telefone = '$telefone', plano = '$plano', validade = '$dataNova', status = '$status', tokens = '$tokens' WHERE usuario = '$usuario'";
        $result = $db->exec($query);

        if ($result) {
            echo "Usuário atualizado com sucesso!";
            header("Location: dashboard.php");
        } else {
            echo "Erro ao atualizar usuário.";
        }
    } else {
        echo "Erro ao recuperar a data de validade atual do usuário.";
    }
}
?>
