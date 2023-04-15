<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="managerDash.css">
        <title>Manager Dashboard</title>
    </head>

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
    $fetch_rooms = "SELECT * FROM ".$user_profile.".rooms where room_id = '$room_id'";
    $rooms_data = mysqli_query($connection, $fetch_rooms);

    $rooms_in_table = mysqli_num_rows($rooms_data);
    $result = mysqli_fetch_assoc($rooms_data);
?>

    <body>
        <div id="pageBox">
            <div id="dashboard_topBox">
                <div class="welcome_msg">
                    <center>
                        <h1>
                            Welcome To
                            <?php
                                $query = "select hotel_name from ".$user_profile.".hotel_info;";
                                $res = mysqli_query($connection, $query);
                                $res2 =  mysqli_fetch_assoc($res);
                                
                                echo $res2['hotel_name'];

                            ?>
                        </h1>
                    </center>
                </div>


                <div id="date-today" class="datee">
                    27/03/2003
                </div>
                <div id="clock" class="time">
                    8:10:45
                </div>

                
                <div class="navigation_bar">
                    <button onclick="window.location.href='manager_dashboard.html';" class="navigation_buttonStyle">
                        DASHBOARD
                    </button>
                    <button onclick="window.location.href='operations.html';" class="navigation_buttonStyle">
                    <div class="dropdown">    
                    OPERATIONS
                    <div class="dropdown-content">
                        <a href="rooms_add.php">Add Rooms</a>
                        <a href="event_hall_add.php">Add Event Hall Information</a>
                        <a href="recreational_add.php">Add Recreational Details</a>
                        </div>
                    </button>
                    <div class="dropdown">
                        <button class="dropbtn">BOOKINGS</button>
                        <div class="dropdown-content">
                        <a href="#">Event Hall</a>
                        <a href="#">Rooms</a>
                        </div>
                    </div>
                    <button onclick="window.location.href='analysis.html';" class="navigation_buttonStyle">
                        ANALYSIS
                    </button>
                    <div class="dropdown" style="float:right;">
                        <button class="dropbtn dropbtnRgt">PROFILE</button>
                        <div class="dropdown-content dropdown-content-rgt">
                        <a href="#">Your Profile</a>
                        <a href="settings_manager.php">Settings</a>
                        <a href="logout.php" style="color: blue;">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>
                UPDATE ROOMS!
            <form action ="" method="POST" enctype="multipart/form-data">
            Room No: <input type = "text" name = "r_no" value="<?php echo $result['room_no']?>">
            Room Floor: <input type = "number" name="r_flr" value="<?php echo $result['room_floor']?>">
            Room Type: <input type = "text" placeholder = "ex. Master Suite..." name="r_type" value="<?php echo $result['room_type']?>">
            Room Price: <input type = "text" name="r_price" value="<?php echo $result['room_price']?>"> <br><br>
            Max Guests: <input type = "number" placeholder = "ex. 4" name="max_g" min="1" max="20" value="<?php echo $result['max_guests']?>">
            Room Info. <input type = "text" placeholder = "ex. Sea Facing..." name="r_desc" value="<?php echo $result['room_desc']?>">
            <input type = "file" name="uploadfile">
            <button type = "submit" name="update_room">Update</button>

</form>

</body>

<?php
if(isset($_POST['update_room']))
    {

    $roomno = $_POST['r_no'];
    $roomfloor = $_POST['r_flr'];
    $roomtype = $_POST['r_type'];
    $roomprice = $_POST['r_price'];
    $maxguests = $_POST['max_g'];
    $roomdesc = $_POST['r_desc'];


    $file_name =  $_FILES["uploadfile"]["name"];
    $tempName =  $_FILES["uploadfile"]["tmp_name"];
    $folder = "room_images/".$file_name;

    move_uploaded_file($tempName, $folder);
    // echo $folder;

    echo "<img src ='$folder' height = '100px' width = '100px'>";
    // print_r($_FILES["uploadfile"]);

    $update_room = "UPDATE ".$user_profile.".rooms set room_no = '$roomno', room_floor = '$roomfloor', room_type='$roomtype', room_price='$roomprice', max_guests='$maxguests', room_desc='$roomdesc' where room_id='$room_id'";
    

    if(mysqli_query($connection, $update_room))
    {
        echo "<script>alert('Room updated succesfully!!')</script>";

        ?>

        <meta http-equiv = "refresh" content = "0; url = http://localhost/new%20DBMS%20proj_withphp/rooms_add.php" />
        <?php
    }
    else
    echo "Sorry, that room was not updated! Try again...";
}

?>

<script>

        const date = new Date();
        
        let day = date.getDate();
        let month = date.getMonth() + 1;
        let year = date.getFullYear();

        let currentDate = `${day}-${month}-${year}`;
        document.getElementById('date-today').textContent = currentDate;

        setInterval(showTime, 1000);
            function showTime() {
                let time = new Date();
                let hour = time.getHours();
                let min = time.getMinutes();
                let sec = time.getSeconds();
                am_pm = "AM";
            
                if (hour > 12) {
                    hour -= 12;
                    am_pm = "PM";
                }
                if (hour == 0) {
                    hr = 12;
                    am_pm = "AM";
                }
            
                hour = hour < 10 ? "0" + hour : hour;
                min = min < 10 ? "0" + min : min;
                sec = sec < 10 ? "0" + sec : sec;
            
                let currentTime = hour + ":"
                    + min + ":" + sec + am_pm;
            
                document.getElementById("clock")
                    .innerHTML = currentTime;
            }
            
            showTime(); 
    </script>