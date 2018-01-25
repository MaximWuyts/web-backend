<?php
    session_start();
    //$message = Message::getMessage();
    $email = '';
    $password = '';
    if(isset($_SESSION['registration'])){
    
        $email = $_SESSION['registration']['email'];
        $email = $_SESSION['registration']['password'];
    }
    var_dump($_SESSION);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registratie Form</title>
</head>
<body>
   <h2>Registreer</h2>
    <form action="registratie-process.php" method="post">
        <ul> 
            <li>
                <label for="email">Email: </label>
                <input type="text" name="email" id="email" value="<?= $email ?>">
            </li>
            <li>
                <label for="password">Paswoord: </label>
                <input type="<?= ($password != '') ? 'text' : 'password' ?>" name="password" value="<?= $password?>">
                <input type="submit" name="generate-password" value="genereer een paswoord">
            </li>
            <li>
                <input type="submit" name="submit" value="registreer">
            </li>    
        </ul>
    </form>
</body>
</html>