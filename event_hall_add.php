<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href="managerDash.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />


        <title>Manager Dashboard</title>
    <style>
            .update
                {
                    background-color: green;
                    color: white;
                    cursor: pointer;
                    border: 0;
                    outline: none;
                    border-radius: 5px;
                    height: 22px;
                    font-weight: bold;
                }

                .delete
                {
                    background-color: red;
                    color: white;
                    cursor: pointer;
                    border: 0;
                    outline: none;
                    border-radius: 5px;
                    height: 22px;
                    font-weight: bold;
                }
        </style>
   
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
                    <button onclick="window.location.href='manager_dashboard.php';" class="navigation_buttonStyle">
                        DASHBOARD
                    </button>
                    <button class="navigation_buttonStyle">
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
                        <a href="add_profiles.php">Add Profiles</a>
                        <a href="settings_manager.php">Settings</a>
                        <a href="logout.php" style="color: blue;">Log Out</a>
                        </div>
                    </div>
                </div>
            </div>
            <br>

            <form action ="" method="POST" enctype="multipart/form-data">
            Hall Name: <input type = "text" name = "hall_name">
            Hall Capacity: <input type = "number" placeholder = "ex. 4" min="10" max="5000" step="10" name="max_g">
            Hall Floor: <input type = "number" name="hall_flr" min="0" max="100">
            Hall Price: <input type = "text" name="hall_price"> <br><br>
            Hall Info. <input type = "text" placeholder = "ex. A/C Equipped..." name="hall_desc">
            <input type = "file" name="uploadfile">
            <button type = "submit" name="add_hall">Add Hall...</button>

</form>

    
</body>

<?php
    
    
    require_once "db_connect.php";
    
    // error_reporting(0);

    if(isset($_POST['add_hall']))
    {

    $hallname = $_POST['hall_name'];
    $hallcapacity = $_POST['max_g'];
    $hallfloor = $_POST['hall_flr'];
    $hallprice = $_POST['hall_price'];
    $halldesc = $_POST['hall_desc'];


    $file_name =  $_FILES["uploadfile"]["name"];
    $tempName =  $_FILES["uploadfile"]["tmp_name"];
    $folder = $user_profile."/event_hall_img/".$file_name;

    move_uploaded_file($tempName, $folder);
    // echo $folder;

    echo "<img src ='$folder' height = '100px' width = '100px'>";
    // print_r($_FILES["uploadfile"]);

    $insert_hall = "INSERT INTO ".$user_profile."."."event_hall_info (`event_hall_name`, `event_hall_capacity`, `event_hall_floor`, `event_hall_price`, `event_hall_desc`, `event_hall_img`)
    values('$hallname', '$hallcapacity', '$hallfloor', '$hallprice', '$halldesc', '$folder')";

    if(mysqli_query($connection, $insert_hall))
    {
        echo "<script>alert('Hall added succesfully!!')</script>";

        ?>

        <meta http-equiv = "refresh" content = "0; url = http://localhost/new%20DBMS%20proj_withphp/event_hall_add.php" />
        <?php
    }
    else
    echo "Sorry, that hall was not added! Try again...";
}

    $fetch_halls = "SELECT * FROM ".$user_profile.".event_hall_info";
    $halls_data = mysqli_query($connection, $fetch_halls);

    $halls_in_table = mysqli_num_rows($halls_data);
    echo "<br><br>";


    
    

    if($halls_in_table!=0)
    {
       
?>
            <h2 align="center">Displaying All Rooms</h2>
            <table border = "1" cellspacing = "7" width="85%" >

            <tr>
                <th width="8%">Hall Name<br> <i class="fa-solid fa-people-roof"></i></th>
                <th width="8%">Hall Capacity<br><i class="fa-solid fa-user-group"></i></th>
                <th width="8%">Hall Floor<br><i class="fa-sharp fa-solid fa-elevator"></i></th>
                <th width="10%">Hall Price<br><i class="fa-sharp fa-solid fa-indian-rupee-sign"></i></th>
                <!-- <th width="10%">Hall Image<br><i class="fa-sharp fa-solid fa-image"></i></th> -->
                <th width="10%">Hall Info.<br><i class="fa-sharp fa-solid fa-circle-info"></i></th>
                <th width="10%">Hall Image.<br><i class="fa-sharp fa-solid fa-image"></i></th>
                <th width="22%">Operations<br><i class="fa-solid fa-gear"></i></th>
                
             </tr>
           
<?php
        while($result = mysqli_fetch_assoc($halls_data))

        
        {
            echo "
            <tr>
            <td>".$result['event_hall_name']."</td>
            <td>".$result['event_hall_capacity']."</td>
            <td>".$result['event_hall_floor']."</td>
            <td>".$result['event_hall_price']."</td>
            <td>".$result['event_hall_desc']."</td>
            <td><img src = '".$result['event_hall_img']."' height='100px' width='100px'</td>
            
            <td><a href='update_halls.php?event_hall_id=$result[event_hall_id]'><input type='submit' value='Update' class='update'></a>
            <a href='delete_halls.php?event_hall_id=$result[event_hall_id]'><input type='submit' value='Delete' class='delete' onclick = 'return onDelete()'></a></td>
         </tr>
         ";
        }
    }

    else
    {
        echo "<center><p style='color:red;'>No Halls Found in the database!</p>";
        echo "<center><p style='color:red;'>You may add one by filling the form above!</p>";
    }

?>
 </table>



<script>

        function onDelete()
        {
            return confirm("Do you want to delete this data?");
        }
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
</html>
