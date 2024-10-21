<?php
$dsn = 'mysql:host=localhost;dbname=tabula';
$username = 'root';
$password = 's3nhagener!ca';

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    die();
}
?>
