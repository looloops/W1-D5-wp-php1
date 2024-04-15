<?php

$host = 'localhost';
$db = 'gestione_libreria';
$user = 'root';
$pass = '';

$dsn = "mysql:host=$host;dbname=$db";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

// comando che connette al database
$pdo = new PDO($dsn, $user, $pass, $options);

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('DELETE FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

header("Location: /FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/index.php"); // questa è il link alla pagina di re-indirizzamento