      <!---- PHP starts here -->

      
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" href="hotelio_favicon.png">
    <link href='https://fonts.googleapis.com/css?family=Junge' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">
    
    <title>Hotelio</title>
</head>
<style>
    .navbar {
  overflow: hidden;
  background-color: #780a0ac0;
  font-family: Arial;
}

/* Links inside the navbar */
.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  
}

/* The dropdown container */
.dropdown {
  float: left;
  overflow: hidden;
}

/* Dropdown button */
.dropdown .dropbtn {
  font-size: 16px;
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit; /* Important for vertical align on mobile phones */
  margin: 0; /* Important for vertical align on mobile phones */
}

/* Add a red background color to navbar links on hover */
.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

/* Dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

/* Add a grey background color to dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

body, html {
    height: 100%;
}

/* The hero image */
.hero-image {
  /* Use "linear-gradient" to add a darken background effect to the image (photographer.jpg). This will make the text easier to read */
  background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));

  /* Set a specific height */
  height: 50%;

  /* Position and center the image to scale nicely on all screens */
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Place text in the middle of the image */
.hero-text {
  text-align: center;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  color: rgb(255, 255, 255);
  font-family: junge;
  font-size:x-large;
}

.button-78 {
  align-items: center;
  appearance: none;
  background-clip: padding-box;
  background-color: initial;
  background-image: none;
  border-style: none;
  box-sizing: border-box;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  flex-direction: row;
  flex-shrink: 0;
  font-family: Eina01,sans-serif;
  font-size: 16px;
  font-weight: 800;
  justify-content: center;
  line-height: 24px;
  margin: 0;
  min-height: 64px;
  outline: none;
  overflow: visible;
  padding: 19px 26px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  text-decoration: none;
  text-transform: none;
  user-select: none;
  -webkit-user-select: none;
  touch-action: manipulation;
  vertical-align: middle;
  width: auto;
  word-break: keep-all;
  z-index: 0;
}

@media (min-width: 768px) {
  .button-78 {
    padding: 19px 32px;
  }
}

.button-78:before,
.button-78:after {
  border-radius: 80px;
}

.button-78:before {
  background-image: linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
  content: "";
  display: block;
  height: 100%;
  left: 0;
  overflow: hidden;
  position: absolute;
  top: 0;
  width: 100%;
  z-index: -2;
}

.button-78:after {
  background-color: initial;
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  content: "";
  display: block;
  left: 4px;
  overflow: hidden;
  position: absolute;
  right: 4px;
  top: 4px;
  transition: all 100ms ease-out;
  z-index: -1;
}

.button-78:hover:not(:disabled):before {
  background: linear-gradient(92.83deg, rgb(255, 116, 38) 0%, rgb(249, 58, 19) 100%);
}

.button-78:hover:not(:disabled):after {
  bottom: 0;
  left: 0;
  right: 0;
  top: 0;
  transition-timing-function: ease-in;
  opacity: 0;
}

.button-78:active:not(:disabled) {
  color: #ccc;
}

.button-78:active:not(:disabled):before {
  background-image: linear-gradient(0deg, rgba(0, 0, 0, .2), rgba(0, 0, 0, .2)), linear-gradient(92.83deg, #ff7426 0, #f93a13 100%);
}

.button-78:active:not(:disabled):after {
  background-image: linear-gradient(#541a0f 0, #0c0d0d 100%);
  bottom: 4px;
  left: 4px;
  right: 4px;
  top: 4px;
}

.button-78:disabled {
  cursor: default;
  opacity: .24;
}

.select-box {
  cursor: pointer;
  position : relative;
  max-width:  20em;
  margin: 25px auto;
  padding-left: 150px;
  width: 50%;
}

.select,
.label {
  color: #414141;
  display: block;
  font: 400 17px/2em junge;
}

.select {
  width: 100%;
  position: absolute;
  top: 0;
  padding: 5px 0;
  height: 50px;
  opacity: 0;
  -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";
  background: none transparent;
  border: 0 none;
}

#select-box1:disabled
{
  color: #ffffff;
  background-color: #414141;
}

.select-box1 {
  background: #ffffff;
}

.label {
  position: relative;
  padding: 5px 10px;
  cursor: pointer;
}
.open .label::after {
   content: "▲";
}
.label::after {
  content: "▼";
  font-size: 12px;
  position: absolute;
  right: 0;
  top: 0;
  padding: 5px 15px;
  border-left: 5px solid #fff;
}

</style>




<body bgcolor="bisque">
    <a href="index.html"><img src="Hotelio_transparent_logo.svg" height="100" width="350"></a>
    <h3 style="text-align: right; padding-right: 25px; color: #e21313c0;">Welcome [user] </h3>
<div class="navbar">
  <a href="receptionist.html">Home</a>
  <a href="news.html">News</a>
  <div class="dropdown">
    <button class="dropbtn">Services
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a href="bookings.html">Bookings</a>
      <a href="checkout.html">Check-Out</a>
    </div>
  </div>
</div>



  <?php
        $room_no = $_GET['room_no'];

  ?>

  <center><h3>Checking into Room <?php echo $room_no  ?></h3></center>
  <div class = "container py-5">
    <div class="row mt-4">
<?php
    $get_rooms_query = "SELECT * FROM ".$user_profile.".rooms where room_no = ".$room_no;
    $room_query_send = mysqli_query ($connection, $get_rooms_query);
    $row = mysqli_fetch_assoc($room_query_send);
    $max_g = $row['max_guests'];
    $start = 1;
    while($start <= $row['max_guests'])
    {
        ?>
        
  <form action="" method="POST">
  <div class="col md-3 mt-3">
        <div class="card">
            <div class="card-body">
    <h4 class="card-title">Guest Name: <input type="text" name="guest_name"> <br><br></h4>
    <h4 class="card-title">Guest Nationality: <input type="text" name="guest_nationality"> <br><br></h4>
    <h4 class="card-title">Guest Phone Number: <input type="number" min=0 name="guest_phno"> <br><br></h4>
    <h4 class="card-title">Guest E-mail: <input type="email" name="guest_email"> <br><br></h4>
    Gender:
    <h4 class="card-title">Male <input type="radio" value="Male" name="radio"></h4>
    <h4 class="card-title">Female <input type="radio" value="Female" name="radio"> </h4>
    <h4 class="card-title">Others <input type="radio" value="Others" name="radio"> <br><br></h4>
    <h4 class="card-title">Guest Address: <input type="textarea" name="guest_address"> <br><br></h4>
    <h4 class="card-title">ID proof: <input type="file" name="guestid_proof"> <br><br></h4>

    </div>
    </div>
    </div>

    <button type="submit" class="btn btn-primary" name="check_in">Check In</button>
</form>
<?php
$start++;
    }
    
    ?>
  
    



    <?php

            error_reporting(0);

            if(isset($_POST['check_in']))
    {
            $counter = 0;
            $guest_name = $_POST['guest_name'];
            $guest_nationality = $_POST['guest_nationality'];
            $guest_phno = $_POST['guest_phno'];
            $guest_email = $_POST['guest_email'];
            $guest_gender = $_POST['radio'];
            $guest_address = $_POST['guest_address'];
            
            $file_name =  $_FILES["uploadfile"]["name"];
            $tempName =  $_FILES["uploadfile"]["tmp_name"];
            $folder = "/idproof_images".$file_name;
        
            move_uploaded_file($tempName, $folder);

            if($counter == $max_g)
            {
                echo "<p style='color:red;'>You have reached maximum guest check-in for this room. Redirecting you to the main screen</p>";
                ?>
                <meta http-equiv="refresh" content="0; url=http://localhost/new%20DBMS%20proj_withphp/bookings.php">
            <?php
            }
            
            else {
                
                
                $date = date('Y-m-d H:i:s');

            $insert_room = "INSERT INTO ".$user_profile."."."guests (`guest_name`, `guest_nationality`, `guest_phno`, `guest_email`, `guest_gender`, `guest_address`, `guest_room`, `check_in_date_time`, `guestid_proof`)
            values('$guest_name', '$guest_nationality', '$guest_phno', '$guest_email', '$guest_gender', ' $guest_address', '$room_no', CURRENT_DATE(), '$folder')";
            $counter = $counter+1;
            
             
            // echo $insert_room;
            if(mysqli_query($connection, $insert_room))
            {
                echo "<p style='color:green;'>Guest ".$guest_name." has been checked into room ".$room_no."!</p>";
            }

            // else
            // {
            //     echo "Some error!";
            // }

            $update_status = "UPDATE ".$user_profile.".rooms set room_booked = 'Yes' where room_no='$room_no'";
            if(mysqli_query($connection, $update_status))
            {
                echo "Welcome!";
            }
    }
    }
    
    ?>
    


  
</body>
</html>
