<?php
include "../db/dbverbindung.php";

if(isset($_POST['speichern'])){

    $vorname= $_POST['vorname'];
    $nachname= $_POST['nachname'];
    $email= $_POST['email'];

    $sql = "INSERT INTO teilnehmer (vorname, nachname,email) VALUES (?, ?, ?) ";
    $cmd = $verbindung->prepare($sql);
    $cmd->execute([$vorname, $nachname, $email]);

    header("location:../index.php");
    exit;



}



?>
