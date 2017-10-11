<?php
$waarde = 32;
if($waarde >= 0 && $waarde <= 10)
{
    $zin = 'het getal ligt tussen 0 en 10';
    $omgekeerd = strrev($zin);   
}
elseif($waarde >= 11 && $waarde < 20)
{
    $zin = 'het getal ligt tussen 10 en 20';
    $omgekeerd = strrev($zin);   
}
elseif($waarde >= 21 && $waarde <= 30)
{
    $zin = 'het getal ligt tussen 20 en 30';
    $omgekeerd = strrev($zin);   
}
elseif($waarde >= 31 && $waarde <= 40)
{
    $zin = 'het getal ligt tussen 30 en 40';
    $omgekeerd = strrev($zin);   
}
elseif($waarde >= 41 && $waarde <= 50)
{
    $zin = 'het getal ligt tussen 40 en 50';
    $omgekeerd = strrev($zin);   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht if else if deel 1</title>
</head>
<body>
    <h1>opdracht if else if deel 1</h1>
    <?php echo $waarde . ' en ' . $zin . ' omgekeerd is het --> '. $omgekeerd ?>

</body>
</html>