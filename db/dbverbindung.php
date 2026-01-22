<?php
$host="localhost";
$db="teilnehmerDB";
$benutzer="root";
$pass ="";

try{
    //Verbindung aufbauen PDO(parameter1, parameter2, parameter3)
    //parameter1=host und dbname, parameter2 benutzername parameter3 passwort
    $verbindung = new PDO("mysql:host=$host;dbname=$db;", $benutzer, $pass);
}catch(PDOException $e){
    //wenn einen Fehler gibt
    die("Fehler:".$e->getMessage());
}

?>