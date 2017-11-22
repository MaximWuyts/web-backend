<?php 

//22u 35m 25sec 21 januari 1904 
$timestamp = mktime(22, 35, 25, 1, 21, 1904);

$date= date("d F Y, g:i:s A", $timestamp);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht Date</title>
</head>
<body>
<h3>Deel 1</h3>

<p> date -><?php echo $date?></p>




    
</body>
</html>