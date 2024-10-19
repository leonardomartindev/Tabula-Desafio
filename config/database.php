<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=tabula', 'root', 's3nhagener!ca');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
    die();
}
