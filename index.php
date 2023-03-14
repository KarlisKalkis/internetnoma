<?php

session_start();
    $_SESSION;


?>


<html>
    <head>
        <title>MLTA</title>
    </head>

    <body>
        <a href="logout.php">Logout</a>
        <h1>This is the index page</h1>

        <br>
        Hello. <?php echo $user_data['user_name']; ?>

    </body>
</html>