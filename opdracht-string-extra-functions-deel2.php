<?php
$fruit           = 'ananas';
$karakter        = 'a';
$pos             = strpos($fruit,$karakter,3);
$upper           = strtoupper($fruit);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht String extra functions deel 2</title>
</head>
<body>
    <h1>Opdracht String extra functions deel2</h1>
    <ul>
        
        <li>de plaats van de laatste <?php echo $karakter . ' in ' . $fruit .' is ' .$pos  ?></li>
        <li>In hoofdletters --> <?php echo $upper ?>
    </ul>
</body>
</html>