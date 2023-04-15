<?php    
    
    $host = "localhost:3325";
    $username = "root";
    $password = "";
    $dbname="signed_up_users";
    //Procedural
    $connection = mysqli_connect($host, $username, $password,$dbname);

    if(!$connection)
    {
        die("Connection Failed! 😢" .mysqli_connect_error());
    }
?>
