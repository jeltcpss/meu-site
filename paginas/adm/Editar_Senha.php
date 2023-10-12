<?php
session_start();
include "../../conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere a senha do formulário
    $senha = $_POST["senha"];

    // Recupere o usuário da sessão
    $usuario = $_SESSION["usuario"];

    // Atualize a senha do usuário
    $query = "UPDATE usuarios SET senha = :senha WHERE usuario = :usuario";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':senha', $senha, SQLITE3_TEXT);
    $stmt->bindParam(':usuario', $usuario, SQLITE3_TEXT);
    
    $result = $stmt->execute();

    if ($result) {
        echo "Senha atualizada com sucesso!";
        session_destroy();
        header("Location: perfil.php");
    } else {
        echo "Erro ao atualizar a senha.";
    }
} else {
    echo "Requisição inválida.";
}
?>
