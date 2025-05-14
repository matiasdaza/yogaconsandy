<?php
$host = 'localhost';      // Ej: 'localhost' o 'mysql.hostinger.com'
$dbname = 'u897077398_VishnuBD';    // Ej: 'u123456789_mibd'
$username = 'u897077398_ShivaADM';       // Ej: 'u123456789_user'
$password = 'D9n$mhC9tL>';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}
?>
