<?php
session_start();

function senhaValida($senha) {
    if (strlen($senha) < 8) {
        return false;
    }
    if (!preg_match('/[A-Z]/', $senha)) {
        return false;
    }
    if (!preg_match('/[a-z]/', $senha)) {
        return false;
    }
    if (!preg_match('/[\W_]/', $senha)) {
        return false;
    }
    if (!preg_match('/[0-9]/', $senha)) {
        return false;
    }
    return true;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    include_once "../../conexao.php";

    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $check_query_usuario = "SELECT * FROM usuarios WHERE usuario = ?";
    $stmt_check_usuario = $db->prepare($check_query_usuario);
    $stmt_check_usuario->bindValue(1, $usuario, SQLITE3_TEXT);
    $result_check_usuario = $stmt_check_usuario->execute();

    if ($result_check_usuario->fetchArray(SQLITE3_ASSOC)) {
        header("Location: ../cadastro.php?error=Nome de usuário já existe");
        exit();
    }

    $check_query_email = "SELECT * FROM usuarios WHERE email = ?";
    $stmt_check_email = $db->prepare($check_query_email);
    $stmt_check_email->bindValue(1, $email, SQLITE3_TEXT);
    $result_check_email = $stmt_check_email->execute();

    if ($result_check_email->fetchArray(SQLITE3_ASSOC)) {
        header("Location: ../cadastro.php?error=E-mail já existe");
        exit();
    }

    $check_query_telefone = "SELECT * FROM usuarios WHERE telefone = ?";
    $stmt_check_telefone = $db->prepare($check_query_telefone);
    $stmt_check_telefone->bindValue(1, $telefone, SQLITE3_TEXT);
    $result_check_telefone = $stmt_check_telefone->execute();

    if ($result_check_telefone->fetchArray(SQLITE3_ASSOC)) {
        header("Location: ../cadastro.php?error=Telefone já existe");
        exit();
    }
    if (preg_match('/^\(\d{2}\)\s\d\s\d{4}-\d{4}$/', $telefone)) {
    } else {
        header("Location: ../cadastro.php?error=Telefone inválido");
        exit();
    }
    if (!senhaValida($senha)) {
        header("Location: ../cadastro.php?error=Senha inválida. A senha deve ter pelo menos 8 caracteres, 1 letra maiúscula, 1 letra minúscula, 1 símbolo e 1 número.");
        exit();
    }
    $status = "ativo";
    $plano = "free";
    $admin = "user";
    $usados = 0;
    $tokens = 1000;
    $token = generateRandomToken(); 
    $avatar = "https://th.bing.com/th/id/OIP.6ne0ETRLpjb1I2uWlUdY2wHaEo?pid=ImgDet&rs=1.jpg";

    $dataAtual = date('Y-m-d');
    $dataNova = date('Y-m-d', strtotime($dataAtual . ' + ' . '1'. ' days'));

    $insert_query = "INSERT INTO usuarios (usuario, senha, email, telefone, plano, admin, status, validade, tokens, usados, token, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $db->prepare($insert_query);
    $stmt_insert->bindValue(1, $usuario, SQLITE3_TEXT);
    $stmt_insert->bindValue(2, $senha, SQLITE3_TEXT);
    $stmt_insert->bindValue(3, $email, SQLITE3_TEXT);
    $stmt_insert->bindValue(4, $telefone, SQLITE3_TEXT);
    $stmt_insert->bindValue(5, $plano, SQLITE3_TEXT);
    $stmt_insert->bindValue(6, $admin, SQLITE3_TEXT);
    $stmt_insert->bindValue(7, $status, SQLITE3_TEXT);
    $stmt_insert->bindValue(8, $dataNova, SQLITE3_TEXT);
    $stmt_insert->bindValue(9, $tokens, SQLITE3_TEXT);
    $stmt_insert->bindValue(10, $usados, SQLITE3_TEXT);
    $stmt_insert->bindValue(11, $token, SQLITE3_TEXT);
    $stmt_insert->bindValue(12, $avatar, SQLITE3_TEXT);

    if ($stmt_insert->execute()) {
     
        header("Location: ../index.php?success=Conta criada com sucesso");
        exit();
    } else {
    
        header("Location: ../cadastro.php?error=Erro ao cadastrar");
        exit();
    }
} else {
    header("Location: ../cadastro.php?error=Erro ao cadastrar");
    exit();
}


function generateRandomToken($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $token = '';
    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $token;
}
?>
