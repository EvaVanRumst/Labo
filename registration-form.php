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
        <title>Labo-registreer</title>
        <link rel="stylesheet" href="css/global.css">
    </head>
    <body>

		<a href="dashboard.php">Home</a> | 
		<a href="login-form.php">Login</a> |
		<a href="registration-form.php">Registreer</a>

		<?php if ( $message ): ?>
			<div class="modal <?= $message['type'] ?>"><?= $message['text'] ?></div>
		<?php endif ?>

		<h1>Registreren</h1>
		<form action="registration-process.php" method="POST">
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
		    <input type="submit" value="Registreer" name="submit">
		</form>

    </body>
</html>