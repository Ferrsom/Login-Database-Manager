<?php
session_start();

if(!isset($_SESSION['benutzer_id'])){
    header("location:loginseite.php");
    exit;
}
include "../db/dbverbindung.php";
if(isset($_POST['aktualisieren'])){
    
    $idnummer = htmlspecialchars($_POST['id']);
    $vorname = htmlspecialchars ($_POST['vorname']);
    $nachname = htmlspecialchars($_POST['nachname']);
    $email = htmlspecialchars ($_POST['email']); 

    $sql = "Update teilnehmer SET vorname=?, nachname=?, email=? WHERE tID=?";

    $cmd= $verbindung->prepare($sql);

    $cmd->execute([$vorname, $nachname, $email, $idnummer]);

    header("location:../index.php");
    exit;
}

?>
