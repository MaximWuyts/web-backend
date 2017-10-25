<?php

$pigHealth     = 5;
$maximumThrows = 8;

function calculateHit()
{
    global $pigHealth;
    $raakkans = rand(0,100);

    if($raakkans < 60)
    {
        --$pigHealth;
        $aantalover = 'Raak! Er zijn nog maar ' . $pigHealth  .' varkens over.';
        return $aantalover;
    }
    else
    {
        $aantalover = 'Mis! Nog ' . $pigHealth . ' varkens in het team.';
        return $aantalover;
    }
}


function launchAngryBird()
{
    global $maximumThrows;
    static $throws = 0;
    global $pigHealth;
    if($throws < $maximumThrows)
    {
        ++$throws;
        launchAngryBird();
    }
    else if($throws == $maximumThrows)
    {
        if($pigHealth <= 0)
        {
            $en = 'Gewonnen!';
            return $en;
        }
        else 
        {
            $en = 'verloren';
            return $en;
        }
    }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht functions gevorderd deel2</title>
</head>
<body>
    
    <?php echo calculateHit(); ?>
    <?php echo calculateHit(); ?>
    <?php echo calculateHit(); ?>
    <?php echo calculateHit(); ?>
    <?php echo calculateHit(); ?>
    <?php echo calculateHit(); ?>
    <?php echo calculateHit(); ?>
    <?php echo launchAngryBird(); ?>
    <?php echo launchAngryBird(); ?>
</body>
</html>