<?php
    session_start();
    session_destroy();
    header("location:../loginseite.php");
    exit;

?>