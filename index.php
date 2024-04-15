<?php
include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

$page = $_GET["page"] ?? 1; // numero di pagina
$per_page = $_GET["per_page"] ?? 10; // definisco quanti elementi per pagina si avranno
$per_page = $per_page > 10 ? 10 : $per_page; // limito gli elementi per pagina
$offset = ($page - 1) * $per_page;

$stmt = $pdo->prepare("SELECT * FROM libri WHERE CONCAT(titolo, autore) LIKE :search LIMIT :per_page OFFSET :offset ");
$stmt->execute([
    "search" => "%$search%",
    "offset" => $offset,
    "per_page" => $per_page,
]);

$books = $stmt->fetchAll(); // Trasforma i risultati in un array normale

$stmt = $pdo->prepare("SELECT COUNT(*) AS num_of_books FROM libri WHERE CONCAT(titolo, autore) LIKE :search"); // Contiami tutti gli utenti per poter calcolare le pagine
$stmt->execute([
    'search' => "%$search%",
]);
$num_of_books = $stmt->fetch()['num_of_books'];
$tot_pages = ceil($num_of_books / $per_page);


include __DIR__ . '/includes/initial.php';



?>


<h1 class="text-center">Cerca il tuo prossimo libro preferito</h1>

<form class="row gap-3">
    <div class="col">
        <input type="text" name="search" class="form-control" placeholder="Cerca un libro">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Cerca</button>
    </div>
</form>



<!-- Cards -->

<div class="row justify-content-center"><?php
foreach ($books as $row) { ?>

        <div class="card col-5 col-md-3 col-lg-2 m-3">
            <div class="card-body">
                <h5 class="card-title"><?= "$row[titolo]" ?></h5>
                <p class="card-text"><?= "$row[autore] " ?></p>
                <p class="card-text"><?= "$row[genere] - $row[anno_pubblicazione] " ?></p>
                <a href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/details.php?id=<?= $row['id'] ?>"
                    class="btn btn-primary">Dettagli</a>
                <a href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/edit.php?id=<?= $row['id'] ?>"
                    class="btn btn-warning">Edit</a>
                <a href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/delete.php?id=<?= $row['id'] ?>"
                    class="btn btn-danger">Elimina</a>
            </div>
        </div>

        <?php
} ?>
</div>


<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item<?= $page == 1 ? ' disabled' : '' ?>">
            <a class="page-link"
                href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/index.php/?page=<?= $page - 1 ?><?= $search ? "&search=$search" : '' ?>">Previous</a>
        </li><?php

        for ($i = 1; $i <= $tot_pages; $i++) { ?>
            <li class="page-item<?= $page == $i ? ' active' : '' ?>">
                <a class="page-link"
                    href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/index.php/?page=<?= $i ?><?= $search ? "&search=$search" : '' ?>"><?= $i ?></a>
            </li><?php
        } ?>

        <li class="page-item<?= $page == $tot_pages ? ' disabled' : '' ?>">
            <a class="page-link"
                href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/index.php/?page=<?= $page + 1 ?><?= $search ? "&search=$search" : '' ?>">Next</a>
        </li>
    </ul>
</nav>
</div><?php

include __DIR__ . '/includes/end.php';