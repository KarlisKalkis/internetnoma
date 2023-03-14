<?php 

function check_login($con)
{
    if (isset($_SESSION['users_id']))
    {

        $id = $_SESSION['users_id'];
        $query = "select * from users where users_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if($result && mysqli_num_rows($result) > 0 )
        {
            $users_data = mysqli_fetch_assoc($result);
            return $users_data;
        }
    }

    //redirect to login
    header("Location: login.php");
    die;
}