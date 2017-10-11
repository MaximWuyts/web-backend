<?php

$aantalSeconden = 221108521;

$aantalMinuten  = floor($aantalSeconden / 60);
$aantalUren     = floor($aantalMinuten / 60);
$aantalDagen    = floor($aantalUren / 24);
$aantalWeken    = floor($aantalDagen / 7);
$aantalMaanden  = floor($aantalDagen / 31);
$aantalJaren    = floor($aantalWeken / 52);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht conditionals statements if else deel2</title>
</head>
<body>
    <h1>opdracht conditionals statements if else deel2</h1>
    <ul>
    <li><?php echo 'aantal seconden --> ' . $aantalSeconden ?></li>
    <li><?php echo 'aantal minuten --> ' . $aantalMinuten ?></li>
    <li><?php echo 'aantal uren --> ' . $aantalUren ?></li>
    <li><?php echo 'aantal dagen --> ' . $aantalDagen ?></li>
    <li><?php echo 'aantal weken --> ' . $aantalWeken ?></li>
    <li><?php echo 'aantal maanden --> ' . $aantalMaanden ?></li>
    <li><?php echo 'aantal jaren --> ' . $aantalJaren ?></li>
    </ul>
</body>
</html>