<?php
session_start();

if (isset($_SESSION["usuario"])) {
    if (isset($_FILES["imagem"]) && $_FILES["imagem"]["error"] == 0 && getimagesize($_FILES["imagem"]["tmp_name"])) {
        $usuario = $_SESSION["usuario"];
        $imagem = $_FILES["imagem"]["tmp_name"];
        $conteudoImagem = file_get_contents($imagem);

        if ($conteudoImagem !== false) {
            $imagemBase64 = base64_encode($conteudoImagem);

            include "../../conexao.php"; // Inclua seu arquivo de conexão com o banco de dados

            $query = "UPDATE usuarios SET avatar = :avatar WHERE usuario = :usuario";
            $stmt = $db->prepare($query);
            $stmt->bindParam(":avatar", $imagemBase64, SQLITE3_TEXT);
            $stmt->bindParam(":usuario", $usuario, SQLITE3_TEXT);

            if ($stmt->execute()) {
                header("Location: perfil.php?success=Avatar atualizado com sucesso! mudara quando relogar.");
                exit();
          
            } else {
                header("Location: perfil.php?error=Ocorreu um erro ao atualizar o avatar.");
                exit();
           
            }
        } else {
            header("Location: perfil.php?error=Erro ao ler o conteúdo da imagem.");
            exit();
            
        }
    } else {
        header("Location: perfil.php?error=Erro ao processar a imagem.");
        exit();
       
    }
} else {
    header("Location: perfil.php?errorUsuário não autenticado.");
    exit();
   
}


?>
