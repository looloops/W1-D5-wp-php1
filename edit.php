<?php
include __DIR__ . '/includes/db.php';

// SELECT DI TUTTE LE RIGHE A PARTIRE DALL'ID DELL'URL (che abbiamo passato con link dalla pagina searchbar)
$stmt = $pdo->prepare('SELECT * FROM libri WHERE id = ?');
$stmt->execute([$_GET["id"]]);

$row = $stmt->fetch();


include __DIR__ . '/includes/initial.php'; ?>

<h1 class="text-center">Edit</h1>

<form action="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/edit-logic.php" method="POST" novalidate>
    <input type="hidden" name="id" value="<?= $row['id'] ?>">
    <div class="mb-3">
        <label for="titolo" class="form-label">Titolo</label>
        <input type="text" class="form-control" id="titolo" name="titolo" value="<?= $row['titolo'] ?>">
    </div>
    <div class="mb-3">
        <label for="autore" class="form-label">autore</label>
        <input type="text" class="form-control" id="autore" name="autore" value="<?= $row['autore'] ?>">
    </div>
    <div class="mb-3">
        <label for="genere" class="form-label">genere</label>
        <input type="text" class="form-control" id="genere" name="genere" value="<?= $row['genere'] ?>">
    </div>
    <div class="mb-3">
        <label for="anno_pubblicazione" class="form-label">anno_pubblicazione</label>
        <input type="number" class="form-control" id="anno_pubblicazione" name="anno_pubblicazione"
            value="<?= $row['anno_pubblicazione'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Modifica</button>
</form>


<?php include __DIR__ . '/includes/end.php';