<?php
define('DB_HOST', 'localhost');
define('DB_USER', '980540');
define('DB_PASS', '980540');
define('DB_NAME', '980540');

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