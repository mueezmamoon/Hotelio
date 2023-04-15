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

    $room_id = $_GET['room_id'];

    $del_query = "DELETE FROM ".$user_profile.".rooms where room_id = '$room_id'";

    if(mysqli_query($connection, $del_query))
    {
        echo "<script>alert('Record Deleted')</script>";
        ?>
         <meta http-equiv = "refresh" content = "0; url = http://localhost/new%20DBMS%20proj_withphp/rooms_add.php" />

        <?php
    }  

    else{
        echo "Not deleted!";
    }



?>