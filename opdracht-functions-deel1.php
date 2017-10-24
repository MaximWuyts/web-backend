<?php

function berekenSom($getal1,$getal2)
{
    $resultaat = $getal1 + $getal2;
    
    return $resultaat;
}

function vermenigvuldig($getal1,$getal2)
{
    $resultaat = $getal1 * $getal2;
    
    return $resultaat;
}

function isEven($getal1)
{
    if($getal1 % 2 == 0){
        return true;
    }
    else return false;
}

function stringVerander($woord)
{
    $stringArray['lengte'] = strlen($woord);
    $stringArray['upper']  = strtoupper($woord);
    
    return $stringArray;
}
$woord = "ik vind dat best een goed liedje!";

$resultaat = stringVerander($woord);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht funtions deel1</title>
</head>
<body>
    <li>de som -->  <?php echo berekenSom(2,4) ?></li>
    <li>het product-->  <?php echo vermenigvuldig(2,8) ?></li>
    <li>even of niet -->  <?php echo (isEven(3)? ' ja ':' nee ') ?></li>
    <li>lengte --> <?php echo $resultaat['lengte']  ?></li>
    <li>hoofdletter --> <?php echo $resultaat['upper'] ?></li>

</body>
</html>