<?php
include "../db/dbverbindung.php";

if(isset($_GET['tidnummer'])){
    $tID=htmlspecialchars($_GET['tidnummer']);
    //SQL Abfrage
    $sql="DELETE FROM teilnehmer WHERE tID=?";
    $cmd = $verbindung->prepare($sql);
    $cmd->execute([$tID]);

    //
    header("location:../index.php");
    exit;

}


?>