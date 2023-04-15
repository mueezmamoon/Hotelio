<?php
    session_start();
    echo "Welcome ".$_SESSION['hotel_name'];

    require "db_connect.php";

    
    $user_profile = $_SESSION['hotel_name'];

    if($user_profile == true)
    {

    }

    else
    {
        header("location: ./sign_in.php");
    }

    $event_hall_id = $_GET['event_hall_id'];

    $del_query = "DELETE FROM ".$user_profile.".event_hall_info where event_hall_id = '$event_hall_id'";

    if(mysqli_query($connection, $del_query))
    {
        echo "<script>alert('Record Deleted')</script>";
        ?>
         <meta http-equiv = "refresh" content = "0; url = http://localhost/new%20DBMS%20proj_withphp/event_hall_add.php" />

        <?php
    }  

    else{
        echo "Not deleted!";
    }



?>