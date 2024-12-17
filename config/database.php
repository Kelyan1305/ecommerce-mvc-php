<?php
$host = 'localhost';
$dbname = 'ecommerce';
$username = 'root'; // Changez en fonction de votre configuration
$password = ''; // Changez en fonction de votre configuration

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
?>
