<?php
    // session_start();
    // echo "Welcome ".$_SESSION['hotel_name'];

    require "db_connect.php";

    
    // $user_profile = $_SESSION['hotel_name'];

    // if($user_profile == true)
    // {

    // }

    // else
    // {
    //     header("location: ./sign_in.php");
    // }

    $order_id = $_GET['order_id'];

    $del_query = "DELETE FROM signed_up_users.sent_orders where order_id = '$order_id'";

    if(mysqli_query($connection, $del_query))
    {
        echo "<script>alert('Record Deleted')</script>";
        ?>
         <meta http-equiv = "refresh" content = "0; url = http://localhost/new%20DBMS%20proj_withphp/kitchen_dashboard.php" />

        <?php
    }  

    else{
        echo "Not deleted!";
    }



?>