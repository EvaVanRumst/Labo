<?php

$email = '';
$login = FALSE;

session_start();
	function __autoload( $className )
	{
		include_once( 'classes/' . $className . '.php' );
	}
	$currentPage	=	basename( $_SERVER[ 'PHP_SELF' ] );

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


	// Haal de messages op die teventueel geset zijn
	$message = Message::getMessage();

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/global.css">
        <title>Labo-login</title>

        <link rel="stylesheet" href="css/global.css">
    </head>
    <body>

	<nav>
        <a href="dashboard.php">Home</a> | 
        <a href="dash.php">Dashboard</a> |
        <a href="application.php">Todos</a> |
         <a href="logout.php">Logout(<?= $email ?>)</a>
    </nav>

		<h1>Uitloggen?</h1>


		<?php if ( $message ): ?>
			<div class="modal <?= $message['type'] ?>"><?= $message['text'] ?></div>
		<?php endif ?>
		
		<form action="logout-process.php" method="POST">
		   
		   <p> Uitloggen?</p>
		    <input type="submit" value="Uitloggen" name="submit">
		</form>

    </body>
</html>