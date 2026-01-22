<?php
session_start();
//require "dbverbindung.php";
//require_once ("dbverbindung.php");
if(!isset($_SESSION['benutzer_id'])){
    header("location:loginseite.php");
    exit;
}
include "db/dbverbindung.php";
//Daten von der Datenbank laden
$sql="SELECT * FROM teilnehmer";
$cmd = $verbindung->query($sql);
//Associative Array als ergebniss
$alleteilnehmer=$cmd->fetchAll();
//print_r($alleteilnehmer);
?>
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GPB Teilnehmerverwaltung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #0055a5; } /* GPB-ähnliches Blau */
        .card { margin-bottom: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
    </style>
</head>
<body>

    <nav class="navbar navbar-dark mb-4">
        <div class="container">
            <span class="navbar-brand mb-0 h1">GPB | Teilnehmerverwaltung</span>
            <span> <a href="auth/logout.php" class="btn btn-danger"> Ausloggen</a></span>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        Neuen Teilnehmer anlegen
                    </div>
                    <div class="card-body">
                        <form method="POST" action="tndbabfragen/insert.php" >
                            <div class="mb-3">
                                <label class="form-label">Vorname</label>
                                <input type="text" name="vorname" class="form-control" placeholder="Max">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Nachname</label>
                                <input type="text" name="nachname" class="form-control" placeholder="Mustermann">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">E-Mail</label>
                                <input type="email" name="email" class="form-control" placeholder="max@beispiel.de">
                            </div>
                            <button type="submit" name="speichern" class="btn btn-success w-100">Speichern</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header bg-secondary text-white">
                        Aktuelle Teilnehmerliste
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>Vorname</th>
                                    <th>Nachname</th>
                                    <th>E-Mail</th>
                                    <th>Aktionen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    foreach($alleteilnehmer as $tn){
                                ?>
                                <tr>
                                    <td><?php echo $tn['tID'];?></td>
                                    <td><?php echo $tn['vorname'];?></td>
                                    <td><?php echo $tn['nachname'];?></td>
                                    <td><?php echo $tn['email'];?></td>
                                    <td>
                                        <a href="bearbeiten.php?tidnummer=<?php echo $tn['tID'];?>" class="btn btn-sm btn-warning">Edit</a>
                                        <a href="tndbabfragen/loeschen.php?tidnummer=<?php echo $tn['tID'];?>" class="btn btn-sm btn-danger">Löschen</a>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>