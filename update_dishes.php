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

    $dish_id = $_GET['dish_id'];
    $fetch_dishes = "SELECT * FROM ".$user_profile.".dishes where dish_id = '$dish_id'";
    $dishes_data = mysqli_query($connection, $fetch_dishes);

    $dishes_in_table = mysqli_num_rows($dishes_data);
    $result = mysqli_fetch_assoc($dishes_data);
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
                UPDATE DISHES!
                <?php echo $result['dish_name'] ?>;
                <form action ="" method="POST" enctype="multipart/form-data">
                Dish Name: <input type = "text" name = "dish_name" value="<?php echo $result['dish_name']?>">
                Dish Price: <input type = "number" name="dish_price" min="0" max="100000" value="<?php echo $result['dish_price']?>">
                Dish Type: <input type = "text" placeholder = "ex. Indian, Chinese..." name="dish_type" value="<?php echo $result['dish_type']?>">
                Dish Serves: <input type = "number" name="dish_serves" placeholder="ex. 4" min="1" max="100" value="<?php echo $result['dish_serves']?>"> <br><br>
                Dish Preference:
                <select name="dish_pref">
                    <option value="Veg">Vegetarian</option>
                    <option value="Non-Veg">Non-Vegetarian</option>
                    </select>
                Dish Preparation Time: <input type = "number" name="dish_preptime" placeholder="ex. Enter mins" min="1" max="120" value="<?php echo $result['dish_preptime']?>"> <br><br>
                Dish Info. <input type = "text" placeholder = "ex. Description about Dish..." name="dish_info" value="<?php echo $result['dish_info']?>">
                <input type = "file" name="uploadfile">
                <button type = "submit" name="update_dish">Update Dish...</button>

    </form>

</body>

<?php
    if(isset($_POST['update_dish']))
    {

    $dish_name = $_POST['dish_name'];
    $dish_price = $_POST['dish_price'];
    $dish_type = $_POST['dish_type'];
    $dish_serves = $_POST['dish_serves'];
    $dish_pref = $_POST['dish_pref'];
    $dish_preptime = $_POST['dish_preptime'];
    $dish_info = $_POST['dish_info'];

    if(empty($dish_name) || empty($dish_price) || empty($dish_type) || empty($dish_serves) || empty($dish_info) || empty($dish_preptime))
    {
        echo "<p style='color:red;'>Some Fields are empty! </p>";
    }

    else
    {

    $update_dish = "UPDATE ".$user_profile.".dishes set dish_name = '$dish_name', dish_price = '$dish_price', dish_type='$dish_type', dish_serves='$dish_serves', dish_pref='$dish_pref', dish_preptime='$dish_preptime', dish_info='$dish_info' where dish_id='$dish_id'";
    

    if(mysqli_query($connection, $update_dish))
    {
        echo "<script>alert('Dish updated succesfully!!')</script>";

        ?>

        <meta http-equiv = "refresh" content = "0; url = http://localhost/new%20DBMS%20proj_withphp/dishes_add.php" />
        <?php
    }
    else
    echo "Sorry, that dish was not updated! Try again...";
}
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