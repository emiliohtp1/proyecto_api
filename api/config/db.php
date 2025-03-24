<?php
// db.php
$host = 'localhost';
$dbname = 'mi_base_de_datos';
$username = 'usuario';
$password = 'contraseña';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["message" => "Error de conexión a la base de datos: " . $e->getMessage()]);
    exit();
}
