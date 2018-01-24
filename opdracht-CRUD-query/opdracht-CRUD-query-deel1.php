<?php
    
$message = false;
try{
    
    $db = new PDO('mysql:host=localhost;dbname=bieren', 'root','');
    //Verbinding maken met database
    
    $queryString = 'SELECT *
                        FROM bieren 
                        INNER JOIN brouwers
                        ON bieren.brouwernr = brouwers.brouwernr
                        WHERE bieren.naam LIKE "Du%"
                        AND brouwers.brnaam LIKE "%a%"';
    
    $statement = $db->prepare($queryString);
    $statement->execute();
    
    
    $message['text'] = 'De connectie is gelukt.';
    
    
    $bieren = array();
    
    while($row = $statement->fetch(PDO::FETCH_ASSOC)){
        $bieren[] = $row;
    }
    $columnNames = array();
    $columnNames[] = 'Biernummer';
    
    foreach($bieren[0] as $key => $bier){
        $columnNames[] = $key;
    }
}
catch (PDOException $e){
    $message['type'] = 'error';
    $message['text'] = 'De connectie is niet gelukt. ' . $e->getMessage();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
    <style>
			.modal
			{
				padding			:	6px;
				border-radius	:	3px;
			}
			.success
			{
				background-color:lightgreen;
			}
			.error
			{
				background-color:red;
			}
			.even
			{
				background-color:lightgrey;
			}
		</style>
</head>
<body>
    <p><?php echo $message['text'] ?></p>
    
    
    <table>
        <thead class="even">
            <tr>
               <?php foreach($columnNames as $columnName): ?>
                   <th><?= $columnName ?></th>
                <?php endforeach ?>
            </tr>
        </thead>
        
        <tbody>
           <?php foreach($bieren as $key =>$bier): ?>
                <tr class="<?= (($key+1)%2==0)? 'even' : '' ?>">
                    <td><?= ($key+1) ?></td>
                    <?php foreach($bier as $value): ?>
                    <td><?= $value ?></td>
                    <?php endforeach ?>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>