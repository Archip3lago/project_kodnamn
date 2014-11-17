<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
//Skapar ett formulär för att logga in.
        echo "<div id='login'>";
        echo "<h1>Logga in</h1>";
        echo "<form method='POST'>";
        echo "<p>Username</p>";
        echo "<input type='text' name='username'>";
        echo "<p>Password</p>";
        echo "<input type='password' name='password'>";
        echo "<input type='submit' value='logga in'>";
        echo "</form>";
        echo "</div>";
//skapar ett formulär för att registrera en ny användare
        echo "<div id='reg'>";
        echo "<h1>Registrera</h1>";
        echo "<form method='POST'>";
        echo "<p>Username</p>";
        echo "<input type='text' name='username_reg'>";
        echo "<p>Password</p>";
        echo "<input type='password' name='password_reg'>";
        echo "<input type='submit' value='registrera'>";
        echo "</form>";
        echo "</div>";
        ?>
    </body>
</html>
