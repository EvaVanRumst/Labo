<?php

session_start();
$login = FALSE;
$email = '';

function __autoload( $className )
    {
        include_once( 'classes/' . $className . '.php' );
    }


if (isset($_SESSION['LOGIN']))
    {
        $login = $_SESSION['LOGIN'];
    }
if (isset($_SESSION['email']))
    {
        $email = $_SESSION['email'];
    }

//voor als de pagina onrechtmatig benaderd wordt

if (!$login)
{
    //redirect
    Helper::redirect( 'dashboard.php' );
}


$message = Message::getMessage();

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
        <a href="dashboard.php">Home</a> | 
        <a href="dash.php">Dashboard</a> |
        <a href="application.php">Todos</a>
         <a href="logout.php">Logout(<?= $email ?>)</a>
    </nav>


        <?php if ( $message ): ?>
            <div class="modal <?= $message['type'] ?>"><?= $message['text'] ?></div>
        <?php endif ?>

		<h1>Dashboard</h1>
        <p>Dit is de applicatie die je moet maken: <a href='application.php'>ToDo-applicatie</a></p>



       

    </body>
</html>