<?php
    session_start();
	if(isset($_SESSION['message'])) {
        $message = $_SESSION['message'];
        echo $message;
		unset($_SESSION['message']);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>opdracht Ajax</title>
</head>
    <body>
        <div id="placeholder">
            <form action="contact.php" method="post" id="form">
                <h1>Contacteer ons</h1>
                <ul>
                    <li>
                        <label>Emailadres</label>
                        <input type="text" name="email" id="email">
                    </li>
                    <li>
                        <label>Boodschap</label>
                        <textarea id="boodschap" name="boodschap"></textarea>
                    </li>
                    <li>
                        <input type="checkbox" name="check" id="check">
                        <label>Stuur een kopie naar jezelf</label>
                    </li>
                </ul>
                <input type="submit" id="submit" name="submit">
            </form>
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(function(){
            $('#form').submit(function(){
                $.ajax({
                    type: 'POST',
                    url: 'contact-api.php',
                    data: $('#form').serialize(),
                    success: function(apiData) {
                        console.log(apiData);
                        apiData = JSON.parse(apiData);
                        if (apiData.type == 'error' || apiData.type == 'success') {
                            $('#placeholder form').fadeOut('slow', function(){
                                $('#placeholder').append('<p>'+ apiData.message + '</p>').hide().fadeIn('slow');
                            });
                        }
                    },
                    error: function() {
                        $('#placeholder form').fadeOut('slow', function(){
                            $('#placeholder').append('<p>Oeps, er ging iets mis. Probeer opnieuw!</p>').hide().fadeIn('slow');
                        });
                    }
                })
            
                return false;
            })
        })
    </script>
</body>
</html>