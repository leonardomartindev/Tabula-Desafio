<?php
$dsn = 'mysql:host=localhost;dbname=tabula';
$username = 'seu_usuario';
$password = 'sua_senha';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    die();
}
?>
