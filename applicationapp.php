
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


try 
    {
        $db =   new Database( 'mysql', 'localhost', 'examen_eva', 'root', '' ); // Connectie maken
        
        //var_dump($todo);
         if ( isset( $_POST[ 'submit' ] ) )
        {
            $user            =   $email  ;
            $inhoud          =   $_POST['todo'] ;
            var_dump($inhoud);

            $insertQuery    =   'INSERT INTO todo (user, 
                                                inhoud, 
                                                date_create) 
                                VALUES (:email,
                                            :inhoud,
                                            NOW())
                                           ';

            $placeholders   =   array( ":inhoud" => $inhoud,
                                         ":email" => $user);                                
                                         
            // Query uitvoeren

            $db->query( $insertQuery, $placeholders );            
            Helper::redirect( 'application.php' );

        }


        if ( isset( $_POST[ 'delete' ] ) )
        {
            $verwijder = $_POST[ 'delete' ]; 


            $deleteQuery    =   "DELETE FROM todo
                                    WHERE todo.id_todo = :id_todo
                                    LIMIT 1";
            $deleteQueryPlaceholders    =   array( ':id_todo' => $verwijder );

            $db->query( $deleteQuery, $deleteQueryPlaceholders );
            Helper::redirect( 'application.php' );
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
        <title>Labo-applicatieapp</title>
    </head>
    <body>

        <nav>
        <a href="dashboard.php">Home</a> | 
        <a href="dash.php">Dashboard</a> |
        <a href="application.php">Todos</a> |
         <a href="dashboard.php">Logout(<?= $email ?>)</a>
    </nav>



		<h1>Voeg een TODO-item toe:</h1>
        <p><a href='application.php'>Terug naar mijn TODO's</a></p>

        <form action="applicationapp.php" method="POST">
        <ul>
                <li>
                    <label for="todo">Wat moet er gedaan worden?</label><br>
                    <input type="text" id="todo" name="todo">
                </li>
               
        </ul>
         <input type="submit" value="Voeg toe!" name="submit">
        </form>

        


       

    </body>
</html>