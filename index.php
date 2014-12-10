 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Hemsida</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        
        
        <?php
        //Starta session
        session_start();
        
        //definera databasuppgifter
        define("DB_SERVER", "localhost");
        define("DB_USER", "root");
        define("DB_PASSWORD", "");
        define("DB_NAME", "login");
        $dbh = new PDO('mysql:dbname=' . DB_NAME . ';host=' . DB_SERVER . ';charset=utf8', DB_USER, DB_PASSWORD);
        
        include 'logga_in.php';
        
        if (!isset($_SESSION["inloggad"])) {
            include 'form.php';
        }
        
        //Har man tryckt på logga ut knappen, körs koden nedan
        if (isset($_POST["loggaut"])) {
            //Sessionen förstårs
            session_destroy();
            header("Location:?");
        }
        ?>
    </body>
</html>
