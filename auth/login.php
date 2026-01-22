<?php
session_start();
include "../db/dbverbindung.php";

if(isset($_POST['login'])){
    $benutzername = htmlspecialchars($_POST['benutzername']);
    $passwort = htmlspecialchars($_POST['passwort']);
    //SQL Abfrage
    $sql = "SELECT * FROM benutzer WHERE benutzername=?";
    $cmd = $verbindung->prepare($sql);
    $cmd->execute([$benutzername]);
    //Uberprüfen ob die Benutzername gefunden wurde
    if($cmd->rowCount()>0){ //ob es Benutzer gibt
        //Benutzer Datei
        $benutzer = $cmd->fetch();
        //Passwort uberprüfen
        if(password_verify($passwort, $benutzer['passwort'])){
            //Session einsetzen
            $_SESSION['benutzer_id'] = $benutzer['bid'];
            header("location:../index.php");
            exit;
        }else{ //Benutzer wahr Passwort falsch
            header("location:../loginseite.php?passwort=f");
            exit;
        }
    }else{
        header("location:../loginseite.php?benutzer=f");
        exit;
    }
}