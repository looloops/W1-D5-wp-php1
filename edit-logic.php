<?php
include __DIR__ . '/includes/db.php';

$id = $_POST['id'];
$titolo = $_POST['titolo'];
$autore = $_POST['autore'];
$anno_pubblicazione = $_POST['anno_pubblicazione'];
$genere = $_POST['genere'];


$stmt = $pdo->prepare("UPDATE libri SET titolo = :titolo, autore = :autore, anno_pubblicazione = :anno_pubblicazione, genere = :genere WHERE id = :id");
$stmt->execute([
    'id' => $id,
    'titolo' => $titolo,
    'autore' => $autore,
    'anno_pubblicazione' => $anno_pubblicazione,
    'genere' => $genere,
]);

header("Location: /FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/index.php/");