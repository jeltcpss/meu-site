<?php


$db = new SQLite3(realpath($_SERVER['DOCUMENT_ROOT'] . '/banco/banco.db'));

$queryContagem = "SELECT COUNT(*) as total FROM usuarios";
$resultContagem = $db->query($queryContagem);

if ($rowContagem = $resultContagem->fetchArray(SQLITE3_ASSOC)) {
    $total_usuarios = $rowContagem['total'];
} else {
    $total_usuarios = 0; 
}

$querySoma = "SELECT SUM(usados) as total_tokens_usados FROM usuarios";
$resultSoma = $db->query($querySoma);

if ($rowSoma = $resultSoma->fetchArray(SQLITE3_ASSOC)) {
    $total_tokens_usados = $rowSoma['total_tokens_usados'];
} else {
    $total_tokens_usados = 0; 
}




$query = "SELECT * FROM usuarios, contagem, mensagens";
$result = $db->query($query);

while ($banco = $result->fetchArray(SQLITE3_ASSOC)) {
    
    $nome = $banco['nome'];
    $imagemUrl = $banco['imagem'];
    $titulo = $banco['titulo'];
    $mensagens = $banco['mensagem'];
    $data = $banco['data'];

    $downloads = $banco['downloads'];
    $visualizacao = $banco['views'];
    $acessos = $banco['acessos'];




}



    
?>