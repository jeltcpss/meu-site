<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];

    include '../../conexao.php';

    $query = "SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':usuario', $usuario);
    $stmt->bindParam(':senha', $senha);
    $result = $stmt->execute();

    if ($row = $result->fetchArray(SQLITE3_ASSOC)) {
        $_SESSION["admin"] = $row["admin"];
        $_SESSION["avatar"] = $row["avatar"];
        $_SESSION["usuario"] = $row["usuario"];
        $_SESSION["senha"] = $row["senha"];
        $_SESSION["email"] = $row["email"];
        $_SESSION["telefone"] = $row["telefone"];
        $_SESSION["status"] = $row["status"];
        $_SESSION["validade"] = $row["validade"];
        $_SESSION["tokens"] = $row["tokens"];
        $_SESSION["plano"] = $row["plano"];
        $_SESSION["usados"] = $row["usados"];
        $_SESSION["token"] = $row["token"];

        $Lacessos = "UPDATE contagem SET acessos = acessos + 1";
        $db->exec($Lacessos);

        header("Location: ../dashboard.php");
    } else {
        header("Location: ../index.php?error=Usuaário ou senha incorretos");
       
    }

    $db->close();
}
?>
