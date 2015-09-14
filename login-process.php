<?php
	session_start();

	function __autoload( $className )
	{
		include_once( 'classes/' . $className . '.php' );
	}
	// Controle wanneer iemand op submit (=registreer) heeft gedrukt
	if ( isset( $_POST[ 'submit' ] ) )
	{
		$email		=	$_POST[ 'email' ];
		$password	=	$_POST['password'];
		try 
		{
			$db	=	new Database( 'mysql', 'localhost', 'examen_eva', 'root', '' );

			// Maak een nieuwe instantie van de klasse User aan en geef hier de DB aan mee
			// "Dependency injection" van database klasse

			$user = new User( $db );
			$userIsLoggedIn	=	$user->login( $email, $password );
			//var_dump($userIsLoggedIn);
			//die();
			if ( $userIsLoggedIn )
			{
				$user->createCookie( $email );
				 $_SESSION['LOGIN'] = TRUE;
   
				$_SESSION['email']= $email;  
       
				Message::setMessage( 'Pfieuw, het aanmelden is goed verlopen. Welkom!' , 'success');
				Helper::redirect( 'dash.php' );
			}
			else
			{
				Message::setMessage( 'Oeps, je gebruikersnaam en/of paswoord waren niet juist. Probeer opnieuw.', 'error' );
				Helper::redirect( 'login-form.php' );
			}
		}
		catch (Exception $e) 
		{
			Message::setMessage( $e->getMessage(), 'error' );
		}
	}
?>