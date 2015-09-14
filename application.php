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

 $db =   new Database( 'mysql', 'localhost', 'examen_eva', 'root', '' );
    $query = 'SELECT * FROM todo WHERE user= :email';
        $placeHolder = array(":email" => $email);
        $todo = array();
        $todo =  $db->query( $query,$placeHolder );

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/global.css">
        <title>Labo-applicatie</title>
    </head>
    <body>

        <nav>
        <a href="dashboard.php">Home</a> | 
        <a href="dash.php">Dashboard</a> |
        <a href="application.php">Todos</a> |
        <a href="dashboard.php">Logout(<?= $email ?>)</a>
    </nav>



		<h1>De TODO-APP</h1>
        <p>Nog geen todo-items: <a href='applicationapp.php'>Voeg items toe</a></p>

        <form action="applicationapp.php" method="POST">

            <table>
                

                <tbody>
                    <?php if($todo): ?>
                    <?php foreach ( $todo as $key => $inhoud ): ?>

                        <tr>
                            
                            <td><?= ( $key + 1 ) ?> </td>
                            <?php foreach ( $inhoud as $key => $value ): ?>
                                <td><?= $value ?></td>
                            <?php endforeach ?>
                            <td><input type="submit" value="<?= $inhoud['id_todo'] ?>" class="delete" name="delete"></td>

                        

                        

                        </tr>

                    <?php endforeach ?>
                <?php endif ?>
                </tbody>
            </table>
        </form>

       

    </body>
</html>