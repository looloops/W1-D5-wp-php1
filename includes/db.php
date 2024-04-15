<?php
// se ci sono stati inviati dei dati
// allora validarli e fare tutto il resto (tra cui salvare i dati nel database)
// se NON sono validi rimaniamo in questa pagina e ripresentiamo il form all'utente
// se sono validi ridirezionamo l'utente su una pagina diversa con un messaggio di successo


// connessione al database
$host = "localhost";
$db = "gestione_libreria";
$user = "root";
$pass = "";


$dsn = "mysql:host=$host;dbname=$db";

$options = [

    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO:: ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,

];

// comando che connette al databse
$pdo = new PDO($dsn, $user, $pass, $options);