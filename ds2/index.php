<?php

$link = mysqli_connect("localhost", "root", "", "");

if(mysqli_connect_error()){

    die("Database fout");

}

$reservering_id = $_GET['id'];

$reservering_id = $reservering_id ?: 2;

$query = "SELECT gerechten.gerechtnaam, gerechten.prijs, bestellingen.aantal, reserveringen.klantnummer, reserveringen.datum
          FROM `bestellingen` 
          INNER JOIN `gerechten` 
          ON bestellingen.gerecht_id = gerechten.gerecht_id
          INNER JOIN `reserveringen` 
          ON bestellingen.reservering_id = reserveringen.reservering_id
          WHERE bestellingen.reservering_id = ${reservering_id}";

$result = mysqli_query($link, $query);

$out = '';
$total = '';

$nr = mysqli_num_rows($result) +1;
while ($row = mysqli_fetch_assoc($result)) {

    $out .= '
          <tr>
            <td>'.$row['gerechtnaam'].'</td>
            <td>'.$row['prijs'].' EUR</td>
            <td>'.$row['aantal'].'</td>
            <td>'.$row['aantal'] * $row['prijs'].' EUR</td>
          </tr>
  ';

    $total += $row['aantal'] * $row['prijs'];
}

$query = "SELECT reserveringen.klantnummer, reserveringen.datum, reserveringen.aantal,klanten.voornaam, klanten.tussenvoegsel, klanten.achternaam
          FROM `bestellingen` 
          INNER JOIN `reserveringen` 
          ON bestellingen.reservering_id = reserveringen.reservering_id
          INNER JOIN `klanten` 
          ON reserveringen.klantnummer = klanten.klantnummer
          WHERE bestellingen.reservering_id = ${reservering_id}";

$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);

$name = $row['voornaam'].' '.$row['tussenvoegsel'].' '.$row['achternaam'];

?>

<!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">

    <title>Factuur</title>

    <style>

    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <h1>Factuur:</h1> <br>
    <p>
        Klant nummer: <?= $row['klantnummer'] ?> <br>
        Naam: <?= $name ?><br>
        Datum: <?= $row['datum'] ?><br>
        Aantal mensen: <?= $row['aantal'] ?> <br>
    </p>

    <table class="table table-striped">
        <tr>
            <th>Gerecht</th>
            <th>Prijs</th>
            <th>Aantal</th>
            <th>SubTotaal</th>
        </tr>

        <?=$out?>

    </table>

    <h1 style="text-align: right">Totaal: <?=$total?> EUR</h1>

</div>

<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>

</body>
</html>