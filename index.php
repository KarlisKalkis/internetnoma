<?php

session_start();
    include("connection.php");
    include("functions.php");

    $users_data = check_login($con);


?>


<html>
    <head>
        <title>MLTA</title>
    </head>

    <body>
        <a href="logout.php">Logout</a>
        <h1>This is the index page</h1>

        <br>
        Hello. <?php echo $user_data['users_name']?>



    </body>
</html>