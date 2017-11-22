<?php 
$username   = 'maximus';
$password   = 'demaxim';
$message    ='';
if ( isset($_POST['submit']))
{
    if( $_POST['username'] == $username && $_POST['password'] == $password ){
        $message = 'Welkom';
    } 
    else{
        $message= 'Er ging iets mis bij het inloggen, probeer opnieuw!';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Opdracht Post</title>
</head>
<body>
<h1>Inloggen</h1>
<form action="opdracht-post.php" method="post">
<label for="username">Username: </label>
<input type="text" name="username" id="username">
<label for="password">Password: </label>
<input type="password" name="password" id="password">
<input type="submit" name="submit">


</form>
    
<p><?php echo $message ?></p>
</body>
</html>