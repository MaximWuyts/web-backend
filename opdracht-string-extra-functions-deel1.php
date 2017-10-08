<?php
$fruit           = 'kokosnoot';
$aantalkarakters = strlen($fruit);
$karakter        = 'o';
$pos             = strpos($fruit,$karakter);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht String extra functions deel 1</title>
</head>
<body>
    <h1>Opdracht String extra functions deel1</h1>
    <ul>
        <li>Het aantal karakters van <?php  echo $fruit . ' is ' . $aantalkarakters ?></li>
        <li>de plaats van de letter <?php echo $karakter . ' in ' . $fruit .' is ' .$pos  ?></li>
    </ul>
</body>
</html>