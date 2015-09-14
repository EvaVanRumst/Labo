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
			// Controleren of de user al bestaat
			$userExists = $user->exists( $email );
			// Als de user bestaat, errormessage tonen en redirecten
			if ( $userExists === TRUE )
			{
				Message::setMessage( "The email has already been taken.", "error" );
				Helper::redirect( 'registration-form.php' );
			}
			else // Bestaat de gebruiker nog niet, maak de gebruiker aan
			{
				// Toevoegen aan de database
				$user->create( $email, $password );
				// Cookie aanmaken om gebruiker achteraf te kunnen identificeren
				$user->createCookie( $email );

				//create SESSION

				$_SESSION['LOGIN'] = TRUE;
				$_SESSION['email'] = $email;
				
				// Redirecten naar dashboard wanneer gebruiker is toegevoegd & cookie is aangemaakt
				Helper::redirect( 'dash.php' );
			}
		
		} 
		catch (Exception $e) 
		{
			Message::setMessage( $e->getMessage(), 'error' );
		}
	}
?>