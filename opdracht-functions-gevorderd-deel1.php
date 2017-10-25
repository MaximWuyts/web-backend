<?php


$md5HashKey = 'd1fa402db91a7a93c4f414b8278ce073';


function functieEen($needle)
{
    global $md5HashKey;
    $aantal = strlen($md5HashKey);
    $waarde =  substr_count($md5HashKey, $needle);
    $nieuweWaarde = 100 / $aantal * $waarde;
    return $nieuweWaarde;
}

function functieTwee($md5HashKey,$needle)
{
    $aantal = strlen($md5HashKey);
    $waarde = substr_count($md5HashKey,$needle);
    $nieuweWaarde = 100 / $aantal * $waarde;

    return $nieuweWaarde;
}

function functieDrie($needle)
{
    $haystack = $GLOBALS['md5HashKey'];
    $aantal = strlen($haystack);
    $waarde = substr_count($haystack,$needle);
    $nieuweWaarde = 100 / $aantal * $waarde;

    return $nieuweWaarde;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht functions gevorderd deel1</title>
</head>
<body>
    <li>de needle 2  komt <?php echo functieEen(2) ?> % in de hash key -> <?php echo $md5HashKey?> </li>
    <li>de needle 8  komt <?php echo functieTwee($md5HashKey,8) ?> % in de hash key -> <?php echo $md5HashKey?> </li>
    <li>de needle a  komt <?php echo functieDrie('a') ?> % in de hash key -> <?php echo $md5HashKey?> </li>
</body>
</html>