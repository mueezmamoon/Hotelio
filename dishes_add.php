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
                        <a href="dishes_add.php">Add Dishes for Ordering System</a>
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
                Dish Name: <input type = "text" name = "dish_name">
                Dish Price: <input type = "number" name="dish_price" min="0" max="100000">
                Dish Type: <input type = "text" placeholder = "ex. Indian, Chinese..." name="dish_type">
                Dish Serves: <input type = "number" name="dish_serves" placeholder="ex. 4" min="1" max="100"> <br><br>
                Dish Preference:
                <select name="dish_pref">
                    <option value="Veg">Vegetarian</option>
                    <option value="Non-Veg">Non-Vegetarian</option>
                    </select>
                Dish Preparation Time: <input type = "number" name="dish_preptime" placeholder="ex. Enter mins" min="1" max="120"> <br><br>
                Dish Info. <input type = "text" placeholder = "ex. Description about Dish..." name="dish_info">
                <input type = "file" name="uploadfile">
                <button type = "submit" name="add_dish">Add a Dish...</button>

    </form>

    
</body>

<?php
    
    
    require_once "db_connect.php";
    
    // error_reporting(0);

    if(isset($_POST['add_dish']))
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

    $file_name =  $_FILES["uploadfile"]["name"];
    $tempName =  $_FILES["uploadfile"]["tmp_name"];
    $folder = $user_profile."/dish_images/".$file_name;

    move_uploaded_file($tempName, $folder);
    // echo $folder;

    echo "<img src ='$folder' height = '100px' width = '100px'>";
    // print_r($_FILES["uploadfile"]);

    $insert_dish = "INSERT INTO ".$user_profile."."."dishes (`dish_name`, `dish_price`, `dish_type`, `dish_serves`, `dish_pref`, `dish_preptime`, `dish_info`, `dish_img`)
    values('$dish_name', '$dish_price', '$dish_type', '$dish_serves', '$dish_pref', '$dish_preptime', '$dish_info', '$folder')";

    if(mysqli_query($connection, $insert_dish))
    {
        echo "<script>alert('Dish added succesfully!!')</script>";

        ?>

        <meta http-equiv = "refresh" content = "0; url = http://localhost/new%20DBMS%20proj_withphp/dishes_add.php" />
        <?php
    }
    else
    echo "Sorry, that dish was not added! Try again...";
}
}

    $fetch_dishes = "SELECT * FROM ".$user_profile.".dishes";
    $dishes_data = mysqli_query($connection, $fetch_dishes);

    $dishes_in_table = mysqli_num_rows($dishes_data);
    echo "<br><br>";




    if($dishes_in_table!=0)
    {
       
?>
            <h2 align="center">Displaying All Dishes</h2>
            <table border = "1" cellspacing = "7" width="85%" >

            <tr>
                <th width="8%">Dish Name<br> <i class="fa-solid fa-bowl-rice"></i></th>
                <th width="10%">Dish Price<br><i class="fa-sharp fa-solid fa-indian-rupee-sign"></i></th>
                <th width="8%">Dish Type<br><i class="fa-solid fa-fish"></i></th>
                <th width="8%">Dish Serves<br><i class="fa-solid fa-utensils"></i></th>
                <th width="10%">Dish Preference<br><i class="fa-solid fa-leaf"></i></th>
                <th width="10%">Dish Prep. Time<br><i class="fa-regular fa-clock"></i></th>
                <th width="10%">Dish Image<br><i class="fa-sharp fa-solid fa-image"></i></th>
                <th width="10%">Dish Info.<br><i class="fa-sharp fa-solid fa-circle-info"></i></th>
                <th width="22%">Operations<br><i class="fa-solid fa-gear"></i></th>
                
             </tr>
           
<?php
        while($result = mysqli_fetch_assoc($dishes_data))

        
        {
            
            echo "
            <tr>
            <td>".$result['dish_name']."</td>
            <td>".$result['dish_price']."</td>
            <td>".$result['dish_type']."</td>
            <td>".$result['dish_serves']."</td>
            <td>".$result['dish_pref']."</td>
            <td>".$result['dish_preptime']."</td>
            
            <td><img src = '".$result['dish_img']."' height='100px' width='100px'</td>
            <td>".$result['dish_info']."</td>
            <td><a href='update_dishes.php?dish_id=$result[dish_id]'><input type='submit' value='Update' class='update'></a>
            <a href='delete_dishes.php?dish_id=$result[dish_id]'><input type='submit' value='Delete' class='delete' onclick = 'return onDelete()'></a></td>
         </tr>
         ";
        }
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
