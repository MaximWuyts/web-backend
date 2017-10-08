<?php

$voornaam   = 'Maxim';
$achternaam = 'Wuyts';

$volledigeNaam = $achternaam . ' ' . $voornaam;

$naamLengte = strlen($volledigeNaam);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht String concatenate deel1</title>
</head>
<body>
    <h1>Opdracht String concatenate deel1</h1>

    <ul>
        <li>Mijn naam: <?php echo $volledigeNaam ?></li>
        <li>Aantal karakters: <?php echo $naamLengte ?></li>
    </ul>
</body>
</html>