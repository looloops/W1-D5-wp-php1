<?php
include __DIR__ . '/includes/db.php';

$search = $_GET['search'] ?? '';

$page = $_GET["page"] ?? 1; // numero di pagina
$per_page = $_GET["per_page"] ?? 10; // definisco quanti elementi per pagina si avranno
$per_page = $per_page > 10 ? 10 : $per_page; // limito gli elementi per pagina
$offset = ($page - 1) * $per_page;

/* print_r($_GET); */

/* $stmt = $pdo->prepare("SELECT * FROM Users WHERE Name LIKE ?"); */
/* $stmt = $pdo->prepare("SELECT * FROM Users WHERE Name LIKE ? OR Surname LIKE ?"); */
$stmt = $pdo->prepare("SELECT * FROM Users WHERE CONCAT(Name, Surname) LIKE :search LIMIT :per_page OFFSET :offset ");
$stmt->execute([
    "search" => "%$search%",
    "offset" => $offset,
    "per_page" => $per_page,
]);

$users = $stmt->fetchAll(); // Trasforma i risultati in un array normale

$stmt = $pdo->prepare("SELECT COUNT(*) AS num_of_users FROM Users WHERE CONCAT(Name, Surname) LIKE :search"); // Contiami tutti gli utenti per poter calcolare le pagine
$stmt->execute([
    'search' => "%$search%",
]);
$num_of_users = $stmt->fetch()['num_of_users'];
$tot_pages = ceil($num_of_users / $per_page);


include __DIR__ . '/includes/initial.php';
include __DIR__ . '/includes/navbar.php';


?>


<h1 class="text-center">Benvenuto! Esplora i nostri utenti:</h1>

<form class="row gap-3">
    <div class="col">
        <input type="text" name="search" class="form-control" placeholder="Cerca un utente">
    </div>
    <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Cerca</button>
    </div>
</form>



<!-- INIZIO FOREACH PER LE CARD  -->

<div class="row justify-content-center"><?php
foreach ($users as $row) { ?>

        <div class="card col-5 col-md-3 col-lg-2 m-3">
            <img src="..." class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= "$row[Name]" ?></h5>
                <p class="card-text"><?= "$row[Surname] - $row[Age] " ?></p>
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


<!--    VARIANTE CON LA LISTA
 <ul><?php
 foreach ($users as $row) { ?>

            <li class="mb-3">
                <?= "$row[id] - $row[Name] - $row[Surname] - $row[Age]" ?>
                <a href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/details.php?id=<?= $row['id'] ?>" class="btn btn-primary">Vai</a>
                <a href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">Elimina</a>
            </li>
          
            <?php
 } ?>
    </ul> -->


<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item<?= $page == 1 ? ' disabled' : '' ?>">
            <a class="page-link"
                href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/searchbar.php/?page=<?= $page - 1 ?><?= $search ? "&search=$search" : '' ?>">Previous</a>
        </li><?php

        for ($i = 1; $i <= $tot_pages; $i++) { ?>
            <li class="page-item<?= $page == $i ? ' active' : '' ?>">
                <a class="page-link"
                    href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/searchbar.php/?page=<?= $i ?><?= $search ? "&search=$search" : '' ?>"><?= $i ?></a>
            </li><?php
        } ?>

        <li class="page-item<?= $page == $tot_pages ? ' disabled' : '' ?>">
            <a class="page-link"
                href="/FULL%20STACK%20EPICODE/U1/W1%20-%20PHP%201/W1-D5%20wp-php1/searchbar.php/?page=<?= $page + 1 ?><?= $search ? "&search=$search" : '' ?>">Next</a>
        </li>
    </ul>
</nav>
</div><?php

include __DIR__ . '/includes/end.php';