<?php
    $nummer = 1;

    if($nummer == 1)
    {
        $dag = 'maandag';
    }   
    else if($nummer == 2)
    {
        $dag = 'dinsdag';
    }   
    else if($nummer == 3)
    {
        $dag = 'woensdag';
    }   
    else if($nummer == 4)
    {
        $dag = 'donderdag';
    }   
    else if($nummer == 5)
    {
        $dag = 'vrijdag';
    } 
    else if($nummer == 6)
    {
        $dag = 'zaterdag';
    }   
    else if($nummer == 7)
    {
        $dag = 'zondag';
    }   
    else
    {
        echo 'invalid';
    }

    $upper   = strtoupper($dag);
    $letter  = 'A';
    $ander   = 'a';
    $pos     = strpos($upper,$letter); 
    $replace = substr_replace($upper,$ander,$pos,1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht conditional statements if deel1</title>
</head>
<body>
    <p>opdracht conditional statements if deel1</p>
    <p>omdat het nummer <?php echo $nummer ?> is, is het vandaag <?php echo $dag ?>
    <p>in hoofdletters --> <?php echo $upper ?>
    <p><?php echo $replace?></p>
</body>
</html>