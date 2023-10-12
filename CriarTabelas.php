<?php
$db = new SQLite3("banco/banco.db");

$db->exec("CREATE TABLE IF NOT EXISTS usuarios (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    usuario TEXT NOT NULL UNIQUE,
    avatar TEXT NOT NULL,
    senha TEXT NOT NULL,
    email TEXT NOT NULL UNIQUE,
    telefone TEXT NOT NULL UNIQUE,
    validade DATE NOT NULL,
    status TEXT NOT NULL,
    plano TEXT NOT NULL,
    admin TEXT NOT NULL,
    tokens INTEGER NOT NULL,
    usados INTEGER NOT NULL,
    token TEXT NOT NULL
)");

$db->exec("INSERT INTO usuarios (  avatar, usuario, senha, email, telefone, validade, status, plano, admin, tokens, usados, token) VALUES ('https://th.bing.com/th/id/OIP.6ne0ETRLpjb1I2uWlUdY2wHaEo?pid=ImgDet&rs=1.jpg', 'admin', 'admin', 'admin', 'admin', '2022-01-01', 'active', 'free', 'admin', 0, 0, '')");

$db->exec("CREATE TABLE IF NOT EXISTS contagem (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    acessos INTEGER NOT NULL,
    downloads INTEGER NOT NULL,
    views INTEGER NOT NULL
)");

$db->exec("INSERT INTO contagem (acessos, downloads, views) VALUES (0, 0, 0)");

$db->exec("CREATE TABLE IF NOT EXISTS mensagens (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    nome TEXT NOT NULL,
    imagem TEXT NOT NULL,
    titulo TEXT NOT NULL,
    mensagem TEXT NOT NULL,
    data TEXT NOT NULL
)");

$db->exec("INSERT INTO mensagens (nome, imagem, titulo, mensagem, data) VALUES ('admin', 'https://th.bing.com/th/id/OIP.6ne0ETRLpjb1I2uWlUdY2wHaEo?pid=ImgDet&rs=1.jpg', 'admin', 'admin', '2022-01-01')");
?>
