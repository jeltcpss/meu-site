<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupere os valores enviados pelo formulário
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];
    $plano = $_POST["plano"];
    $admin = $_POST["admin"];
    $validade = $_POST["validade"];
    
    $status = "ativo";
    $usados = 0;
    $tokens = 1000;
    $token = generateRandomToken(); 
    $avatar = "https://th.bing.com/th/id/OIP.6ne0ETRLpjb1I2uWlUdY2wHaEo?pid=ImgDet&rs=1.jpg";

    $dataAtual = date('Y-m-d');
    $dataNova = date('Y-m-d', strtotime($dataAtual . ' + ' . $validade . ' days'));

    include '../../conexao.php'; 

    $stmt = $db->prepare("INSERT INTO usuarios (usuario, senha, email, telefone, plano, admin, status, validade, tokens, usados, token, avatar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $usuario);
    $stmt->bindParam(2, $senha);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $telefone);
    $stmt->bindParam(5, $plano);
    $stmt->bindParam(6, $admin);
    $stmt->bindParam(7, $status);
    $stmt->bindParam(8, $dataNova);
    $stmt->bindParam(9, $tokens);
    $stmt->bindParam(10, $usados);
    $stmt->bindParam(11, $token);
    $stmt->bindParam(12, $avatar);

    if ($stmt->execute()) {
       
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo "Erro ao adicionar usuário.";
    }
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
