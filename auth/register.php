<?php
include "../db/dbverbindung.php";
if(isset($_POST['register'])){
    
    $benutzername = htmlspecialchars($_POST['benutzername']);
    $passwort1 = htmlspecialchars($_POST['passwort1']);
    $passwort2 = htmlspecialchars($_POST['passwort2']);

    if($passwort1==$passwort2 && strlen($passwort1)>8){

        $sicherpass = password_hash($passwort1, PASSWORD_DEFAULT);

        $sql = "INSERT into benutzer (benutzername, passwort) VALUES (?, ?) ";

        $cmd = $verbindung->prepare($sql);
        $cmd->execute([$benutzername, $sicherpass]);

        header("location:../loginseite.php");
        exit;

    }else{
        header("location:../registerseite.php?pass=false");
        exit;
    }


}


?>
