<?php

$dag = 3;

switch($dag)
{
    case 1:
        $antwoord =  'Het is maandag';
        break;
    case 2:
        $antwoord = ' Het is dindsdag';
        break;
    case 3:
        $antwoord =  ' het is woensdag';
        break;  
    case 4:
        $antwoord =  'het is donderdag';
        break;      

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>Het antwoord --> <?php echo $antwoord?></p>
</body>
</html>