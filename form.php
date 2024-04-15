<?php
include __DIR__ . '/includes/db.php';
include __DIR__ . '/includes/initial.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titolo = $_POST['titolo'];
    $autore = $_POST['autore'];
    $anno_pubblicazione = $_POST['anno_pubblicazione'];
    $genere = $_POST['genere'];
    $cover = $_POST['cover'];


    $errors = [];

    // validare i dati

    if (strlen($titolo) > 200) {
        $errors['titolo'][] = 'Titolo non valido';
    }

    if (strlen($autore) > 100) {
        $errors['autore'][] = 'Autore non trovato';
    }

    if (strlen($anno_pubblicazione) > 4) {
        $errors['anno_pubblicazione'][] = 'Anno non valido';
    }

    if (strlen($genere) > 50) {
        $errors['genere'][] = 'Genere non valido';
    }
    /*     echo '<pre>' . print_r($errors, true) . '</pre>'; */

    if ($errors == []) {

        $stmt = $pdo->prepare("INSERT INTO libri (titolo, autore, anno_pubblicazione, genere, cover) VALUES (:titolo, :autore, :anno_pubblicazione, :genere,)");
        $stmt->execute([
            "titolo" => $titolo,
            "autore" => $autore,
            "anno_pubblicazione" => $anno_pubblicazione,
            "genere" => $genere,
            ,
        ]);



    }
    ;




} ?>






<div class="d-flex justify-content-center mx-auto mt-4">
    <form style="width: 500px" action="" method="post">
        <div class="mb-3">
            <label for="titolo" class="form-label">Titolo libro</label>
            <input type="text" class="form-control" name="titolo" id="titolo" />
        </div>
        <div class="mb-3">
            <label for="autore" class="form-label">Autore del libro</label>
            <input type="text" class="form-control" name="autore" id="autore" />
        </div>
        <div class="mb-3">
            <label for="anno_pubblicazione" class="form-label">Anno di uscita</label>
            <input type="number" class="form-control" name="anno_pubblicazione" id="anno_pubblicazione" />
        </div>
        <div class="mb-3">
            <label for="genere" class="form-label">Genere del libro</label>
            <input type="text" class="form-control" name="genere" id="genere" />
        </div>
        <div class="mb-3">
            <label for="genere" class="form-label">URL immagine di copertina</label>
            <input type="text" class="form-control" name="cover" id="cover" />
        </div>


        <button type="submit" class="btn btn-primary">Submit</button>



    </form>
</div>
<?php

include __DIR__ . '/includes/end.php';