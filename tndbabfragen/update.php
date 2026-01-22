<?php
session_start();
//require "dbverbindung.php";
//require_once ("dbverbindung.php");
if(!isset($_SESSION['benutzer_id'])){
    header("location:loginseite.php");
    exit;
}
include "../db/dbverbindung.php";
if(isset($_POST['aktualisieren'])){
    //Speichern wir die Eingaben in paar Variablen
    $idnummer = htmlspecialchars($_POST['id']);
    $vorname = htmlspecialchars ($_POST['vorname']);
    $nachname = htmlspecialchars($_POST['nachname']);
    $email = htmlspecialchars ($_POST['email']); 
    //SQL Abfrage
    $sql = "Update teilnehmer SET vorname=?, nachname=?, email=? WHERE tID=?";
    //prepare statement
    $cmd= $verbindung->prepare($sql);
    //Abfrage ausführen
    $cmd->execute([$vorname, $nachname, $email, $idnummer]);

    //Umleitung
    header("location:../index.php");
    exit;
}

?>