<?php
$lettertje       = 'e';
$cijfertje       = 3;
$langstewoord    = 'zandzeepsodemineralenwatersteenstralen';
$vervang         = str_replace($lettertje,$cijfertje,$langstewoord); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht String extra functions deel 3</title>
</head>
<body>
    <h1>Opdracht String extra functions deel3</h1>
    <ul>
        <li>het woord <?php echo $langstewoord ?> waarin de letter e vervangen is door een 3 --> <?php echo $vervang ?></li>
    </ul>
</body>
</html>