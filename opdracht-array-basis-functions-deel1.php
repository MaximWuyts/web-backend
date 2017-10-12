<?php
$dieren = array('hond','kat','luipaard','egel','vis','spin');
$aantal = count($dieren);

$teZoekenDier = 'hond';
if(in_array($teZoekenDier,$dieren))
{
    $antwoord = 'Het zit erin!';
}
else
{
    $antwoord = 'het zit er niet in!';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht array functions deel1</title>
</head>
<body>
    <h1>opdracht array functions deel1</h1>
    <?php echo ' elementen in de array --> ' . $aantal . ' en ' . $teZoekenDier . ' --> ' . $antwoord ?>
</body>
</html>