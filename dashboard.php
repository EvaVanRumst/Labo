<?php
    
   
    session_start();

    function __autoload( $className )
    {
        include_once( 'classes/' . $className . '.php' );
    }
    try 
    {
        $db =   new Database( 'mysql', 'localhost', 'examen_eva', 'root', '' );
        $user   =   new User( $db );
	   
        $userIsValid    =   $user->validate();
        
        if( !$userIsValid )
        {
            Message::setMessage( "Er ging iets mis, probeer opnieuw in te loggen.", 'error' );
            Cookie::deleteCookie( 'login' );
            Helper::redirect( 'login-form.php' );
        }
        
    }
    catch (Exception $e) 
    {
        Message::setMessage( $e->getMessage(), 'error' );
    }
    $message    =   Message::getMessage();
        
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="css/global.css">
        <title>Labo-Welkom</title>
    </head>
    <body>

    <nav>
        <a href="dashboard.php">Home</a>
        <a href="login-form.php">Login</a> |
        <a href="registration-form.php">Registreer</a>
    </nav>

		<h1>Welkom!</h1>
        <p>Eerste bezoek? Registreer nu...</p>



        <?php if ( $message ): ?>
            <div class="modal <?= $message['type'] ?>"><?= $message['text'] ?></div>
        <?php endif ?>

    </body>
</html>