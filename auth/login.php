<?php
session_start();
include "../db/dbverbindung.php";

if(isset($_POST['login'])){
    $benutzername = htmlspecialchars($_POST['benutzername']);
    $passwort = htmlspecialchars($_POST['passwort']);

    $sql = "SELECT * FROM benutzer WHERE benutzername=?";
    $cmd = $verbindung->prepare($sql);
    $cmd->execute([$benutzername]);

    if($cmd->rowCount()>0){

        $benutzer = $cmd->fetch();

        if(password_verify($passwort, $benutzer['passwort'])){

            $_SESSION['benutzer_id'] = $benutzer['bid'];
            header("location:../index.php");
            exit;
        }else{
            header("location:../loginseite.php?passwort=f");
            exit;
        }
    }else{
        header("location:../loginseite.php?benutzer=f");
        exit;
    }
}
