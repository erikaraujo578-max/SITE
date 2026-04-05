<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'biblioteca_livros');

try {
    $conexao = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    
    if ($conexao->connect_error) {
        die("Erro na conexão: " . $conexao->connect_error);
    }
    
    $conexao->set_charset("utf8mb4");
} catch (Exception $e) {
    die("Erro: " . $e->getMessage());
} 
?>