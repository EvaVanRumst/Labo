<?php 
	session_start();
	function __autoload( $className )
	{
		include_once( 'classes/' . $className . '.php' );
	}
	$currentPage	=	basename( $_SERVER[ 'PHP_SELF' ] );
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

		<a href="dashboard.php">Home</a> | 
		<a href="login-form.php">Login</a> |
		<a href="registration-form.php">Registreer</a>

		<h1>Meld je aan.</h1>


		<?php if ( $message ): ?>
			<div class="modal <?= $message['type'] ?>"><?= $message['text'] ?></div>
		<?php endif ?>
		
		<form action="login-process.php" method="POST">
		    <ul>
		        <li>
		            <label for="email">e-mail</label><br>
		            <input type="text" id="email" name="email">
		        </li>
		        <li>
		            <label for="password">paswoord</label><br>
		            <input type="password" id="password" name="password">
		        </li>
		    </ul>
		    <input type="submit" value="Inloggen" name="submit">
		</form>

    </body>
</html>