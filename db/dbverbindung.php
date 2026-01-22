<?php
$host="localhost";
$db="teilnehmerDB";
$benutzer="root";
$pass ="";

try{
    $verbindung = new PDO("mysql:host=$host;dbname=$db;", $benutzer, $pass);
}catch(PDOException $e){
    die("Fehler:".$e->getMessage());
}

?>
