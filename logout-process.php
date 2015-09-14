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

if(isset($_POST['submit']))
{
	session_destroy();
	 Helper::redirect( 'logout.php' );
}

?>