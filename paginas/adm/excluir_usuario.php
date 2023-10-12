<?php
if (isset($_GET['usuario'])) {
    $usuarioParaExcluir = $_GET['usuario'];
    
    include '../../conexao.php'; 

    $stmt = $db->prepare("DELETE FROM usuarios WHERE usuario = ?");
    $stmt->bindParam(1, $usuarioParaExcluir);

    if ($stmt->execute()) {
        
        header("Location: dashboard.php"); 
        exit();
    } else {
       
        echo "Erro ao excluir usuário.";
    }
}
?>
