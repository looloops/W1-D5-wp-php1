<?php
include __DIR__ . '/includes/db.php';

// SELECT DI TUTTE LE RIGHE
$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();

include __DIR__ . '/includes/initial.php';
?>

<h1><img src="<?= $row['cover'] ?>"></h1>

<h1><?= $row['titolo'] ?></h1>
<h2><?= $row['autore'] ?></h2>
<p><?= $row['anno_pubblicazione'] . " " . $row['genere'] ?></p>
<a href="/FSD%20IFOA/BE-S1-L5/details.php?id=<?= $row['id'] ?>" class="btn btn-primary">Dettagli</a>
<a href="/FSD%20IFOA/BE-S1-L5/edit.php?id=<?= $row['id'] ?>" class="btn btn-warning">Edit</a>
<a href="/FSD%20IFOA/BE-S1-L5/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>



<div>



</div>


<?php

include __DIR__ . '/includes/end.php';