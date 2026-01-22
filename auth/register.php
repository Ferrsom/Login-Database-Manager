<?php
include "../db/dbverbindung.php";
if(isset($_POST['register'])){
    
    $benutzername = htmlspecialchars($_POST['benutzername']);
    $passwort1 = htmlspecialchars($_POST['passwort1']);
    $passwort2 = htmlspecialchars($_POST['passwort2']);
    //uberprüfen ob passwort1=passwort2
    if($passwort1==$passwort2 && strlen($passwort1)>8){
        //sichere Passwort 
        $sicherpass = password_hash($passwort1, PASSWORD_DEFAULT);
        //password_verify(122321212, lklkjsdfkjsdflkjasdkl;fjasdfiouoieru3487)
        //sql Abfrage
        $sql = "INSERT into benutzer (benutzername, passwort) VALUES (?, ?) ";
        //prepare statement
        $cmd = $verbindung->prepare($sql);
        $cmd->execute([$benutzername, $sicherpass]);
        //Umleitung
        header("location:../loginseite.php");
        exit;

    }else{
        header("location:../registerseite.php?pass=false");
        exit;
    }






}






?>